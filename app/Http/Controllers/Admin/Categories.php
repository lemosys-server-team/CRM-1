<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use DataTables;
use Form;

use App\Category;

class Categories extends Controller
{
    protected $category_type;
    protected $category_type_heading;

    public function __construct(Request $request){
        

        $category_type = strtolower($request->input('category_type'));
        if($category_type!=""){
            if(!in_array($category_type, [
                config('constants.CATEGORY_TYPE_BUSINESS'), 
                config('constants.CATEGORY_TYPE_LINK'), 
                config('constants.CATEGORY_TYPE_NUSKA'), 
                config('constants.CATEGORY_TYPE_PDF'), 
                config('constants.CATEGORY_TYPE_RINGTONE'), 
                config('constants.CATEGORY_TYPE_NAMAZNIYAT_LINK')
            ])){
                return redirect()->route('admin.categories.index');
            }
           
        }

        $this->category_type = $category_type;
        $this->category_type_heading = ucwords(str_replace('_', ' ', $this->category_type));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $category_type = $this->category_type;
        $category_type_heading = $this->category_type_heading;
        return view('admin.category.index', compact('category_type','category_type_heading'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories(Request $request){        
        $categories = Category::query()->ofType($this->category_type)->with('parent');
        
        if($this->category_type==config('constants.CATEGORY_TYPE_RINGTONE'))
            $categories->with('ringtones');
        else if($this->category_type==config('constants.CATEGORY_TYPE_PDF'))
            $categories->with('pdfs');

        return DataTables::of($categories)
            ->editColumn('parent.title', function ($category) {
                return isset($category->parent)?$category->parent->title:'';
            })
            ->filterColumn('parent.title', function ($query, $keyword) {
                $keyword = strtolower($keyword);
                $query->whereHas('parent', function($query) use ($keyword){
                    $query->whereRaw("LOWER(title) like ?", ["%$keyword%"]);
                });
            })

            ->addColumn('downloads', function ($category) {
                if($category->category_type==config('constants.CATEGORY_TYPE_RINGTONE'))
                    return $category->ringtones->sum('downloads');
                else if($category->category_type==config('constants.CATEGORY_TYPE_PDF'))
                    return $category->pdfs->sum('downloads');
                else
                    return 0;
            })

            ->editColumn('is_active', function ($category) {
                if($category->is_active == TRUE ){
                    return "<a href='".route('admin.categories.status',[$category->id,'category_type'=>isset($this->category_type)?$this->category_type:''])."'><span class='badge badge-success'>Active</span></a>";
                }else{
                    return "<a href='".route('admin.categories.status',[$category->id,'category_type'=>isset($this->category_type)?$this->category_type:''])."'><span class='badge badge-danger'>Inactive</span></a>";
                }
            })
            ->addColumn('action', function ($category) {
                return
                    // edit
                    '<a href="'.route('admin.categories.edit',[$category->id,'category_type'=>isset($this->category_type)?$this->category_type:'']).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a> '.
                    // Delete
                    Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit'=>"return confirm('Do you really want to delete?')",
                        'url' => route('admin.categories.destroy', [$category->id,'category_type'=>isset($this->category_type)?$this->category_type:'']))).
                        
                    ' <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>'.
                    Form::close();
            })
            ->rawColumns(['is_active','action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $category_type = $this->category_type;
        $category_type_heading = $this->category_type_heading;
        $categories = Category::ofType(config('constants.CATEGORY_TYPE_BUSINESS'))->where(['parent_id'=>0, 'is_active'=>TRUE])->pluck('title', 'id');
        return view('admin.category.form', compact('category_type','category_type_heading','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'title'=>['required', Rule::unique(with(new Category)->getTable(), 'title')->where(function ($query) {
                return $query->where(['category_type'=>$this->category_type]);
            })],
        ];

        $request->validate($rules);

        $data = $request->all();
        $data['category_type'] = $this->category_type;
        if(isset($data['parent_id']))
        {
            $data['parent_id'] = intval($data['parent_id']);
        }else
        {
            $data['parent_id'] = 0;
        }         

        Category::create($data);

        $request->session()->flash('success',__('global.messages.add'));
        return redirect()->route('admin.categories.index',['category_type'=>isset($this->category_type)?$this->category_type:'']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        $category_type = $this->category_type;
        $category_type_heading = $this->category_type_heading;
        $categories = Category::ofType(config('constants.CATEGORY_TYPE_BUSINESS'))->where(['parent_id'=>0])->pluck('title', 'id');
        return view('admin.category.form', compact('category_type','category_type_heading','categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category){
        $rules = [
            'title'=>['required',Rule::unique(with(new Category)->getTable(), 'title')->where(function ($query) {
                return $query->where(['category_type'=>$this->category_type]);;
            })->ignore($category->getKey())],
        ];

        $request->validate($rules);

        $data = $request->all();
        if(isset($data['parent_id'])){
            $data['parent_id'] = intval($data['parent_id']);
        }else
        {
            $data['parent_id'] = 0;
        }          

        $category->update($data);

        $request->session()->flash('success',__('global.messages.update'));
        return redirect()->route('admin.categories.index',['category_type'=>isset($this->category_type)?$this->category_type:'']);
    }

    /**
     * Change status the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $category_id=null){
        $category = Category::findOrFail($category_id);
        if (isset($category->is_active) && $category->is_active==FALSE) {
            $category->update(['is_active'=>TRUE]);
            $request->session()->flash('success',__('global.messages.activate'));
        }else{
            $category->update(['is_active'=>FALSE]);
            $request->session()->flash('danger',__('global.messages.deactivate'));
        }
        return redirect()->route('admin.categories.index',['category_type'=>isset($this->category_type)?$this->category_type:'']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category){
        if($category->id == config('constants.CATEGORY_TYPE_QURAN_ID')){
            $request->session()->flash('danger',__('global.messages.default_message_category'));
            return redirect()->route('admin.categories.index',['category_type'=>isset($this->category_type)?$this->category_type:'']); 
        }else{
           $category->delete();
           $request->session()->flash('danger',__('global.messages.delete'));
           return redirect()->route('admin.categories.index',['category_type'=>isset($this->category_type)?$this->category_type:'']); 
        }

       
        
    }
}

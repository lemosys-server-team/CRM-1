<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use DataTables;
use Form;

use App\Type;

class Types extends Controller
{
    protected $row_type;
    protected $row_type_heading;

    public function __construct(Request $request){

        $row_type = strtolower($request->input('row_type'));
        if($row_type!=""){
            if(!in_array($row_type, [
                config('constants.ROW_TYPE_AMAAL'), 
                config('constants.ROW_TYPE_BUSINESS'), 
                config('constants.ROW_TYPE_MIQAAT')
            ])){
                return redirect()->route('admin.types.index');                 
            }
            
        }

        $this->row_type = $row_type;
        $this->row_type_heading = ucwords(str_replace('_', ' ', $this->row_type));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $row_type = $this->row_type;
        $row_type_heading = $this->row_type_heading;
        return view('admin.type.index', compact('row_type','row_type_heading'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTypes(Request $request){        
        $types = Type::query()->ofType($this->row_type);

        return DataTables::of($types)
            ->editColumn('is_active', function ($type) {
                if($type->is_active == TRUE ){
                    return "<a href='".route('admin.types.status',[$type->id,'row_type'=>isset($this->row_type)?$this->row_type:''])."'><span class='badge badge-success'>Active</span></a>";
                }else{
                    return "<a href='".route('admin.types.status',[$type->id,'row_type'=>isset($this->row_type)?$this->row_type:''])."'><span class='badge badge-danger'>Inactive</span></a>";
                }
            })
            ->addColumn('action', function ($type) {
                return
                    // edit
                    '<a href="'.route('admin.types.edit',[$type->id,'row_type'=>isset($this->row_type)?$this->row_type:'']).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a> '.
                    // Delete
                    Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit'=>"return confirm('Do you really want to delete?')",
                        'url' => route('admin.types.destroy', [$type->id,'row_type'=>isset($this->row_type)?$this->row_type:'']))).
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
        $row_type = $this->row_type;
        $row_type_heading = $this->row_type_heading;
        return view('admin.type.form', compact('row_type','row_type_heading'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'title'=>['required', Rule::unique(with(new Type)->getTable(), 'title')->where(function ($query) {
                return $query->where(['row_type'=>$this->row_type]);
            })],
        ];
        
        if(isset($this->row_type) && $this->row_type!=config('constants.ROW_TYPE_BUSINESS'))
            $rules['color_code'] = 'required';

        $request->validate($rules);

        $data = $request->all();
        $data['row_type'] = $this->row_type;

        Type::create($data);

        $request->session()->flash('success',__('global.messages.add'));
        return redirect()->route('admin.types.index',['row_type'=>isset($this->row_type)?$this->row_type:'']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type){
        $row_type = $this->row_type;
        $row_type_heading = $this->row_type_heading;
        return view('admin.type.form', compact('row_type','row_type_heading','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type){
        $rules = [
            'title'=>['required',Rule::unique(with(new Type)->getTable(), 'title')->where(function ($query) {
                return $query->where(['row_type'=>$this->row_type]);;
            })->ignore($type->getKey())],
        ];
        
        if(isset($this->row_type) && $this->row_type!=config('constants.ROW_TYPE_BUSINESS'))
            $rules['color_code'] = 'required';

        $request->validate($rules);

        $data = $request->all();

        $type->update($data);

        $request->session()->flash('success',__('global.messages.update'));
        return redirect()->route('admin.types.index',['row_type'=>isset($this->row_type)?$this->row_type:'']);
    }

    /**
     * Change status the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $type_id=null){
        $type = Type::findOrFail($type_id);
        if (isset($type->is_active) && $type->is_active==FALSE) {
            $type->update(['is_active'=>TRUE]);
            $request->session()->flash('success',__('global.messages.activate'));
        }else{
            $type->update(['is_active'=>FALSE]);
            $request->session()->flash('danger',__('global.messages.deactivate'));
        }
        return redirect()->route('admin.types.index',['row_type'=>isset($this->row_type)?$this->row_type:'']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Type $type){
        $type->delete();
        $request->session()->flash('danger',__('global.messages.delete'));
        return redirect()->route('admin.types.index',['row_type'=>isset($this->row_type)?$this->row_type:'']);
    }
}

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product Categories</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">

        {!! Form::open(['method' => 'POST', 'url' => isset($category->id)?route('admin.product_categories.update',[$category->id]):route('admin.product_categories.store'),'class' => 'form-horizontal','id' => 'frmCategory']) !!}
        @csrf
        @if(isset($category->id))
        @method('PUT')
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($category->id)?'Edit':'Add' }} Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @if(isset($categories))
                    <div class="col-md-12 form-group {{$errors->has('parent_id') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label for="parent_id">Parent Category <span style="color:red">*</span></label>
                        {!! Form::select('parent_id', $categories, old('parent_id', isset($category->parent_id)?$category->parent_id:''), ['id'=>'parent_id', 'class' => 'form-control', 'placeholder' => 'Select Parent Category']) !!}

                        @if($errors->has('parent_id'))
                        <p class="help-block">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </p>
                        @endif
                    </div>
                    @endif
                    <div class="col-md-12 form-group {{$errors->has('title') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label for="title">Title <span style="color:red">*</span></label>
                        {!! Form::text('title', old('title', isset($category->title)?$category->title:''), ['id'=>'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}

                        @if($errors->has('title'))
                        <p class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </p>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>  
        <div class="card-footer">
            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Submit</button>
            <a href="{{route('admin.product_categories.index')}}"  class="btn btn-responsive btn-danger btn-sm">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#frmCategory').validate({
        rules: {
            title: {
                required: true
            }
        }
    });
});
</script>
@endsection

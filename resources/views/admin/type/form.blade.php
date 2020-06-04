@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ isset($row_type_heading)?$row_type_heading:'' }} Types</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        {!! Form::open(['method' => 'POST', 'url' => isset($type->id)?route('admin.types.update',[$type->id,'row_type'=>isset($row_type)?$row_type:'']):route('admin.types.store',['row_type'=>isset($row_type)?$row_type:'']),'class' => 'form-horizontal','id' => 'frmType']) !!}
        @csrf
        @if(isset($type->id))
        @method('PUT')
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($type->id)?'Edit':'Add' }} {{ isset($row_type_heading)?$row_type_heading:'' }} Type</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12 form-group {{$errors->has('title') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label for="title">Title <span style="color:red">*</span></label>
                        {!! Form::text('title', old('title', isset($type->title)?$type->title:''), ['id'=>'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}

                        @if($errors->has('title'))
                        <p class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </p>
                        @endif
                    </div>
                    @if(isset($row_type) && $row_type!=config('constants.ROW_TYPE_BUSINESS'))
                    <div class="col-md-4 form-group {{$errors->has('color_code') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label for="color_code">Color Code <span style="color:red">*</span></label>
                        {!! Form::text('color_code', old('color_code', isset($type->color_code)?$type->color_code:''), ['id'=>'color_code', 'class' => 'form-control', 'placeholder' => 'Color Code']) !!}

                        @if($errors->has('color_code'))
                        <p class="help-block">
                            <strong>{{ $errors->first('color_code') }}</strong>
                        </p>
                        @endif
                    </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>  
        <div class="card-footer">
            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Submit</button>
            <a href="{{route('admin.types.index',['row_type'=>isset($row_type)?$row_type:''])}}"  class="btn btn-responsive btn-danger btn-sm">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('styles')
<link href="{{ asset('admin-theme/vendor/bootstrap-colorpickersliders/dist/bootstrap.colorpickersliders.min.css') }}" rel="stylesheet">
<style>
.cp-popover-container .cp-hsvpanel-a.cp-transparency{
    display: none;
}
</style>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin-theme/vendor/bootstrap-colorpickersliders/tinycolor/tinycolor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-theme/vendor/bootstrap-colorpickersliders/dist/bootstrap.colorpickersliders.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    $('[name="color_code"]').ColorPickerSliders({
        color: "#c0c0c0",
        sliders: false,
        hsvpanel: true,
        //grouping: false,
        swatches: ["#ffffff","#c0c0c0","#808080","#000000","#ff0000","#800000","#ffff00","#808000","#00ff00","#008000","#00ffff","#008080","#0000ff","#000080","#ff00ff","#800080"],
        customswatches: false,
        previewformat: 'hex'
    });

    jQuery('#frmType').validate({
        rules: {
            title: {
                required: true
            },
            @if(isset($row_type) && $row_type!=config('constants.ROW_TYPE_BUSINESS'))
            color_code: {
                required: true
            },
            @endif
        }
    });
});
</script>
@endsection

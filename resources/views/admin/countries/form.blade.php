@extends('admin.layouts.app')

@section('content')
<div class="container-fluid"> 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Countries</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        {!! Form::open(['method' => 'POST', 'route' => isset($country->id)?['admin.countries.update',$country->id]:['admin.countries.store'],'class' => 'form-horizontal','id' => 'frmCountry', 'files' => true]) !!}
        @csrf
        @if(isset($country->id))
        @method('PUT')
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($country->id)?'Edit':'Add' }} Country</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12 form-group {{$errors->has('title') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label for="title">Title <span style="color:red">*</span></label>
                        {!! Form::text('title', old('title', isset($country->title)?$country->title:''), ['id'=>'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}

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
            <a href="{{route('admin.countries.index')}}"  class="btn btn-responsive btn-danger btn-sm">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#frmCountry').validate({
        rules: {
            title: {
                required: true
            }          
        }
    });
});
</script>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ isset($row_type_heading)?$row_type_heading:'' }} Types</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('admin.types.create',['row_type'=>isset($row_type)?$row_type:''])}}" class="btn btn-primary btn-sm btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add {{ isset($row_type_heading)?$row_type_heading:'' }} Type</span>
            </a>
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($row_type_heading)?$row_type_heading:'' }} Types</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="types">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('admin-theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">        
    jQuery(document).ready(function(){
        getTypes();
    });

    function getTypes(){
        jQuery('#types').dataTable().fnDestroy();
        jQuery('#types tbody').empty();
        jQuery('#types').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength:50,
            ajax: {
                url: "{{ route('admin.types.getTypes',['row_type'=>isset($row_type)?$row_type:'']) }}",
                method: 'POST',
                data: {
                }
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50,100,"All"]
            ],
            columns: [
                {data: 'title', name: 'title'},
                {data: 'color_code', name: 'color_code', visible: {{ (isset($row_type) && $row_type!=config('constants.CATEGORY_TYPE_BUSINESS'))?'true':'false' }}},
                {data: 'is_active', name: 'is_active', class: 'text-center', "width": "10%"},
                {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"},
            ]
        });
    }
</script>
@endsection
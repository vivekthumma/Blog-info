@extends($adminTheme)
@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-3 text-end">                    
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>                    
                </div>    
                <div class="col-md-12 my-3 text-end">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <th class="col-md-1">ID</th>
                                    <th class="col-md-1">Categories Name</th>
                                    <th class="col-md-1">SubCategories</th>
                                    <th class="col-md-1">Name</th>
                                    {{-- <th class="col-md-1">price</th> --}}
                                    <th class="col-md-1">Image</th>
                                    <th class="col-md-1">Status</th>
                                    <th class="col-md-1">Action</th>
                                    <th class="col-md-1" style="display: none;">Created At</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection

@section('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        order: [[ 5, "desc" ]],
        ajax: "{{ route('product.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'categories_id', name: 'categories_id'},
            {data: 'sub_categories_id', name: 'sub_categories_id'},
            {data: 'name', name: 'name'},
            // {data: 'price', name: 'price'},
            {data: 'image', name: 'image'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at', searchable: false, visible: false},
        ]
    });
    
  });
</script>
@endsection
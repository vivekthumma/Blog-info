@extends($adminTheme)
@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-3 text-end">
                    <div class="">
                        <a href="{{ route('category.create') }}" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">        
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-1">Name</th>
                                    <th class="col-md-1">status</th>
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
        order: [[ 4, "desc" ]],
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at', searchable: false, visible: false},
        ]
    });
    
  });
</script>
@endsection
@extends($adminTheme)

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-3 text-right">
                        <a href="{{ route('user.create') }}" class="btn btn-success m-1"><i class="fa fa-plus" aria-hidden="true"></i></a>                
                </div>            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">                        
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                    <th style="display: none;">Created At</th>
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
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'type', name: 'type'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at', searchable: false, visible: false},
        ]
    });
    
  });
</script>
@endsection
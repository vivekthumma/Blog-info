@extends($adminTheme)

@section('content')
    <div class="mx-auto mt-2">
        <a href="{{ route('category.index') }}" class="btn btn-primary float-right m-4">back</a>
    </div>
    <div class="row justify-content-center p-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">                    
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Detail</th>
                        </tr>                        
                        <tr>
                            <td>ID</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>                            
                                <td>Name</td>
                                <td>{{ $category->name }}</td> 
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                               @if($category->status == 0)
                                    <label class="badge badge-primary">Active</label>
                                @endif
                                @if($category->status == 1)
                                    <label class="badge badge-success">Deactive</label>
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
           
    </div>          
@endsection
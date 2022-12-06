@extends($adminTheme)

@section('content')
    <div class="mx-3 mt-2">
        <a href="{{ route('user.index') }}" class="btn btn-primary float-right">back</a>
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
                            <td>Id</td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>
                                @if($user->type == 0)
                                    <label class="badge badge-primary">user</label>
                                @endif
                                @if($user->type == 1)
                                    <label class="badge badge-success">admin</label>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    </div>          
@endsection
@extends($adminTheme)

@section('content')
    <div class="mx-auto mt-2">
         <a href="{{ route('subcategory.index') }}" class="btn btn-primary m-4 float-right">back</a>
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
                            <td>{{ $subcategory->id }}</td>
                        </tr>
                        <tr>
                            <td>Categories Name</td>
                            <td>
                                <select class="form-control form-select" name="categories_id"aria-label="Default select example">
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $key }}" class="" {{ ($key == $subcategory->categories_id) ? 'selected' : '' }}>{{$category}}</option>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $subcategory->sub_categories_name}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="/images/{{ $subcategory->image }}" width="100px" height="100px"></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>
                                @if($subcategory->status == 0)
                                    <label class="badge badge-primary">Active</label>
                                @endif
                                @if($subcategory->status == 1)
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
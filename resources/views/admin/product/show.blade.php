@extends($adminTheme)

@section('content')
    <div class="mx-auto mt-2">
        <a href="{{ route('product.index') }}" class="btn btn-primary float-right m-4">back</a>        
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
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>CategoriesName</td>
                            <td>
                                <select class="form-control form-select" name="categories_id" aria-label="Default select example">
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $key }}" class="" {{ ($key == $product->categories_id) ? 'selected' : '' }}>{{$category}}</option>
                                @endforeach

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>SubCategoriesName</td>
                            <td><select class="form-control form-select" name="sub_categories_id" aria-label="Default select example">
                                    @foreach ($sub_categories as $key => $sub_categorie)
                                        <option value="{{ $key }}" class=""{{ ($key == $product->sub_categories_id) ? 'selected' : '' }}>{{$sub_categorie}}</option>
                                    @endforeach

                                    </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="/images/{{ $product->image }}" width="100px" height="100px"></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>@if($product->status == 0)
                                    <label class="badge badge-primary">Active</label>
                                @endif
                                @if($product->status == 1)
                                    <label class="badge badge-success">Deactive</label>
                                @endif</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>            
    </div>          
@endsection
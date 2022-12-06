@extends($adminTheme)

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><span>{{ \App\Models\User::all()->count() }}</span></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                            <a href="{{ route('user.index') }}" class="small-box-footer">User info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><span>{{ \App\Models\Category::all()->count() }}</span><sup style="font-size: 20px"></sup></h3>
                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-cog fa-spin"></i>
                        </div>
                            <a href="{{ route('category.index') }}" class="small-box-footer">Category info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><span>{{ \App\Models\SubCategory::all()->count() }}</span></h3>
                            <p>Sub Category</p>
                        </div>
                        <div class="icon">
                            <i class=" icon fas fa-solid fa-truck"></i>
                        </div>
                            <a href="{{ route('subcategory.index') }}" class="small-box-footer">SubCategory info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ \App\Models\Product::all()->count() }}</h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                            <a href="{{ route('product.index') }}" class="small-box-footer">Products info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
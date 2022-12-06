@extends($adminTheme)
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><strong>Edit Product</strong> </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('product.index') }}" class="btn btn-primary float-right">back</a>
                    </div>
                </div>
            </div>
        </div>
      <!-- main row -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($product,['route' => ['product.update',$product->id,'enctype' => 'multipart/form-data']]) !!}
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}                                                                                                
                        <div class="row">                    
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-md-12">
                                    {{ Form::label('name','name') }}<span class="text-danger">*</span>
                                    {{ Form::text('name', NULL,  ['class' => 'form-control']) }}                                    
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                {{ Form::label('categories_id','categories_id') }}<span class="text-danger">*</span>
                                {!! Form::select('categories_id', $categories, null, array('class' => 'form-control form-select')) !!}                                                                
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    {{ Form::label('sub_categories_id','sub_categories_id') }}<span class="text-danger">*</span>
                                    {!! Form::select('sub_categories_id', $sub_categories, null, array('class' => 'form-control form-select')) !!}                                                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-12">
                                        {{ Form::label('image','image') }}<span class="text-danger">*</span>
                                        {{ Form::file('image'),['class' => 'form-control'] }}                                                                            
                                    </div>                                                                        
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6">
                                        {{ Form::label('price','price') }}<span class="text-danger">*</span>
                                        {{ Form::text('price', null, ['class' => 'form-control']) }}
                                </div>
                                <div class=" col-md-6">
                                    {{ Form::label('status','Status') }}<span class="text-danger">*</span>
                                    <div>                
                                        <input type="checkbox" class="form-control" name="status" value="0" {{$product->status == '0' ? 'checked' : '' }} data-off-color = 'danger' data-on-color = 'success' data-off-text = 'No' data-on-text = 'Yes' data-bootstrap-switch>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        
                        </div>  
                    {!! Form::close() !!}                   
                </div>
            </div>
        </div>
        

        
@endsection
@section('script')
<script type="text/javascript">
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
@endsection
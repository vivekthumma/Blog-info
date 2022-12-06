@extends($adminTheme)
@section('content')
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><strong>Add Product</strong> </h1>
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
                    {!! Form::open(['route' => 'product.store','method' =>'post', 'enctype' => 'multipart/form-data']) !!}                
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-md-12">
                                    {{ Form::label('name','Name') }}<span class="text-danger">*</span>
                                    {!! Form::Text('name', 'Name', array('class' => 'form-control')) !!}                                    
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">                                    
                                    {{ Form::label('categories_id','CategoriesName') }}<span class="text-danger">*</span>
                                    {!! Form::select('categories_id', $categories, null, array('class' => 'form-control form-select')) !!}                                    
                                    @if ($errors->has('categories_id'))
                                            <span class="text-danger">{{ $errors->first('categories_id') }}</span>
                                    @endif
                                </div>                                
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="col-md-12">
                                    {{ Form::label('image','Image') }}<span class="text-danger">*</span>
                                    {{ Form::file('image'),['class' => 'form-control'] }}                                    
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>                                                                        
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('price','price') }}<span class="text-danger">*</span>
                                {{ Form::text('price', null, ['class' => 'form-control']) }}                                                                
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                {{ Form::label('description','Description') }}<span class="text-danger">*</span>
                                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}                            
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 form-group append-subcategory">                                    
                                    {{ Form::label('sub_categories_id','SubCategories') }}<span class="text-danger">*</span>
                                    {!! Form::select('sub_categories_id', $sub_categories, null, array('class' => 'form-control form-select')) !!}
                                    @if ($errors->has('sub_categories_id'))
                                            <span class="text-danger">{{ $errors->first('sub_categories_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>                   
                            <div class=" col-md-6">
                                <label>Status</label>
                                <div>                
                                    <input type="checkbox" class="form-control" name="status"value="0" data-off-color = 'danger' data-on-color = 'success' data-off-text = 'No' data-on-text = 'Yes' data-bootstrap-switch>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right p-1">
                                {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
                            </div>
                            <div class="col-md-6">
                                 <a href="{{ route('product.create') }}" class="btn btn-danger mt-1">Cancel</a>
                            </div>       
                        </div>
                    {!! Form::close() !!} 
                </div>
			</div>
        </div>
		

		
@endsection
@section('script')
<script type="text/javascript">
    $('#categories_id').on('change', function () {
                var idCategory = this.value;
                $.ajax({                    

                    url: "{{ route('get-subcategory') }}",
                    type: "POST",
                    data: {
                        categories_id: idCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('body').find('.append-subcategory').html(data);
                        // $.each(data.sub_categories, function (fetchSubCategory, $key) {
                        // alert('hi');
                        //     $("#sub_categories").append('<option value="' + sub_categorie
                        //         .id + '">' + sub_categorie.name + '</option>');
                        // });
                    
                    }
                });
            });
</script>

<script type="text/javascript">
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
@endsection
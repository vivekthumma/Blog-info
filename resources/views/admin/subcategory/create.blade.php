@extends($adminTheme)
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><strong>Add Sub Category</strong> </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('subcategory.index') }}" class="btn btn-primary float-right">back</a>
                    </div>
                </div>
            </div>
        </div>
      <!-- main row -->
        <div class="container-fluid">
			<div class="card">
				<div class="card-body">        
                    {!! Form::open(['route' => 'subcategory.store','method' =>'post', 'enctype' => 'multipart/form-data']) !!}                                                           
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-md-12">
                                    {{ Form::label('sub_categories_name','SubCategories') }}<span class="text-danger">*</span>
                                    {!! Form::Text('sub_categories_name', 'SubCategories', array('class' => 'form-control')) !!}
                                    @if ($errors->has('sub_categories_name'))
                                        <span class="text-danger">{{ $errors->first('sub_categories_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                {{ Form::label('categories_id','CategoriesName') }}<span class="text-danger">*</span>
                                {!! Form::select('categories_id', $categories, null, array('class' => 'form-control form-select')) !!}
                                @if ($errors->has('categories_id'))
                                        <span class="text-danger">{{ $errors->first('categories_id') }}</span>
                                @endif
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

                            <div class=" col-md-6">
                                <label>Status</label>
                                <div>                
                                    <input type="checkbox" class="form-control" name="status"value="0" data-off-color = 'danger' data-on-color = 'success' data-off-text = 'No' data-on-text = 'Yes' data-bootstrap-switch>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right p-1">
                                {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}                                                            
                            </div>
                            <div class="col-md-6">
                                 <a href="{{ route('subcategory.create') }}" class="btn btn-danger mt-1">Cancel</a>
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
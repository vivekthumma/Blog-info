@extends($adminTheme)
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Category</h1>
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
                    {!! Form::model($subcategory,['route' => ['subcategory.update','method' =>'PUT',$subcategory->id,'enctype' => 'multipart/form-data']]) !!}                                                                  
                    {{-- {{ info($subcategory->sub_categories_name) }} --}}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-md-12">
                                    {{ Form::label('sub_categories_name','Name') }}<span class="text-danger">*</span>
                                    {{ Form::text('sub_categories_name', NULL,  ['class' => 'form-control']) }}                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('categories_id','CategoriesName') }}<span class="text-danger">*</span>
                                {!! Form::select('categories_id', $categories, null, array('class' => 'form-control form-select')) !!}                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('image','Image') }}<span class="text-danger">*</span>
                                {{ Form::file('image'),['class' => 'form-control'] }}
                            </div>
                            <div class="col-md-6">
                                <div>                                    
                                {{ Form::label('status','Status') }}<span class="text-danger">*</span>
                                </div>
                                <input type="checkbox" name="status" value="0" {{$subcategory->status == '0' ? 'checked' : '' }}  data-off-color = 'danger' data-on-color = 'success' data-off-text = 'Inactive' data-on-text = 'Active' data-bootstrap-switch>
                            </div>
                        </div>                            
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right p-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
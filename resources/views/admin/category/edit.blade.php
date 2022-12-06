@extends($adminTheme)
@section('content')
    
       
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Update</h1>
                </div>
                <div class="col-sm-6 text-right">
                        <a href="{{ route('category.index') }}" class="btn btn-primary float-right">back</a>
                    </div>
            </div>
        </div>
    </div>
      <!-- main row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">                
                {!! Form::model($category,['route' => ['category.update',$category->id,'enctype' => 'multipart/form-data']]) !!}                                                    
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('name','Name') }}<span class="text-danger">*</span>
                                {{ Form::text('name', NULL,  ['class' => 'form-control']) }}                                
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div>
                                {{ Form::label('status','Status') }}<span class="text-danger">*</span>
                            </div>
                            <input type="checkbox" name="status" value="0" {{$category->status == '0' ? 'checked' : '' }}  data-off-color = 'danger' data-on-color = 'success' data-off-text = 'No' data-on-text = 'Yes' data-bootstrap-switch>        
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6 text-right">
                                 <a href="{{ route('category.create') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>                           
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </div>                          
                {!! Form::close() !!}                   
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

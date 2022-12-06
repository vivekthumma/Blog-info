@extends($adminTheme)
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><strong>Add Category</strong> </h1>
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
                    {!! Form::open(['route' => 'category.store','method' =>'post']) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">                                    
                                    {{ Form::label('name','Name') }}<span class="text-danger">*</span>
                                    {!! Form::Text('name', 'name', array('class' => 'form-control')) !!}                                
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div>
                                    <label>Status:</label>
                                </div>                           
                                <input type="checkbox" name="status" value="0" data-off-color = 'danger' data-on-color = 'success' data-off-text = 'No' data-on-text = 'Yes' data-bootstrap-switch>                                                                            

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                 <a href="{{ route('category.create') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>                           
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}                            
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
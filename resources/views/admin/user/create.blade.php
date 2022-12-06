@extends($adminTheme)
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i><strong>User Create</strong></i></h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('user.index') }}" class="btn btn-info float-right">back</a>
                    </div>
                </div>
            </div>
        </div>
      <!-- main row -->
        <div class="container-fluid">
			<div class="card">
				<div class="card-body">
                    {{-- <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"> --}}
                    {!! Form::open(['route' => 'user.store','method' =>'post']) !!}                    
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
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('email','email') }}<span class="text-danger">*</span>
                                    {!! Form::Text('email', 'email', ['class' => 'form-control', 'placeholder' => 'Email']) !!}                                    
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password') }}<span class="text-danger">*</span>
                                    {!! Form::Password('password',['class' => 'form-control', 'placeholder' =>'Password']) !!}                                
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif                                                                        
                                </div>
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('confirm_password') }}<span class="text-danger">*</span>
                                    {!! Form::Password('confirm_password',['class' => 'form-control', 'placeholder' =>'ConfirmPassword']) !!}
                                    @if ($errors->has('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif                                                                                                            
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            {{ Form::label('type') }}<span class="text-danger">*</span>
                            {!! Form::select('type',['0' => 'User','1'=>'Admin'],null, ['class'=>'form-control','placeholder'=>'Pick a User']) !!}                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                            {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}                            
                        </div>  
                    {!! Form::close() !!}                                                 
                </div>
			</div>
        </div>
		

		
@endsection

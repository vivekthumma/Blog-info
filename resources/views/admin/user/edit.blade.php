@extends($adminTheme)
@section('content')
    
       
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Update</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('user.index') }}" class="btn btn-warning float-right">back</a>
                </div>
            </div>
        </div>
    </div>
      <!-- main row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">                
                {!! Form::model($user,['route' => ['user.update','method' =>'PUT',$user->id,'enctype' => 'multipart/form-data']]) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('name','Name') }}<span class="text-danger">*</span>
                                {{ Form::text('name', NULL,  ['class' => 'form-control']) }}                                
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('email','Email') }}<span class="text-danger">*</span>
                                {{ Form::text('email', NULL,  ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                     <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password','Password') }}<span class="text-danger">*</span>                                    
                                    {!! Form::Password('password',['class' => 'form-control', 'placeholder' =>'Password']) !!}                        
                                </div>
                            </div>
                            
                        <div class="col-md-6 mt-">
                            {{ Form::label('type','Type') }}<span class="text-danger">*</span>
                            {!! Form::select('type',['0' => 'User','1'=>'Admin'],null, ['class'=>'form-control','placeholder'=>'Pick a User']) !!}                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                {!! Form::close() !!}                              
            </div>
        </div>


        
@endsection

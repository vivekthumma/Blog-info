
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aatman infotech</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="{{asset('adminTheme/plugins/fontawesome-free/css/all.min.css')}}">    

    <link rel="stylesheet" href="{{asset('adminTheme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">    
    
    <link rel="stylesheet" href="{{asset('adminTheme/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="../../">
   
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>Aatman Infotech</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="email" class="form-control" placeholder="Email" id="email_address" name="email">                                                
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="m-2">
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="m-2">
                        @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                   <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mt-2">
                    <a href="{{ route('register') }}">Ragister</a>
                </p>
            </div>
        </div>
    </div>

<script src="{{ asset('adminTheme/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('adminTheme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('adminTheme/dist/js/adminlte.min.js')}}"></script>

</body>
</html>

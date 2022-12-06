<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aatamn infotech</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('adminTheme/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminTheme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminTheme/dist/css/adminlte.min.css?v=3.2.0')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script nonce="6c6e5528-78d6-4a94-81c4-d5a3106321b0">(function(w,d){!function(Z,_,ba,bb){Z.zarazData=Z.zarazData||{};Z.zarazData.executed=[];Z.zaraz={deferred:[],listeners:[]};Z.zaraz.q=[];Z.zaraz._f=function(bc){return function(){var bd=Array.prototype.slice.call(arguments);Z.zaraz.q.push({m:bc,a:bd})}};for(const be of["track","set","debug"])Z.zaraz[be]=Z.zaraz._f(be);Z.zaraz.init=()=>{var bf=_.getElementsByTagName(bb)[0],bg=_.createElement(bb),bh=_.getElementsByTagName("title")[0];bh&&(Z.zarazData.t=_.getElementsByTagName("title")[0].text);Z.zarazData.x=Math.random();Z.zarazData.w=Z.screen.width;Z.zarazData.h=Z.screen.height;Z.zarazData.j=Z.innerHeight;Z.zarazData.e=Z.innerWidth;Z.zarazData.l=Z.location.href;Z.zarazData.r=_.referrer;Z.zarazData.k=Z.screen.colorDepth;Z.zarazData.n=_.characterSet;Z.zarazData.o=(new Date).getTimezoneOffset();Z.zarazData.q=[];for(;Z.zaraz.q.length;){const bl=Z.zaraz.q.shift();Z.zarazData.q.push(bl)}bg.defer=!0;for(const bm of[localStorage,sessionStorage])Object.keys(bm||{}).filter((bo=>bo.startsWith("_zaraz_"))).forEach((bn=>{try{Z.zarazData["z_"+bn.slice(7)]=JSON.parse(bm.getItem(bn))}catch{Z.zarazData["z_"+bn.slice(7)]=bm.getItem(bn)}}));bg.referrerPolicy="origin";bg.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));bf.parentNode.insertBefore(bg,bf)};["complete","interactive"].includes(_.readyState)?zaraz.init():Z.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Register</b>New Member</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" placeholder="Full name" id="name" name="name">                            
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="m-2">                        
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
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
                    <div>
                        <select class="form-select" id="type" name="type" required focus aria-label="Default select example">
                        <option selected>Pick a User</option>
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                    <div class="row justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary btn btn-block">Register</button>
                    </div>
                    </div>
                </form>
                <div class="mt-2">
                    <a href="{{ route('login') }}" class="text-center">log in</a>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('adminTheme/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('adminTheme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('adminTheme/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>
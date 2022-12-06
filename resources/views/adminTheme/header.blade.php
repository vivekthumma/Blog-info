<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">  
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-power-off"></i></a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
  </nav>
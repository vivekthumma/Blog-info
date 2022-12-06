 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminTheme/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminTheme/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog fa-spin"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('subcategory.index') }}" class="nav-link {{ request()->is('subcategory*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-truck"></i>
              <p>
                SubCategory
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('product.index') }}" class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
               Product
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

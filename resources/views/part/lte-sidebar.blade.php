<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
  <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        {{ $d_user->name ? $d_user->name : '' }}
        ({{ $d_user->role ? $d_user->role : '' }})
      </a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    @if ($d_user->role == 'admin')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('perbaikan.dashadmin') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">PERBAIKAN</li>
        <li class="nav-item">
          <a href="{{ route('perbaikan.proses') }}" class="nav-link {{ (request()->is('admin/perbaikan*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-file"></i>
            <p>
              Proses Perbaikan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('perbaikan.tutup') }}" class="nav-link {{ (request()->is('admin/perbaikan*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-file"></i>
            <p>
              Tutup Perbaikan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('perbaikan.index') }}" class="nav-link {{ (request()->is('admin/perbaikan*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-file"></i>
            <p>
              History Perbaikan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-header">MASTER DATA</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Ruangan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Pegawai
            </p>
          </a>
        </li>
        <li class="nav-header">OTHER</li>
        <li class="nav-item">
          <a href="{{ route('auth.changepassword') }}" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('auth.logout') }}" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    @elseif ($d_user->role == 'pegawai')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('perbaikan.dashadmin') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">PERBAIKAN</li>
        <li class="nav-item">
          <a href="{{ route('perbaikan.ajukan') }}" class="nav-link {{ (request()->is('admin/perbaikan*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-file"></i>
            <p>
              Ajukan Perbaikan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('perbaikan.history') }}" class="nav-link {{ (request()->is('admin/perbaikan*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-file"></i>
            <p>
              History Perbaikan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-header">OTHER</li>
        <li class="nav-item">
          <a href="{{ route('auth.profile') }}" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('auth.changepassword') }}" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('auth.logout') }}" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    @endif
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
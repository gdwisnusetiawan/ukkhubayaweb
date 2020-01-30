<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">UKKH UBAYA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://my.ubaya.ac.id/img/mhs/160416119_m.jpg" class="rounded elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Gede Wisnu Setiawan</a>
        <p class="text-muted m-0 p-0">160416119</p>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview
          @if (request()->is('home*'))
            {{ 'menu-open' }}
          @endif
        ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Beranda
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dasboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Organisasi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview
          @if (request()->is('users*') || request()->is('members*') || request()->is('faculties*') || request()->is('periods*') || request()->is('positions*'))
            {{ 'menu-open' }}
          @endif
        ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('members.index') }}" class="nav-link {{ (request()->is('members*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Anggota</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('faculties.index') }}" class="nav-link {{ (request()->is('faculties*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Fakultas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('periods.index') }}" class="nav-link {{ (request()->is('periods*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Periode</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('positions.index') }}" class="nav-link {{ (request()->is('positions*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Posisi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kepengurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Program Kerja</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-link"></i>
            <p>
              Sample link
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
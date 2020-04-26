<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('admin-lte/dist/img/ukkhubayalogo.png') }}" alt="Ukkh Ubaya Logo" class="brand-image img-circle elevation-3" style="background: #fff;">
    <span class="brand-text font-weight-light">{{ config('app.name', 'UKKH UBAYA') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->id == 'admin1')
          <img src="{{ asset('admin-lte/dist/img/avataaars.png') }}" class="rounded elevation-2 bg-light" alt="User Image">
        @else
          <img src="https://my.ubaya.ac.id/img/mhs/{{ Auth::user()->id }}_m.jpg" class="rounded elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info mt-0 pt-0">
        <a href="{{ route('members.show', auth()->user()->member) }}" class="d-block">{{ Auth::user()->name }}</a>
        <p class="text-muted m-0 p-0">{{ Auth::user()->id }}</p>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="true">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
      @if (request()->is('home*') || (request()->is('profiles*')))
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
      @else
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
      @endif
            <i class="nav-icon fas fa-home"></i>
            <p>
              Beranda
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dasboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('profiles.index') }}" class="nav-link {{ (request()->is('profiles*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Organisasi</p>
              </a>
            </li>
          </ul>
        </li>

        @if (request()->is('periods*') || request()->is('managements*'))
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
        @else
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
        @endif
            <i class="nav-icon fas fa-users"></i>
            <p>
              Kepengurusan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('periods.index') }}" class="nav-link {{ (request()->is('periods*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Periode</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('managements.index') }}" class="nav-link {{ (request()->is('managements*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengurus</p>
              </a>
            </li>
          </ul>
        </li>

        @if (request()->is('events*') || request()->is('committees*') || request()->is('programs*'))
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
        @else
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
        @endif
            <i class="nav-icon fas fa-clipboard"></i>
            <p>
              Kepanitiaan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('programs.index') }}" class="nav-link {{ (request()->is('programs*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Program Kerja</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('events.index') }}" class="nav-link {{ (request()->is('events*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kegiatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('committees.index') }}" class="nav-link {{ (request()->is('committees*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Panitia</p>
              </a>
            </li>
          </ul>
        </li>

        @if (request()->is('users*') || request()->is('members*') || request()->is('faculties*') || request()->is('positions*') || request()->is('contacts*'))
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
        @else
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
        @endif
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
                <p>Akun</p>
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
              <a href="{{ route('positions.index') }}" class="nav-link {{ (request()->is('positions*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Posisi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contacts.index') }}" class="nav-link {{ (request()->is('contacts*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kontak</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Help
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              About
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
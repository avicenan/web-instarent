<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="mx-3 mt-4 mb-2 sidebar-heading">MENU</li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/home') ? 'active' : '' }}" aria-current="page" href="/dashboard/home">
          <i data-feather="home"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/rents*') ? 'active' : '' }}" aria-current="page" href="/dashboard/rents">
          <i data-feather="file"></i>
          Sewa
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/vehicles*') ? 'active' : '' }}" href="/dashboard/vehicles">
          <i data-feather="truck"></i>
          Kendaraan
        </a>
      </li>
      <li class="mx-3 mt-4 mb-2 sidebar-heading" >LAINNYA</li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/account') ? 'active' : '' }}" href="/profile">
          <i data-feather="user"></i>
          Akun
        </a>
      </li>
    </ul>
  </div>
</nav>
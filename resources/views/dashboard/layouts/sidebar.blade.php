<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <i data-feather="home"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/vehicles') ? 'active' : '' }}" href="/dashboard/vehicles">
          <i data-feather="truck"></i>
          My Vehicle
        </a>
      </li>
    </ul>
  </div>
</nav>
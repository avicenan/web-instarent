<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-2 shadow-sm">
  <img src="../../img/instarent-logo.png" class="float-start ms-2" alt="" width="35px">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light" href="#" style="font-family: Pattaya">Instarent</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-light" type="text" placeholder="Search" aria-label="Search">

  {{-- Profile --}}
  <ul class="auth-button list-unstyled my-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fweig-bold">
            {{ auth()->user()->fname }} {{ auth()->user()->lname }}
        </span>
      </a>
      <ul class="dropdown-menu rounded-0">
        <li><a class="dropdown-item" href="/profile"><i data-feather="user"></i> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <a class="dropdown-item" href="/"/><i data-feather="home"></i> User Home</a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 my-1 border-0 bg-danger rounded text-light">Logout <i data-feather="log-out"></i></button>
      </form>
    </div>
  </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light top-0 position-absolute w-100 p-2 main-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/instarent-logo.png" alt="" width="40px">
        <span class="fw-semibold mx-2 fs-5" >InstaRent</span>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('vehicles') ? 'active' : '' }}" href="/vehicles">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('favorite') ? 'active' : '' }}" href="/favorite">Favorit</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('rent') ? 'active' : '' }}" href="/rent">Reservasi</a>
          </li>
          @auth<li class="nav-item me-2">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Administrator</a>
          </li>
          @endauth
          <li class="nav-item">
          </li>
        </ul>
        <ul class="navbar-nav auth-button">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back,
              <span class="fweig-bold">
                 {{ auth()->user()->fname }} {{ auth()->user()->lname }}
              </span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-fill"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-items">
            <div class="d-flex" role="search">
              <a href="/login">
                <button class="btn btn-outline-success btn-light px-5 py-2 me-2" type="button"><i class="bi bi-box-arrow-in-right"></i> Masuk</button>
              </a>
              <a href="/register">
                <button class="btn btn-outline-success btn-success text-white px-5 py-2 ms-2" type="button">Daftar</button>
              </a>
            </div>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
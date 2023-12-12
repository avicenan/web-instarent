<nav class="navbar navbar-expand-lg top-0 position-absolute w-100 p-2 main-navbar" style="background-color: #ffd53e; z-index: 99;">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/instarent-logo.png" alt="" width="40px">
        <span class=" ms-2 my-auto fsize-8" style="font-family: Pattaya">Instarent</span>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" style="">
          <li class="nav-item">
            <a class="nav-link fsize-5 {{ Request::is('vehicles') ? 'active' : '' }}" href="/vehicles?start_date={{ session('start_date') }}&end_date={{ session('end_date') }}">Reservasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fsize-5 {{ Request::is('favorite') ? 'active' : '' }}" href="/favorite">Favorit</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link fsize-5 {{ Request::is('catalog') ? 'active' : '' }}" href="/catalog">Katalog</a>
          </li>
          @auth<li class="nav-item me-2">
            <a class="nav-link fsize-5 {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Administrator</a>
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
                <button class="btn btn-light px-3 py-1 me-2 fsize-4" type="button"><i class="bi bi-box-arrow-in-right"></i> Masuk</button>
              </a>
              <a href="/register">
                <button class="btn btn-success text-white px-3 py-1 ms-2 fsize-4" type="button">Daftar</button>
              </a>
            </div>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
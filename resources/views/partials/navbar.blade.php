<nav class="navbar navbar-expand-lg w-100 main-navbar " style="background-color: #ffd53e; z-index: 99;">
    <div class="container col-lg-10" style="padding: 0 5%; max-width: 1650px">
      <a class="navbar-brand" href="/">
        <div class="row">
          <div class="col-2">
            <img src="/img/instarent-logo.png" alt="" width="40px">
          </div>
          <div class="col-2">
            <h5 class=" ms-4 fsize-8 mt-2" style="font-family: Pattaya">Instarent</h5>
          </div>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" style="">
          <li class="nav-item">
            <a class="nav-link fsize-5 {{ Request::is('vehicles') ? 'active' : '' }}" href="/vehicles?start_date={{ session('start_date') }}&end_date={{ session('end_date') }}">Sewa Kendaraan</a>
          </li>
          {{-- <li class="nav-item me-2">
            <a class="nav-link fsize-5 {{ Request::is('catalog') ? 'active' : '' }}" href="/catalog">Katalog</a>
          </li> --}}
          <li class="nav-item">
            <a href="#footer" class="nav-link fsize-5">Kontak</a>
          </li>
        </ul>
        <ul class="navbar-nav auth-button">
          @auth
          <li class="nav-item dropdown auth-button">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="fweig-bold">
                 {{ auth()->user()->fname }} {{ auth()->user()->lname }}
              </span>
            </a>
            <ul class="dropdown-menu dropstart">
              <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-fill me-3"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/rented"><i data-feather="file-text" class="feather-16 me-3"></i> Riwayat Sewa</a></li>
              <li><hr class="dropdown-divider"></li>
              @auth
              @if (auth()->user()->usertype == 'admin')
              <li>
                <a class="dropdown-item {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i data-feather="tool" class="feather-16 me-3"></i> Admin Menu</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              @endif
              @endauth
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-3"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-items auth-button">
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
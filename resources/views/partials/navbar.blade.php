<nav class="navbar navbar-expand-lg navbar-light top-0 position-absolute w-100 p-2 main-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/instarent-logo.png" alt="" width="50px">
        <span class="fw-semibold mx-2" >InstaRent</span>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "vehicles") ? 'active' : '' }}" href="/vehicles">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">Favorit</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link {{ ($active === "reservation") ? 'active' : '' }}" href="/posts">Reservasi</a>
          </li>
          <li class="nav-item">
            <form class="d-flex" role="search">
                <a href="/login">
                  <button class="btn btn-outline-success btn-light px-5 py-2 me-2" type="button">Masuk</button>
                </a>
                <a href="/register">
                  <button class="btn btn-outline-success btn-success text-white px-5 py-2 ms-2" type="button">Daftar</button>
                </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
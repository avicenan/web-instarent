<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,700&family=Recursive&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
        
        {{-- Google Material Icons --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        
        <style>
            .material-symbols-outlined {
              font-variation-settings:
              'FILL' 0,
              'wght' 400,
              'GRAD' 0,
              'opsz' 24
            }
        </style>

        {{-- Bootsrap Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <title>Instarent</title>
    </head>
    <body style="background-color: #F7F7F7">

        @if (!(Route::is('home'))) 
            @include('partials.navbar')
        @endif

        <div class="row justify-content-center m-0">
            <div class="page-container col-lg-10" style="padding: 0 5%; max-width: 1650px">
                @yield('container')
            </div>
        </div>

        <!-- Footer -->
  <footer style="background-color: #D8F3DC; min-height: 500px" class="mt-5">
    <div class="row justify-content-center" style="background-color: #D8F3DC; max-width: 100%;">
      <div class="row pt-4 px-5">
        <div class="col-md">
          <div class="d-flex">
            <div class="row pt-3">
              <a class="navbar-brand fw-bold" href="#" style="color: black;">
                <img src="{{ asset('img/instarent-logo.png') }}" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Instarent
              </a>
              <p class="pt-4">Sangat puas menggunakan InstaRent. Proses pemesanan yang cepat dan mudah membuat perencanaan perjalanan jauh lebih nyaman. Layanan pelanggan yang responsif dan ramah</p>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="row pt-3 ">
            <p class="navbar-brand fw-bold" href="#" style="color: black;">
              Tentang Kami  
            </p>
            <div class="row row-cols-1 pt-2">
              <div class="col pb-1"> 
                <a href="" style="text-decoration: none; color: #4B4B4B;">Profil Perusahaan</a>
              </div>
              <div class="col">
                <a href="" style="text-decoration: none; color: #4B4B4B;">Profil Pengembang</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="row pt-3">
            <p class="navbar-brand fw-bold" href="#" style="color: black;">
              FAQ
            </p>
            <div class="row row-cols-1 pt-2">
              <div class="col pb-1"> 
                <a href="" style="text-decoration: none; color: #4B4B4B;">Pertanyaan</a>
              </div>
              <div class="col pb-1">
                <a href="" style="text-decoration: none; color: #4B4B4B;">Jawaban</a>
              </div>
              <div class="col">
                <a href="" style="text-decoration: none; color: #4B4B4B;">Bantuan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="row pt-3 ">
            <p class="navbar-brand fw-bold" href="#" style="color: black;">
              Kontak
            </p>
            <div class="row row-cols-1 pt-2 " >
              <div class="col pb-1"> 
                +62 812 1222 7772
              </div>
              <div class="col pb-1">
                instasoulutiongroup2022 <span style="margin-left: -5px;">@gmail.com</span>
              </div>
              <div class="col pb-1">
                Jl. Raya Bojongsoang Komplek PBB Ruko R-11 Lengkong, Lengkong, Kec.
Bojongsoang, Kabupaten Bandung, Jawa Barat 40287
              </div>
              <div class="col ">
                <a href="" class="pe-1"><img src="instagram.png" alt=""></a>
                <a href="" class="pe-1"><img src="whatsapp.png" alt=""></a>
                <a href="" class="pe-1"><img src="tiktok.png" alt=""></a>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
</footer>
<!-- Akhir Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            
        <script>
            feather.replace();
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                var scrollpos = sessionStorage.getItem('scrollpos');
                if (scrollpos) {
                    window.scrollTo(0, scrollpos);
                    sessionStorage.removeItem('scrollpos');
                }
            });

            window.addEventListener("beforeunload", function (e) {
                sessionStorage.setItem('scrollpos', window.scrollY);
            });
        </script>

        @yield('scripts')
    
    </body>
</html>
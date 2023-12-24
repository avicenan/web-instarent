@include('partials.navbar')

@extends('layouts.main')

{{-- Hero start --}}
<div class="hero bg-prim row justify-content-center p-0 m-0" style="max-height: 35vh; width: 100%; z-index:-99;">
  <div class="col-lg-10 hero-content mt-4" style="padding: 0 5%; max-width: 1650px">
    <div class="hero-items">
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-lg-5">
                  <h4 class="hero-text-prim fw-semibold fsize-11 mb-3 text-white">Best Place to<br>Rented a Dream<br>Vechicles</h4>
                  <h5 class="hero-text-sec text-white fw-medium fsize-4 lh-base" >Tidak perlu mencari lebih jauh, InstaRent adalah tempat terbaik untuk menyewa kendaraan impian Anda</h5>
              </div>
              <div class="col-lg-7 text-end position-relative">
                  <a href="/vehicles?start_date={{ session('start_date') }}&end_date={{ session('end_date') }}&search=vespa#search">
                    <div class="card card-sale position-absolute rounded-5 border-0" style="height: 120px; width:120px; left:50px;
                    background: var(--White, #FFF);">
                    </div>
                  </a>
                  <img src="/img/home-hero-car.png" class="hero-car-img mt-4 img-fluid" alt="" style="max-height: 250px">
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<div class="hero-sec bg-yellow8" style="height: 8.7vh"></div>
{{-- Hero end --}}

@section('container')

{{-- Brand start --}}
<div class="brand my-4 mx-2"">
    <div class="row mb-4">
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
      <div class="col text-center">
        <img src="/img/car-brand-1.png" alt="toyota" class="img-fluid" style="max-height: 50px">
      </div>
    </div>
</div>
{{-- Brand end --}}

{{-- Catalog start --}}
<div class="catalog my-4 mt-5">
  <div class="row">
    <div class="col fw-bold fs-2" style="color: black; ">
      Katalog
    </div>
    <div class="col text-end">
      <h2><a href="/catalog" style="color: #52B788; font-size: medium;">Lihat Semua</a></h2>
    </div>
  </div>

  <div class="row pt-4" >
    @foreach ($vehicles as $vehicle)
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-sm mb-3 bg-body rounded border-0 p-3" style="max-height: 300px;">
          <div class="containers">
            <div class="row">
              <div class="col-11 fw-bold">{{ $vehicle->brand->name . ' ' . $vehicle->title }}</div>
              <div class="col-1"><img src="Heart.png" style="cursor: pointer;"id="heart-G2"  alt=""></div>
            </div>
            <div class="row mb-3">
              @if ($vehicle->image)
                <img src="{{ asset('/storage/' . $vehicle->image) }}" style="
                height: 140px;
                object-fit:scale-down;
                object-position: center;" alt="">
              @else
                <img src="/img/no-image.png" style="
                height: 140px;
                object-fit:scale-down;
                object-position: center;" alt="">
              @endif
            </div>
            <div class="row g-0 text-center d-flex justify-content-evenly" style="font-size: small;" >
              <div class="col d-flex align-items-center justify-content-center">
                <span class="pt-"><i data-feather="sliders" class="feather-16"></i> {{ $vehicle->transmission->name }}</span>
              </div>
              <div class="col d-flex align-items-center justify-content-center">
                <span class="pt-"><i data-feather="user" class="feather-16"></i> {{ $vehicle->capacity }} orang</span>
              </div>
              <div class="col d-flex align-items-center justify-content-center">
                <span class="pt-"><i data-feather="battery-charging" class="feather-16"></i> {{ $vehicle->power }} cc</span>
              </div>
            </div>   
            <div class="row mt-3 g-0">
              <div class="col text-end">
                IDR {{ number_format($vehicle->price) }}/<span style="color: grey;">hari</span>
              </div>
            </div>      
          </div>
        </div>
      </div>
    @endforeach
    <!-- Akhir Kendaraan 1 -->
  </div>
</div>
{{-- Catalog end --}}

    {{-- Catalog start --}}
    {{-- <div class="container-fluid mb-5" id="catalog" style="padding: 0 10%" >
        <h1 class="fw-bold fs-4">Katalog</h1>
        <div class="row justify-between">
          @foreach ($vehicles as $vehicle)
          <div class="col-md-3 mb-3 position-relative">
            <a href="/vehicles/{{ $vehicle["slug"] }}" class="text-decoration-none">
              <div class="card py-4 px-1 shadow border-0" style="min-width: 300px; border-radius:10px;">
                <div class="card-body">
                  <div class="container text-center">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-10 text-start">
                        <h4 class="card-title text-dark fweig-medium">{{ $vehicle["title"] }}</h4>
                      </div>
                      <div class="col-2 text-end">
                        <span class="material-symbols-outlined txt-ntrl300">
                            favorite
                        </span>
                      </div>
                    </div>
                  </div>
                  <img src="/img/stargizer.png" class="card-img-top mb-3" alt="...">
                  <div class="container text-center mb-4 txt-ntrl500">
                    <div class="row align-items-center">
                      <div class="col d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">
                            auto_transmission
                        </span>
                        <span style="font-size: 12px">{{ $vehicle["transmission"] }}</span>
                      </div>
                      <div class="col d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">
                            person
                        </span>
                        <span style="font-size: 12px">{{ $vehicle["capacity"] }}</span>
                      </div>
                      <div class="col d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">
                            speed
                        </span>
                        <span style="font-size: 12px">{{ $vehicle["power"] }} cc</span>
                      </div>
                    </div>
                  </div>
                  <div class="container text-center">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-6 text-start">
                        <p class="my-auto fsize-4 fw-medium text-dark">Rp. {{ $vehicle["price"] }}/<span class="txt-ntrl500">hari</span></p>
                      </div>
                      <div class="col-4 text-end position-absolute" style="right: 29px">
                        <a href="/rent" class="p-0 m-0"><button class="px-3 py-2 rounded bg-ter1 text-white border-0 fw-bold">Sewa</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
    </div> --}}
    {{-- Catalog end --}}

{{-- Benefits start --}}
<div class="benefits d-flex justify-content-center">
  <div class="my-4 position-absolute bg-green7 w-100" style="min-height:500px; z-index: -1;"></div>
  <div class="my-4 m-0 p-0 w-100 position" id="benefits" style="min-height:500px;" >
    <div class="row py-4 justify-content-center">
      <div class="col-md-5" id="benefits-img">
        <div class="d-flex align-items-center justify-content-center " style="background-image: radial-gradient(circle,#FFF75E 3%, #B7E4C7 70%, #B7E4C7 100%);">
          <img src="/img/benefits-img.png" class="" alt="" style="max-width: 400px">
        </div>
      </div>
      <div class="col-md-7">
        <div class=" ms-3 pt-3 ">
          <p class="fsize-8 fweig-medium" style="line-height: 30px">Jadikan Setiap Perjalanan Anda Lebih Mudah dan 
            <br>Lebih Memuaskan dengan 
            <span style="color: #2D6A4F;">
              InstaRent!
            </span>
          </p>
          <div class="benefit" style="font-weight: 640;">
            <div class="row pt-2 mb-4" style="color: #4B4B4B;">
              <div class="col-1">
                <img src="img/Check.png"alt="">
              </div>
              <div class="col-11 d-flex align-items-center">
                <p class="m-0 ms-4 ps-4 fweig-semibold">Kemudahan dalam mengakses fitur</p>
              </div>
            </div>
            <div class="row pt-2 mb-4" style="color: #4B4B4B;">
              <div class="col-1">
                <img src="img/Check.png"alt="">
              </div>
              <div class="col-11 d-flex align-items-center">
                <p class="m-0 ms-4 ps-4 fweig-semibold">Menyediakan berbagai macam berkendaraan berkualitas</p>
              </div>
            </div>
            <div class="row pt-2 mb-4" style="color: #4B4B4B;">
              <div class="col-1">
                <img src="img/Check.png"alt="">
              </div>
              <div class="col-11 d-flex align-items-center">
                <p class="m-0 ms-4 ps-4 fweig-semibold">Fleksibilitas waktu penyewaan</p>
              </div>
            </div>
            <div class="row pt-2 mb-4" style="color: #4B4B4B;">
              <div class="col-1">
                <img src="img/Check.png"alt="">
              </div>
              <div class="col-11 d-flex align-items-center">
                <p class="m-0 ms-4 ps-4 fweig-semibold">Terdapat sistem penilaian dan ulasan kendaraan sewa</p>
              </div>
            </div>
            </div>          
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <div id="brosur my-5" >
  <div class="awal-brosur mt-4" style="background-color: #B7E4C7;">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 py-5 d-flex align-items-center justify-content-center " style="background-image: radial-gradient(circle,#FFF75E 3%, #B7E4C7 70%, #B7E4C7 100%);">
          <img src="/img/benefits-img.png" class="img-fluid" alt="">
        </div>
        <div class="col-xl-7 mt-5 ps-2 fw-bold">
          <div class="container">
            <div class=" ms-3 pt-3 ">
              <p style="font-size:x-large;">Jadikan Setiap Perjalanan Anda Lebih Mudah dan 
                <br>Lebih Memuaskan dengan 
                <span style="color: #2D6A4F;">
                  InstaRent!
                </span>
              </p>
              <div class="benefit" style="font-weight: 640;">
                <div class="row pt-2 mb-4" style="color: #4B4B4B;">
                  <div class="col-1">
                    <img src="img/Check.png"alt="">
                  </div>
                  <div class="col-11 d-flex align-items-center">
                    <p class="m-0 ms-4 ps-4">Kemudahan dalam mengakses fitur</p>
                  </div>
                </div>
                <div class="row pt-2 mb-4" style="color: #4B4B4B;">
                  <div class="col-1">
                    <img src="Check.png"alt="">
                  </div>
                  <div class="col-11 d-flex align-items-center">
                    <p class="m-0 ms-4 ps-4">Menyediakan berbagai macam berkendaraan berkualitas</p>
                  </div>
                </div>
                <div class="row pt-2 mb-4" style="color: #4B4B4B;">
                  <div class="col-1">
                    <img src="Check.png"alt="">
                  </div>
                  <div class="col-11 d-flex align-items-center">
                    <p class="m-0 ms-4 ps-4">Fleksibilitas waktu penyewaan</p>
                  </div>
                </div>
                <div class="row pt-2 mb-4" style="color: #4B4B4B;">
                  <div class="col-1">
                    <img src="Check.png"alt="">
                  </div>
                  <div class="col-11 d-flex align-items-center">
                    <p class="m-0 ms-4 ps-4">Terdapat sistem penilaian dan ulasan kendaraan sewa</p>
                  </div>
                </div>
                </div>          
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
{{-- Benefits end --}}

{{-- Steps start --}}
{{-- <div class="container-fluid my-5 text-center" id="howTo">
  <h1 class="fs-4 fw-bold mb-5">Cara Melakukan Pembayaran</h1>
  <div class="row">
    <div class="col-md-2">
      <div class="card" style="border:0">
        <div class="rounded-number rounded-circle bg-prim fw-bold fs-4 text-white mx-auto" style="width: 70px; height:70px; padding:20px 0">
          <span>1</span>
        </div>
        <img src="..." class="card-img-top" alt="icon">
        <div class="card-body">
          <h5 class="card-title">Cari kendaraan</h5>
          <p class="card-text">Mencari kendaraan yang ingin disewa</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 d-flex justify-content-between">
    </div>
    <div class="col-md-2">
      <div class="rounded-number rounded-circle bg-prim fw-bold fs-4 text-white mx-auto" style="width: 70px; height:70px; padding:20px 0">
        <span>2</span>
      </div>
    </div>
    <div class="col-md-3 m-auto">
    </div>
    <div class="col-md-2">
      <div class="rounded-number rounded-circle bg-prim fw-bold fs-4 text-white mx-auto" style="width: 70px; height:70px; padding:20px 0">
        <span>3</span>
      </div>
    </div>
  </div>
</div> --}}
<!-- Cara Melakukan Penyewaan -->
<p class="text-center mt-5 fw-bold fs-3 ">Cara Melakukan Penyewaan</p>
<!-- Cara Melakukan Penyewaan -->

<!-- Tutor Nyewa -->
<div id="Tutor mb-5">
  <div class="container pt-5 mt-4">
    <div class="row g-0" style="color: black;">

      <div class="col text-center">
        <div class="satu mb-3">
          <img src="img/satu.png" alt="">
        </div>
        <figure class="figure">
          <img src="img/search-icon.png" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption fw-bold fs-5" style="color: black;">Cari Kendaraan</figcaption>
        </figure>
        <p>Mencari <br>kendaraan yang <br> ingin disewa</p>
      </div>
      
      <div class="col-md">
        <div class="container">
          <div class="row " style="margin-top: 150px;">
              <div class="container p-2 align-items-center" id="stepper">
                <div class="d-flex justify-content-center" >
                  <button
                    class="rounded-circle border border-light mt-auto mb-auto"
                    style="width: 1rem; height: 1rem; background-color: #FFF056;"
                  >
                  </button>
                  <span
                    class="mt-auto mb-auto "
                    style="height: 0.2rem ; width: 200px; background-color: #CACACA;"
                  >
                  </span>
                  <button
                    class="rounded-circle border border-light mt-auto mb-auto "
                    style="width: 1rem; height: 1rem; background-color: #B7E4C7;"
                  >
                  </button>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="col text-center">
          <div class="dua mb-3">
            <img src="img/dua.png" alt="">
          </div>
          <figure class="figure">
            <img src="img/book.png" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption fw-bold fs-5" style="color: black;">Cari Kendaraan</figcaption>
          </figure>
          <p>Memilih dan memesan <br>kendaraan yang akan <br>disewa</p>
        </div>
      </div>

      <div class="col-md">
        <div class="container">
          <div class="row " style="margin-top: 150px;">
              <div class="container p-2 align-items-center" id="stepper">
                <div class="d-flex justify-content-center" >
                  <button
                    class="rounded-circle border border-light mt-auto mb-auto"
                    style="width: 1rem; height: 1rem; background-color: #B7E4C7;"
                  >
                  </button>
                  <span
                    class="mt-auto mb-auto "
                    style="height: 0.2rem ; width: 200px; background-color: #CACACA;"
                  >
                  </span>
                  <button
                    class="rounded-circle border border-light mt-auto mb-auto "
                    style="width: 1rem; height: 1rem; background-color: #FFAAEA;"
                  >
                  </button>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="col text-center">
          <div class="TUGA mb-3">
            <img src="img/tiga.png" alt="">
          </div>
          <figure class="figure">
            <img src="img/safety.png" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption fw-bold fs-5" style="color: black;">Cari Kendaraan</figcaption>
          </figure>
          <p>Nikmati setiap langkah <br> perjalananmu bersama kendaraan <br> yang berkualitas</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="" style="height: 100px">

</div>
{{-- Steps end --}}
    
@endsection
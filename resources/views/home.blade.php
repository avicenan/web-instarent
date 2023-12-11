@extends('layouts.main')

{{-- Hero start --}}
<div class="hero bg-prim row justify-content-center" style="max-height: 536px; z-index:-99; mt-0">
    <div class="col-8" style="margin-top: 6rem;">
      <div class="hero-items">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="text-white fw-bold fsize-10 mb-5">Best Place to<br>Rented a Dream<br>Vechicles</h4>
                    <h5 class="text-white fw-bold fsize-8 lh-base" >Tidak perlu mencari lebih jauh, InstaRent adalah tempat terbaik untuk menyewa kendaraan impian Anda</h5>
                </div>
                <div class="col-lg-8 text-center position-relative">
                    <div class="card position-absolute" style="height: 180px; width:180px; left:50px; border-radius: 30px;
                    background: var(--White, #FFF);" hidden>
                    </div>
                    <img src="/img/home-hero-car.png" class="mt-5 img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="hero bg-yellow8" style="height: 137px"></div>
{{-- Hero end --}}

@section('container')

    {{-- Brand start --}}
    <div class="brand inline">
        <div class="d-flex justify-content-evenly p-4 mb-4">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
            <img src="/img/car-brand-1.png" width="95px" alt="toyota">
        </div>
    </div>
    {{-- Brand end --}}

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
    <div class="container-fluid mb-5 bg-green7 mx-auto" id="benefits" style="min-height:500px" >
      <div class="row">
          <div class="col">foto</div>
          <div class="col">benefit</div>
      </div>
    </div>
    {{-- Benefits end --}}

    {{-- Steps start --}}
    <div class="container-fluid mb-5 text-center" id="howTo">
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
          {{-- <div class="circle bg-prim rounded-circle my-auto" style="width: 19px; height:19px"></div>
          <div class="absolute"><hr></div>
          <div class="circle bg-prim rounded-circle my-auto" style="width: 19px; height:19px"></div> --}}
        </div>
        <div class="col-md-2">
          <div class="rounded-number rounded-circle bg-prim fw-bold fs-4 text-white mx-auto" style="width: 70px; height:70px; padding:20px 0">
            <span>2</span>
          </div>
        </div>
        <div class="col-md-3 m-auto">
          {{-- <span><hr></span> --}}
        </div>
        <div class="col-md-2">
          <div class="rounded-number rounded-circle bg-prim fw-bold fs-4 text-white mx-auto" style="width: 70px; height:70px; padding:20px 0">
            <span>3</span>
          </div>
        </div>
      </div>
    </div>
    {{-- Steps end --}}

    <a href="/register" class="my-auto">to register</a>
    
@endsection
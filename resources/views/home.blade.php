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
      <div class="col-md-5">Photo</div>
      <div class="col-md-7">Benefits</div>
    </div>
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
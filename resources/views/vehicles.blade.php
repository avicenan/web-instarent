@extends('layouts.main')

@section('container')
{{-- Hero start --}}
    <div class="container-fluid mb-3" style="padding-top:80px;">
        <div class="hero p-5 row" style="border-radius: 30px;
        background: linear-gradient(180deg, #FFD53E 35%, #AFC760 58.44%, hsl(152, 41%, 52%) 100%);">
            <div class="col-md-6">
                <p class="fw-medium fs-4 text-white lh-lg">Ayo, jangan lewatkan kesempatan ini<br>untuk menjelajahi destinasi favorit Anda<br>dengan kenyamanan dan kebebasan. <br>Sewa sekarang!
                </p>
            </div>
            <div class="col-md-6">
                <img src="" alt="mobil dan motor">
            </div> 
        </div>
    </div>
{{-- Hero end --}}

{{-- Search start --}}
    {{-- <nav class="" >
      <div class="container p-4 mb-3 bg-danger rounded">
        <form class="col-12" role="search" action="" id="search">
          @if (request('brand'))
            <input type="hidden" name="brand" value="{{ request('brand') }}">
          @endif
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          <div class="input-group mb-2">
            <div class="flex-fill me-1">
              <label for="start_date" class="text-white mb-1 fweig-semibold">Start Date</label>
              <input class="form-control me-1 p-4" name="start_date" type="datetime-local" value="{{ session('start_date') }}" id="start_date">
            </div>
            <div class="flex-fill ms-1">
              <label for="end_date" class="text-white mb-1 fweig-semibold">End Date</label>
              <input class="form-control p-4" name="end_date" type="datetime-local" value="{{ session('end_date') }}" id="end_date"> 
            </div>
          </div>
          <div class="input-group position-relative">
            <input class="form-control p-4 rounded" name="search" type="search" placeholder="Temukan kendaraan impian Anda bersama Kami!" aria-label="Search" value="{{ request('search') }}" autofocus>
            <span class="material-symbols-outlined position-absolute p-4" style="right:3%">
                search
                <button style="position:absolute; right:30%; opacity:0;" type="submit">search</button>
            </span>
          </div>
        </form>
      </div>
    </nav> --}}

    <div class="search-card bg-danger p-2 rounded-2 mb-3 col-10 mx-auto">
      <form action="/vehicles" role="search" id="search">
        @csrf
        <div class="row m-1">
          <div class="col-12">
            <div class="form-floating my-3">
              <input type="search" class="form-control" id="search" name="search" placeholder="Temukan kendaraan impian Anda bersama Kami!" value="{{ old('search') }}" autofocus>
              <label for="search">Pencarian</label>
            </div>
          </div>

          <div class="col-10">
            <div class="form-floating mb-3">
              <input type="datetime-local" class="form-control" id="start_date" value="{{ session('start_date') }}">
              <label for="start_date">Tanggal Sewa</label>
            </div>
          </div>
          <div class="col-2">
            <p class="text-light fweig-reg mt-1">{{ $start_date_string }}</p>
          </div>

          <div class="col-10">
            <div class="form-floating mb-3">
              <input type="datetime-local" class="form-control" id="end_date" value="{{ session('end_date') }}">
              <label for="end_date">Tanggal Kembali</label>
            </div>
          </div>
          <div class="col-2">
            <p class="text-light fweig-reg mt-1">{{ $end_date_string }}</p>
          </div>
        </div>
      </form>
    </div>
{{-- Search end --}}

{{-- Filters Cards start --}}
    {{-- <div class="container-fluid" style="padding: 0 10%">
      <div class="row justify-between">
      @foreach ($vehicles as $vehicle)
        <div class="col-md-3 mb-3 position-relative">
          <a href="/vehicles/{{ $vehicle->slug }}" class="text-decoration-none">
            <div class="card py-4 px-1 shadow border-0" style="min-width: 300px; border-radius:10px;">
              <div class="card-body">
                <div class="container text-center">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-10 text-start">
                      <h4 class="card-title text-dark fweig-medium fsize-6">{{  $vehicle->brand->name . " " . $vehicle->title }}</h4>
                    </div>
                    <div class="col-2 text-end">
                      <span class="material-symbols-outlined txt-ntrl300">
                          favorite
                      </span>
                    </div>
                  </div>
                </div>
                <img src="/img/stargizer.png" class="card-img-top img-fluid mb-3" alt="...">
                <div class="container text-center mb-4 txt-ntrl500">
                  <div class="row align-items-center">
                    <div class="col d-flex align-items-center">
                      <span class="material-symbols-outlined me-2">
                          auto_transmission
                      </span>
                      <span style="font-size: 12px">{{ $vehicle->transmission }}</span>
                    </div>
                    <div class="col d-flex align-items-center">
                      <span class="material-symbols-outlined me-2">
                          person
                      </span>
                      <span style="font-size: 12px">{{ $vehicle->capacity }} Orang</span>
                    </div>
                    <div class="col d-flex align-items-center">
                      <span class="material-symbols-outlined me-2">
                          speed
                      </span>
                      <span style="font-size: 12px">{{ $vehicle->power }} cc</span>
                    </div>
                  </div>
                </div>
                <div class="container text-center">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-6 text-start">
                      <p class="my-auto fsize-4 fw-medium text-dark">Rp. {{ $vehicle->price }}/<span class="txt-ntrl500">hari</span></p>
                    </div>
                    <div class="col-4 text-end position-absolute" style="right: 29px">
                      <button class="px-3 py-2 rounded bg-ter1 text-white border-0 fw-bold">Sewa</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div> --}}
    <div class="row min-vh-100">
      <div class="col-lg-3 mb-4">
        <div class="card h-100 p-3">
          <div class="card_body">
            <h5 class="card-title fweig-semibold mb-3">Filter <i data-feather="filter" class="feather-16"></i></h5>
            <form action="/vehicles" id="filter">
              @csrf
              <div class="category mb-3">
                <p class="card-text my-1 p-0 fsize-4">Kategori</p>
                <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('category') == null ? 'active' : '' }}" value="" name="category">All</button>
                @foreach($categories as $category)
                  <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('category') == $category->slug? 'active' : '' }}" value="{{ $category->slug }}" name="category">{{ $category->name }}</button>
                @endforeach
              </div>
              <div class="type mb-3">
                <p class="card-text my-1 p-0 fsize-4">Tipe</p>
                <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('type') == null ? 'active' : '' }}" value="" name="type">All</button>
                @foreach($types as $type)
                  <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('type') == $type->slug? 'active' : '' }}" value="{{ $type->slug }}" name="type">{{ $type->name }}</button>
                @endforeach
              </div>
              <div class="brands mb-3">
                <p class="card-text my-1 p-0 fsize-4">Merek</p>
                <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('brand') == null ? 'active' : '' }}" value="" name="brand">All</button>
                @foreach($brands as $brand)
                  <button class="btn btn-outline-dark me-1 mb-1 fsize-2 rounded-1 {{ request('brand') == $brand->name ? 'active' : '' }}" value="{{ $brand->name }}" name="brand">{{ $brand->name }}</button>
                @endforeach
              </div>
            </form>
          </div>
        </div>
      </div>
{{-- Filters Cards end --}}

{{-- Vehicle Cards start --}}
      <div class="col-lg-9">
        <div class="vehicle-cards">
          @if (count($vehicles) === 0)
            <h6 class="text-center p-4 my-5">Mohon maaf kendaraan yang anda cari tidak tersedia</h6>
          @endif
          @foreach ($vehicles as $vehicle)
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-3 my-auto p-2">
                <img src="/img/stargizer.png" class="img-fluid" alt="...">
              </div>
              <div class="col-md-9">
                <div class="card-body row">
                  <div class="col-md-8">
                    <h5 class="card-title fweig-bold mb-3">{{ $vehicle->brand->name . " " . $vehicle->title }}</h5>
                    <div class="vehicle-spec card-text">
                      <div class="row">
                        <div class="col">
                          <div class="item me-3 mb-4 pe-4 fsize-3">
                            <i data-feather="user" class=" me-1 align-middle"></i> {{ $vehicle->capacity }} Kursi
                          </div>
                          <div class="item me-3 mb-4 pe-4 fsize-3">
                              <i data-feather="sliders" class="me-1 align-middle"></i> {{ $vehicle->transmission }}
                          </div>
                        </div>
                        <div class="col">
                          <div class="item me-3 mb-4 pe-4 fsize-3">
                            <i data-feather="battery-charging" class="me-1 align-middle"></i> {{ $vehicle->power }} cc
                          </div>
                          <div class="item me-3 mb-4 pe-4 fsize-3">
                              <span class="material-symbols-outlined">palette</span> {{ $vehicle->color }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 text-end mt-3">
                    <p class="card-text fsize-2 m-0"><small class="text-body-primary">Harga untuk {{ $duration['day'] }} hari:</small></p>
                    <h5>IDR {{ ($vehicle->price)*$duration["day"] }}</h5>
                    <a href="/vehicles/{{ $vehicle->slug }}" class="btn btn-success fweig-semibold">Sewa</a>
                  </div>
                </div>
              </div>
            </div>
            <hr class="mx-2 my-0">
            <div class="row g-0 others">
              <div class="card m-2" style="max-width: 48px">
                <div class="card-body p-1 text-center">
                  <img src="/img/car-brand-1.png" class="img-fluid" alt="{{ $vehicle->brand->name }}" width="64px" title="{{ $vehicle->brand->name }}">
                </div>
              </div>
              <div class="card bg-prim border-0 m-2" style="border-radius: 7px 7px 7px 0px; max-width: 48px"">
                <div class="card-body p-1 my-auto d-flex align-content-center justify-content-center" title="Nilai">
                  <h6 class="text-dark fweig-semibold m-auto">4.6</h6>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

{{-- Cards end --}}


    <div class="d-flex justify-content-center">
      {{ $vehicles->links() }}
    </div>


    <a href="/home" class="my-auto">to home</a>

    <?php
    if ( (! request('start_date') || (! request('end_date'))) ) { // not submitted yet
    ?>
    <script>
        document.getElementById("search").submit();
    </script>
    <?php
        }
    ?>
    

@endsection
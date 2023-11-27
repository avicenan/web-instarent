@extends('layouts.main')

@section('container')
{{-- Hero start --}}
    <div class="container-fluid mb-2" style="padding: 0 10%; padding-top:7%;">
        <div class="hero p-5 row" style="border-radius: 30px;
        background: linear-gradient(180deg, #FFD53E 35%, #AFC760 58.44%, hsl(152, 41%, 52%) 100%);">
            <div class="col-md-6">
                <p class="fw-medium fs-3 text-white lh-lg">Ayo, jangan lewatkan kesempatan ini<br>untuk menjelajahi destinasi favorit Anda<br>dengan kenyamanan dan kebebasan. <br>Sewa sekarang!
                </p>
            </div>
            <div class="col-md-6">
                <img src="" alt="mobil dan motor">
            </div> 
        </div>
    </div>
{{-- Hero end --}}

{{-- Search start --}}
    <nav class="navbar" style="padding: 3% 10%;" >
        <div class="container p-4 bg-danger rounded">
          <form class="col-12 vehicle-type" action="/vehicles">
            <ul class="nav nav-tabs justify-content-around mb-3">
              @foreach ($categories as $category)
                <li class="nav-item bg-white rounded-top flex-fill text-center mx-1">
                  @if (request('brand'))
                    <a class="nav-link text-dark" href="/vehicles?brand={{ request('brand') }}&category={{ $category->slug }}">{{ $category->name }}</a>
                  @else
                    <a class="nav-link text-dark" href="/vehicles?category={{ $category->slug }}">{{ $category->name }}</a>
                  @endif
                </li>
              @endforeach
            </ul>
          </form>
          <form class="col-12" role="search" action="/vehicles">
            @if (request('brand'))
              <input type="hidden" name="brand" value="{{ request('brand') }}">
            @endif
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="input-group mb-2 d-flex">
              <div class="flex-fill me-1">
                <label for="start_date" class="text-white mb-1 fweig-semibold">Start Date</label>
                <input class="form-control me-1 p-4" name="start_date" type="date" value="{{ request('start_date') }}">
              </div>
              <div class="flex-fill ms-1">
                <label for="end_date" class="text-white mb-1 fweig-semibold">End Date</label>
                <input class="form-control p-4" name="end_date" type="date" value="{{ request('end_date') }}"> 
              </div>
            </div>
            <div class="input-group position-relative">
              <input class="form-control p-4 rounded" name="search" type="search" placeholder="Temukan kendaraan impian Anda bersama Kami!" aria-label="Search" value="{{ request('search') }}">
              <span class="material-symbols-outlined position-absolute p-4" style="right:3%">
                  search
                  <button style="position:absolute; right:30%; opacity:0;" type="submit">search</button>
              </span>
            </div>
          </form>
        </div>
        <div class="brands p-4 d-flex flex-wrap">
           <div class="brand py-2 px-3 bg-green7 rounded mx-2 my-1">
            <a href="/vehicles" class="text-decoration-none text-dark">All</a>
           </div>
          @foreach ($brands as $brand)
            <div class="brand py-2 px-3 bg-green7 rounded mx-2 my-1">
              <a href="/vehicles?brand={{ $brand->slug }}" class="text-decoration-none text-dark">{{ $brand->name }}</a>
            </div>
          @endforeach
        </div>
    </nav>
{{-- Search end --}}

{{-- Cards start --}}
    <div class="container-fluid" style="padding: 0 10%">
      <div class="row justify-between">
      @foreach ($vehicles as $vehicle)
        <div class="col-md-3 mb-3 position-relative">
          <a href="/vehicles/{{ $vehicle->slug }}" class="text-decoration-none">
            <div class="card py-4 px-1 shadow border-0" style="min-width: 300px; border-radius:10px;">
              <div class="card-body">
                <div class="container text-center">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-10 text-start">
                      <h4 class="card-title text-dark fweig-medium">{{ $vehicle->title }}</h4>
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
    </div>
{{-- Cards end --}}

    {{-- @else
      <p class="text-center fs-4">No vehicle available.</p>
    @endif --}}


    <div class="d-flex justify-content-center">
      {{ $vehicles->links() }}
    </div>


    <a href="/home" class="my-auto">to home</a>
@endsection
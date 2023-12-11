@extends('layouts.main')

@section('container') 
<div class="container-fluid mb-4" style="margin-top: 5rem;">

{{-- Search Bar --}}
    <div class="row mb-4">
        <div class="col">
            <div class="card border-2 border-warning"">
                <div class="card-body">
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a> --}}
                  <div class="row card-text align-items-center" id="date-range">
                    <div class="col d-flex">
                        <p class="p-0 m-0">{{ $start_date_string }}</p>
                        <i data-feather="arrow-right" class="mx-4"></i>
                        <p class="p-0 m-0">{{ $end_date_string }}</p>
                    </div>
                    <div class="col text-end">
                        <a href="#" id="edit-date-toggle" class="bg-success text-white text-decoration-none p-2 rounded-2">Sunting</a>
                    </div>
                  </div>
                  <div class="row card-text align-items-center" id="edit-date-range" hidden>
                    <div class="col d-flex">
                        <p>edit here</p>
                    </div>
                    <div class="col text-end">
                        <a href="#" id="exit-date-toggle" class="text-dark text-decoration-none p-2"><i data-feather="x"></i></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
{{-- Search Bar end --}}

    <div class="row mb-4">
        
{{-- Image start --}}
        <div class="col-md-6">
            <div class="thumbnail mb-3">
                <img class="img-thumbnail img-fluid" src="/img/stargizer.png" alt="" width="732px">
            </div>
            {{-- Button left --}}
            {{-- <div class="img-carousel d-flex flex-wrap justify-content-start">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
            </div> --}}
            {{-- Button right --}}
        </div>
{{-- Image end --}}

{{-- Specs start --}}
<div class="col-md-6">
    <div class="car-name">
        <div class="title mb-3 d-flex flex-wrap justify-content-between align-items-center">
            <h1 class="fsize-8 fweig-bold">{{ $vehicle->brand->name . " " . $vehicle->title }}</h1>
        </div>
        <div class="car-spec mb-2">
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
{{-- Specs end --}}

{{-- Items start --}}
            <div class="extras">
                <h2 class="fsize-5 fweig-semibold mb-3">Tambahan</h2>
                <div class="row">
                    <div class="col">
                        <p>{{ $vehicle->extras }}</p>
                    </div>
                </div>
            </div>
        </div>
{{-- Items end --}}

    </div>
    {{-- Details start --}}
    <div class="row mb-3">
        {{-- <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-dark fsize-7 fweig-medium" aria-current="page" href="#">Harga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark fsize-7 fweig-medium" href="#">Ulasan</a>
            </li>
        </ul> --}}
        <div class="col">
            <div class="card";">
                <div class="card-body">
                  <h5 class="card-title mb-3 fweig-bold ">Rincian harga</h5>
                  <div class="row">
                    <div class="col">Biaya sewa {{ $vehicle->title }}</div>
                    <div class="col text-end">IDR {{ ($vehicle->price)*($duration["day"]) }}</div>
                  </div>
                  <div class="row">
                    <div class="col">Biaya layanan</div>
                    <div class="col text-end">IDR {{ $rent_fee }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col fweig-semibold fsize-6">Total biaya sewa untuk {{ $duration["day"] }} hari:</div>
                    <div class="col text-end fweig-semibold fsize-6">IDR {{ (($vehicle->price)*($duration["day"]))+($rent_fee) }}</div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <div class="card"">
                <div class="card-body">
                  <h5 class="card-title fweig-bold mb-3">Ulasan</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8">
            <form action="/vehicles/{{ $vehicle->slug }}" method="POST" id="date_range">
                @csrf
                {{-- <a href="/rent" class="py-2 px-4 bg-ter1 text-decoration-none rounded-3 text-white fsize-6 fweig-xbold">Sewa</a> --}}
                <input class="form-control" type="datetime-local" disabled hidden value="{{ session('start_date') }}" name="start_date" id="start_date">
                <input class="form-control" type="datetime-local" disabled hidden value="{{ session('end_date') }}" name="end_date" id="end_date">
                <input class="form-control" type="text" disabled hidden value="{{ $vehicle }}" name="vehicle" id="vehicle">
                <button class="py-2 w-100 bg-ter1 rounded-2 text-white fsize-6 fweig-semibold border-0" type="submit">Lanjutkan Reservasi</button>
            </form>
        </div>
    </div>

    {{-- Details end --}}
    {{-- <div class="row">
        <div class="price">
            24 jam  : {{ ($vehicle->price) }}<br/>
            12 jam  : {{ ($vehicle->price)*0.65 }} <br/>
            6 jam   : {{ ($vehicle->price)*0.30 }}
            
        </div>
    </div> --}}

    <div class="row">
{{-- Other Vehicle start --}}
        <div class="container-fluid mb-5 p-5" id="catalog" >
            <h1 class="fw-bold fs-4 mb-4">Unit Lainnya</h1>
            <div class="row justify-between">
            @foreach ($vehicles as $vehicle)
            <div class="col-md-3 mb-3 position-relative">
                <a href="/vehicles/{{ $vehicle->slug }}" class="text-decoration-none">
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
        </div>
{{-- Other Vehicle end --}}
    </div>
</div>

<script>

document.getElementById("edit-date-toggle").addEventListener("click",() => 
    {
    document.getElementById("date-range").hidden = true;
    document.getElementById("edit-date-range").hidden = false;
    }, false,
);

document.getElementById("exit-date-toggle").addEventListener("click",() => 
    {
    document.getElementById("date-range").hidden = false;
    document.getElementById("edit-date-range").hidden = true;
    }, false,
);

$("#filter :input").change(function() {
   $("#filter").data("changed",true);
});
</script>

@endsection
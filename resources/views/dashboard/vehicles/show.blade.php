@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
    <h1 class="h2">Lihat {{ $vehicle->title }}</h1>
</div>

<div class="container-fluid my-5">
    <div class="row">
        <div class="nav">
            <a href="/dashboard/vehicles" class="btn btn-success mx-1 my-auto"><i data-feather="arrow-left" style="margin-bottom: 3px"></i> Back to All My Vehicle</a>
            <a href="/dashboard/vehicles/{{ $vehicle->slug }}/edit" class="btn btn-warning mx-1 my-auto"><i data-feather="edit" style="margin-bottom: 3px"></i> Edit</a>
            <form action="/dashboard/vehicles/{{ $vehicle->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mx-1 border-0"  onclick="return confirm('Are you sure?')"><i data-feather="x-circle" style="margin-bottom: 3px"></i> <span class="fsize-5 fweig-reg">Delete</span></button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8">
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
                                        <p class="p-0 m-0">{{ session('start_date') }}</p>
                                        <i data-feather="arrow-right" class="mx-4"></i>
                                        <p class="p-0 m-0">{{ session('end_date') }}</p>
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
                                <img class="img-thumbnail img-fluid" src="{{ asset('/storage/' . $vehicle->image) }}" alt="{{ $vehicle->title }}" width="732px">
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
                                                <i data-feather="sliders" class="me-1 align-middle"></i> {{ $vehicle->transmission->name }}
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
                                    <div class="col text-end">IDR {{ ($vehicle->price)*1 }}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col">Biaya layanan</div>
                                    <div class="col text-end">IDR 5000</div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col fweig-semibold fsize-6">Total biaya sewa untuk 1 hari:</div>
                                    <div class="col text-end fweig-semibold fsize-6">IDR {{ ($vehicle->price)+5000 }}</div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <form action="" method="POST" id="date_range">
                                @csrf
                                {{-- <a href="/rent" class="py-2 px-4 bg-ter1 text-decoration-none rounded-3 text-white fsize-6 fweig-xbold">Sewa</a> --}}
                                <input class="form-control" type="datetime-local" disabled hidden value="{{ session('start_date') }}" name="start_date" id="start_date">
                                <input class="form-control" type="datetime-local" disabled hidden value="{{ session('end_date') }}" name="end_date" id="end_date">
                                <input class="form-control" type="text" disabled hidden value="{{ $vehicle }}" name="vehicle" id="vehicle">
                                <button disabled class="py-2 w-100 bg-ter1 rounded-2 text-white fsize-6 fweig-semibold border-0" type="submit">Lanjutkan Reservasi</button>
                            </form>
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
                
                    {{-- Details end --}}
                    {{-- <div class="row">
                        <div class="price">
                            24 jam  : {{ ($vehicle->price) }}<br/>
                            12 jam  : {{ ($vehicle->price)*0.65 }} <br/>
                            6 jam   : {{ ($vehicle->price)*0.30 }}
                            
                        </div>
                    </div> --}}
                
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
                </script>
        </div>
    </div>

</div>
@endsection

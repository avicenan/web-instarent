@extends('layouts.main')

@section('container') 
<div class="container-fluid mb-4 mt-3">

    <div class="my-3">
        <a href="/vehicles?start_date={{ session('start_date')}}&end_date={{ session('end_date') }}" class="text-decoration-none fweig-medium"><i data-feather="arrow-left"></i> Kembali</a>
    </div>

{{-- Search Bar --}}
    <div class="row mb-4">
        <div class="col">
            <div class="card border-2 border-warning"">
                <div class="card-body">
                  <div class="row card-text align-items-center" id="date-range">
                    <div class="col-8 d-flex">
                        <p class="p-0 m-0">{{ $start_date->toDayDateTimeString() }}</p>
                        <i data-feather="arrow-right" class="mx-4"></i>
                        <p class="p-0 m-0">{{ $end_date->toDayDateTimeString() }}</p>
                    </div>
                    <div class="col text-end">
                        <a href="#" id="edit-date-toggle" class="bg-success text-white text-decoration-none p-2 rounded-2">Sunting</a>
                    </div>
                  </div>
                  <div class="row card-text align-items-center" id="edit-date-range" hidden>
                    <div class="col-10">
                        <form action="/vehicles/{{ $vehicle->slug }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="form-floating mb-1">
                                        <input type="datetime-local" min="{{ $today }}" max="{{ $end_date }}" class="form-control" id="start_date" name="start_date" value="{{ $start_date }}" required>
                                        <label for="start_date">Tanggal Sewa</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-1">
                                        <input type="datetime-local" min="{{ $start_date }}" class="form-control" id="end_date" name="end_date" value="{{ $end_date }}" required>
                                        <label for="end_date">Tanggal Kembali</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p class="text-secondary fweig-reg ms-2">{{ $start_date->toDayDateTimeString() }}</p>
                                  </div>
                                  <div class="col-6">
                                    <p class="text-secondary fweig-reg ms-2">{{ $end_date->toDayDateTimeString() }}</p>
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
                        </form>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" id="exit-date-toggle" class="text-dark text-decoration-none p-2"><i data-feather="x"></i></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
{{-- Search Bar end --}}

@if (count($vehicles->where('id', $vehicle->id))>0)

<div class="card rounded-4 p-4 mb-3 border-0 shadow-sm">
    <div class="row mb-4">
        
        {{-- Image start --}}
                <div class="col-md-6">
                    <div class="thumbnail mb-3 text-center">
                        @if ($vehicle->image)
                            <img class="img-thumbnail border-0 img-fluid" src="{{ asset('/storage/' . $vehicle->image) }}" alt="" style="max-height: 250px">
                        @else
                            <img class="img-thumbnail border-0 img-fluid" src="/img/no-image.png" alt="" style="max-height: 250px">
                        @endif
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
    
        {{-- Extras start --}}
            <div class="extras">
                <h2 class="fsize-5 fweig-semibold mb-3">Tambahan</h2>
                <div class="row">
                    <div class="col">
                        @if ($vehicle->extras)
                            <p>{{ $vehicle->extras }}</p>
                        @else
                            <p> - </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Extras end --}}
    
    </div>
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
            <div class="card rounded-4 border-0 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title mb-3 fweig-bold ">Rincian harga</h5>
                  <div class="row">
                    <div class="col">
                        <h6>Biaya sewa {{ $vehicle->title }}</h6>
                    </div>
                    <div class="col text-end">
                        <h6>IDR {{ number_format(($vehicle->price)*($duration["day"])) }}</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <h6 class="card-text fsize-4 fweig-reg txt-ntrl500">Biaya layanan</h6>
                    </div>
                    <div class="col text-end">
                        <h6 class="card-text fsize-4 fweig-reg txt-ntrl500">IDR {{ number_format($rent_fee) }}</h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col fweig-semibold fsize-6">Total biaya sewa untuk {{ $duration["day"] }} hari:</div>
                    <div class="col text-end fweig-semibold fsize-6">IDR {{ number_format((($vehicle->price)*($duration["day"]))+($rent_fee)) }}</div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body" id="reviews">
                    <h5 class="card-title fweig-bold mb-3">Ulasan</h5>
                    @foreach($vehicle->rent as $rent)
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="card rounded-4 border-0 shadow-sm bg-warning">
                                <div class="card-body d-flex justify-content-center align-items-center" style="height: 100px">
                                    @if ($rent->review)
                                    <div class="text-dark fsize-12">{{ number_format($rent->review->sum('rating'), 1) }}</div><br>
                                    @else
                                    <div class="text-dark fsize-12">.</div><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            @if ($rent->review)
                            <div class="card rounded-4 border-0 shadow mb-2">
                                <div class="card-body p-3 ">
                                        <div class="mb-2"><img src="{{ asset('img/no-image.png') }}" class="rounded-circle me-2 ms-0" alt="" style="height: 24px; width: 24px;"><span class="fweig-semibold ms-2">{{ $rent->user->fname . ' ' . $rent->user->lname }}</span>
                                            <span class="ms-3">
                                                @for($i=0; $i < $rent->review->rating; $i++)
                                                    <span
                                                        class="star text-warning" style="font-size: 16px">★
                                                    </span>
                                                @endfor
                                                @for($i=0; $i < 5-$rent->review->rating; $i++)
                                                    <span
                                                        class="star" style="font-size: 16px">★
                                                    </span>
                                                @endfor
                                            </span>
                                        </div>
                                        <q class="fsize-3 ms-2" style="font-weight: 300">{{ $rent->review->review }}</q>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-8">
            <form action="/vehicles/{{ $vehicle->slug }}" method="POST" id="date_range">
                @csrf
                {{-- <a href="/rent" class="py-2 px-4 bg-ter1 text-decoration-none rounded-3 text-white fsize-6 fweig-xbold">Sewa</a> --}}
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
        <div class="container-fluid my-5" id="catalog" >
            <h1 class="fw-bold fs-4 mb-4">Unit Lainnya</h1>
            <div class="row">
                <div class="col">
                    @foreach (($vehicles->where('title', '=', $vehicle->title)->where('id', '!=', $vehicle->id)) as $vehicle)
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="card shadow-sm mb-3 bg-body rounded border-0 p-3" style="max-height: 300px;">
                            <div class="containers">
                                <div class="row g-0">
                                <div class="col-11 fw-bold">{{ $vehicle->brand->name . ' ' . $vehicle->title }}</div>
                                <div class="col-1"><img src="Heart.png" style="cursor: pointer;"id="heart-G2"  alt=""></div>
                                </div>
                                <div class="row">
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
                                    <span class="pt-"><i class="material-symbols-outlined align-middle">palette</i> {{ $vehicle->color }}</span>
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
                </div>
            </div>
        </div>
{{-- Other Vehicle end --}}
    </div>
</div>
@else
<h4 class="fsize-4 text-center">Mohon maaf kendaraan belum tersedia untuk tanggal yang ditentukan.</h4>
@endif

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

@endsection
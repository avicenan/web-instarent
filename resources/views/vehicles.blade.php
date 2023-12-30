@extends('layouts.main')

@section('container')
{{-- Hero start --}}
<div class="container-fluid mb-3 mt-4">
    <div class="hero p-5 row rounded-5 shadow-smfsm" style="
    background: linear-gradient(180deg, #FFD53E 35%, #AFC760 58.44%, hsl(152, 41%, 52%) 100%);">
        <div class="col-md-6">
            <p class="fw-medium fs-4 text-white lh-lg">Ayo, jangan lewatkan kesempatan ini<br>untuk menjelajahi destinasi favorit Anda<br>dengan kenyamanan dan kebebasan. <br>Sewa sekarang!
            </p>
        </div>
        <div class="col-md-6 my-auto">
            <img src="{{ asset('img/reserve-banner.png') }}" alt="mobil dan motor" id="reserve-banner" class="img-fluid">
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

<div class="search-card bg-white p-2 rounded-3 mb-3 mx-auto shadow-sm">
  <form action="/vehicles" role="search" id="search">
    @csrf
    <div class="hidden-filter">
      @if (request('start_date') || request('end_date')) 
        <input type="hidden" name="start_date" value="{{ request('start_date') }}">
        <input type="hidden" name="end_date" value="{{ request('end_date') }}">
      @endif
      @if (request('category')) 
        <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('type')) 
        <input type="hidden" name="type" value="{{ request('type') }}">
      @endif
      @if (request('brand')) 
        <input type="hidden" name="brand" value="{{ request('brand') }}">
      @endif
    </div>

    <div class="row m-1">
      <div class="col-12">
        <div class="form-floating my-3">
          <input type="search" class="form-control" id="search" name="search" placeholder="Temukan kendaraan impian Anda bersama Kami!" value="{{ request('search') }}" autofocus>
          <label for="search">Pencarian</label>
        </div>
      </div>

      <div class="col-6">
        <div class="form-floating mb-3">
          <input type="datetime-local" min="{{ $today }}" max="{{ $end_date }}" class="form-control" id="start_date" name="start_date" value="{{ $start_date }}" required>
          <label for="start_date">Tanggal Sewa</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating mb-3">
          <input type="datetime-local" min="{{ $start_date }}" class="form-control" id="end_date" name="end_date" value="{{ $end_date }}" required>
          <label for="end_date">Tanggal Kembali</label>
        </div>
      </div>
      
      <div class="col-6">
        <p class="text-dark fweig-reg mt-1">{{ $start_date->toDayDateTimeString() }}</p>
      </div>
      <div class="col-6">
        <p class="text-dark fweig-reg mt-1">{{ $end_date->toDayDateTimeString() }}</p>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-light border-0 w-100 mb-3 bg-prim text-dark fweig-semibold shadow-sm"><i data-feather="search" class="me-3 feather-16"></i>Cari</button>
      </div>
    </div>
  </form>
</div>
{{-- Search end --}}

{{-- Filters Cards start --}}
<div class="row" id="filter">
  <div class="col-lg-3 mb-4">
    <div class="card border-0 shadow-sm h-100 p-3">
      <div class="card_body">
        <div class="filter-title row">
          <h5 class="card-title fweig-semibold col">Filter <i data-feather="filter" class="feather-16"></i></h5>
          <a href="/vehicles" class="text-primary text-end fsize-1 col">Clear All</a>
        </div>
        <hr>
        <form action="/vehicles" id="filter">
          @csrf
          <div class="hidden-filter">
            @if (request('search')) 
              <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
            @if (request('start_date') || request('end_date')) 
              <input type="hidden" name="start_date" value="{{ request('start_date') }}">
              <input type="hidden" name="end_date" value="{{ request('end_date') }}">
            @endif
            @if (request('category')) 
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('type')) 
              <input type="hidden" name="type" value="{{ request('type') }}">
            @endif
            @if (request('brand')) 
              <input type="hidden" name="brand" value="{{ request('brand') }}">
            @endif
          </div>


          <div class="category mb-3">
            <p class="card-text my-2 p-0 fsize-4 fweig-semibold">Kategori</p>
            <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('category') == null ? 'active' : '' }}" value="" name="category">All</button>
            @foreach($categories as $category)
              <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('category') == $category->slug? 'active' : '' }}" value="{{ $category->slug }}" name="category">{{ $category->name }}</button>
            @endforeach
          </div>

          <div class="type mb-3">
            <p class="card-text mb-2 p-0 fsize-4 fweig-semibold">Tipe</p>
            <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('type') == null ? 'active' : '' }}" value="" name="type">All</button>
            @foreach($types as $type)
              <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('type') == $type->slug? 'active' : '' }}" value="{{ $type->slug }}" name="type">{{ $type->name }}</button>
            @endforeach
          </div>
          <div class="brands mb-3">
            <p class="card-text mb-2 p-0 fsize-4 fweig-semibold">Merek</p>
            <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('brand') == null ? 'active' : '' }}" value="" name="brand">All</button>
            @foreach($brands as $brand)
              <button class="btn btn-outline-secondary me-1 mb-1 fsize-2 rounded-1 {{ request('brand') == $brand->slug ? 'active' : '' }}" value="{{ $brand->slug }}" name="brand">{{ $brand->name }}</button>
            @endforeach
          </div>
        </form>
      </div>
    <button class="btn btn-secondary border-0 text-light shadow-sm" type="submit" >Terapkan</button>
    </div>
  </div>
{{-- Filters Cards end --}}

{{-- Vehicle Cards start --}}
  <div class="col-lg-9">
    <div class="vehicle-cards" id="result">
      @if (count($vehicles->unique('title')) === 0)
        <h6 class="text-center p-4 my-5">Mohon maaf kendaraan yang anda cari belum tersedia</h6>
        <div style="min-height: 50vh"></div>
        @else
      <h5 class="fweig-semibold fsize-6">Menampilkan {{ count($vehicles->unique('title')) }} kendaraan tersedia</h5>
      @foreach ($vehicles->unique('title') as $vehicle)
      <div class="card rounded-4 shadow-sm border-0 mb-3 p-2">
        <div class="row g-0">
          <div class="col-md-3 my-auto text-center p-2">
            @if ($vehicle->image)
              <img src="{{ asset('/storage/' . $vehicle->image) }}" class="img-fluid" alt="..." style="max-height: 190px">
            @else
              <img src="/img/no-image.png" class="img-fluid" alt="..." style="max-height: 160px">
            @endif
          </div>
          <div class="col-md-9">
            <div class="card-body row">
              <div class="col-sm-8">
                <h5 class="card-title fsize-6  fweig-bold mb-3">{{ $vehicle->brand->name . " " . $vehicle->title }} <span class="font-monospace fsize-1 fweig-reg">atau sejenis</span> </h5>
                <div class="vehicle-spec card-text">
                  <div class="row">
                    <div class="col">
                      <div class="item me-3 mb-4 pe-4 fsize-2">
                        <i data-feather="user" class=" me-1 align-middle"></i> {{ $vehicle->capacity }} Kursi
                      </div>
                      <div class="item me-3 mb-2 pe-4 fsize-2">
                          <i data-feather="sliders" class="me-1 align-middle"></i> {{ $vehicle->transmission->name }}
                      </div>
                    </div>
                    <div class="col">
                      <div class="item me-3 mb-4 pe-4 fsize-2">
                        <i data-feather="battery-charging" class="me-1 align-middle"></i> {{ $vehicle->power }} cc
                      </div>
                      <div class="item me-3 mb-2 pe-4 fsize-2">
                          <i class="material-symbols-outlined align-middle">palette</i> {{ $vehicle->color }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 text-end mt-4">
                <p class="card-text fsize-2 m-0"><small class="text-body-primary">Harga untuk {{ $duration['day'] }} hari:</small></p>
                <h5>IDR {{ number_format(($vehicle->price)*$duration["day"], 0) }} </h5>
                <a href="/vehicles/{{ $vehicle->slug }}" class="btn btn-success fweig-semibold rounded-3 p-1 px-2 fsize-3">Sewa</a>
              </div>
            </div>
          </div>
        </div>
        <hr class="mx-2 my-0">
        <div class="row g-0 others">
          <div class="card m-2" style="max-width: 48px">
            <div class="card-body p-1 text-center">
              <img src="img/{{ $vehicle->brand->slug }}.png" class="img-fluid" alt="{{ $vehicle->brand->name }}" width="64px"b title="{{ $vehicle->brand->name }}">
            </div>
          </div>
          <div class="card bg-prim border-0 m-2" style="border-radius: 7px 7px 7px 0px; max-width: 48px"">
            <a href="/vehicle/{{ $vehicle->slug }}/#reviews" class="text-decoration-none my-auto">
              <div class="card-body p-1 my-auto d-flex align-content-center justify-content-center" title="Nilai">
                @if (count($vehicle->rent) >= 1 )
                  @foreach($vehicle->rent as $rent)
                    @if ($rent->review)
                    <span class="text-dark fweig-semibold" >{{ number_format($rent->review->sum('rating'), 1) }}</span>
                    @else
                    <span class="text-dark fweig-semibold">4.5</span>
                    @endif
                  @endforeach
                @else
                  <span class="text-dark fweig-semibold">4.5</span>
                @endif
              </div>
            </a>
          </div>
        </div>
      </div>
      @endforeach
      
      @endif
    </div>
  </div>
</div>


{{-- Cards end --}}


<div class="d-flex justify-content-center">
  {{ $vehicles->links() }}
</div>

@if ( (! request('start_date') || (! request('end_date'))) ) // not submitted yet
<script>
    document.getElementById("search").submit();
</script>
@endif

<script>
  const start_date = document.querySelector('#start_date');
  const end_date = document.querySelector('#end_date');

  start_date.addEventListener('change', function() {
    document.getElementById('search').submit();
  });

  end_date.addEventListener('change', function() {
    document.getElementById('search').submit();
  });
</script>

@endsection
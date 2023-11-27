@extends('layouts.main')

@section('container')
{{-- Hero start --}}
    <div class="container-fluid mb-5" style="padding: 0 10%; padding-top:7%;">
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
    <nav class="navbar mb-5" style="padding: 0 10%;" >
        <div class="container-fluid">
          <form class="d-flex col-12" role="search">
            <input class="form-control me-2 p-4" type="search" placeholder="Temukan kendaraan impian Anda bersama Kami!" aria-label="Search">
            <span class="material-symbols-outlined position-absolute p-4" style="right:13%">
                search
                <button style="position:absolute; right:30%; opacity:0;">search</button>
            </span>
          </form>
        </div>
    </nav>
{{-- Search end --}}

{{-- Cards start --}}
    <div class="container-fluid" style="padding: 0 10%">
      <div class="row justify-between">
        <h1 class="mb-5">Vehicle Brand</h1>
      @foreach ($brands as $brand)
        <ul>
            <li><a href="/brands/{{ $brand->slug }}">{{ $brand->name }}</a></li>
        </ul>
      @endforeach
    </div>
{{-- Cards end --}}


    <a href="/home" class="my-auto">to home</a>
@endsection
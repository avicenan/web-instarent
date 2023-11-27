@extends('layouts.main')

@section('container') 
<div class="container-fluid mb-5" style="padding: 0 10%; padding-top:7%;">
    <div class="row">

{{-- Image start --}}
        <div class="col-md-6 p-5">
            <div class="thumbnail mb-3">
                <img class="img-thumbnail img-fluid" src="/img/stargizer.png" alt="" width="732px">
            </div>
            {{-- Button left --}}
            <div class="img-carousel d-flex flex-wrap justify-content-start">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
                <img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt="" width="200px">
            </div>
            {{-- Button right --}}
        </div>
{{-- Image end --}}

{{-- Specs start --}}
        <div class="col-md-6 p-5">
            <div class="car-name">
                <div class="title mb-5 d-flex flex-wrap justify-content-between align-items-center">
                    <h1 class="fsize-10 fweig-bold">{{ $vehicle->title }}</h1>
                    <a href="/rent" class="py-2 px-4 bg-ter1 text-decoration-none rounded-3 text-white fsize-6 fweig-xbold">Sewa</a>
                </div>
                <div class="car-spec mb-5">
                    <h2 class="fsize-8 fweig-semibold mb-4">Spesifikasi</h2>
                    
                    <p>({{ $vehicle->category->name }}, {{ $vehicle->brand->name }}, {{ $vehicle->type->name }})</p>
                    <div class="items-container d-flex flex-wrap justify-content-between">
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                        <div class="item me-3 mb-4 pe-4 fsize-5">
                            <span class="material-symbols-outlined me-2 align-middle">touch_app</span>Headunit Touchscreen
                        </div>
                    </div>
                </div>
            </div>
{{-- Specs end --}}

{{-- Items start --}}
            <div class="item-include">
                <h2 class="fsize-8 fweig-semibold mb-4">Item Tambahan</h2>
                <div class="items-container d-flex flex-wrap justify-content-between">
                    <div class="item me-3 mb-4 pe-4 fsize-5">
                        <span class="material-symbols-outlined me-2 align-middle">credit_card</span>E-Toll (Saldo isi sendiri)
                    </div>
                    <div class="item me-3 mb-4 pe-4 fsize-5">
                        <span class="material-symbols-outlined me-2 align-middle">credit_card</span>E-Toll (Saldo isi sendiri)
                    </div>
                    <div class="item me-3 mb-4 pe-4 fsize-5">
                        <span class="material-symbols-outlined me-2 align-middle">credit_card</span>E-Toll (Saldo isi sendiri)
                    </div>
                    <div class="item me-3 mb-4 pe-4 fsize-5">
                        <span class="material-symbols-outlined me-2 align-middle">credit_card</span>E-Toll (Saldo isi sendiri)
                    </div>
                </div>
            </div>
        </div>
{{-- Items end --}}

    </div>
    <div class="row mb-5">
{{-- Details start --}}
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-dark fsize-7 fweig-medium" aria-current="page" href="#">Harga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark fsize-7 fweig-medium" href="#">Ulasan</a>
            </li>
        </ul>
{{-- Details end --}}
    </div>
    <div class="row">
        <div class="price">
            24 jam  : {{ ($vehicle->price) }}<br/>
            12 jam  : {{ ($vehicle->price)*0.65 }} <br/>
            6 jam   : {{ ($vehicle->price)*0.30 }}
            
        </div>
    </div>

    <div class="row">
{{-- Other Vehicle start --}}
        <div class="container-fluid mb-5 p-5" id="catalog" >
            <h1 class="fw-bold fs-4 mb-4">Kendaraan Lainnya</h1>
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
@endsection
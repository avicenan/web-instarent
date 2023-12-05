@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid my-5">
    <div class="row">
        <div class="nav mt-5 ms-3">
            <a href="/dashboard/vehicles" class="btn btn-success mx-1"><i data-feather="arrow-left"></i> Back to All My Vehicle</a>
            <a href="" class="btn btn-warning mx-1"><i data-feather="edit"></i> Edit</a>
            <a href="" class="btn btn-danger mx-1"><i data-feather="x-circle"></i> Delete</a>
        </div>

{{-- Image start --}}
        <div class="col-md-6 p-4">
            <div class="thumbnail mb-2">
                <img class="img-thumbnail img-fluid" src="/img/stargizer.png" alt="" width="732px">
            </div>
            {{-- Button left --}}
            <div class="row">
                <div class="col"><img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt=""></div>
                <div class="col"><img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt=""></div>
                <div class="col"><img class="img-thumbnail img-fluid m-1" src="/img/stargizer.png" alt=""></div>
            </div>
            {{-- Button right --}}
        </div>
{{-- Image end --}}

{{-- Specs start --}}
        <div class="col-md-6 p-4">
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
</div>
@endsection

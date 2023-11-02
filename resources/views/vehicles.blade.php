@extends('layouts.main')

@section('container')
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
    <div class="container-fluid" style="padding: 0 10%">
        <div class="row justify-between">
          <div class="col-md-3 mb-3 position-relative">
            <a href="/vehicles/mobil-1" class="text-decoration-none">
              <div class="card py-4 px-1 shadow border-0" style="min-width: 300px; border-radius:10px;">
                <div class="card-body">
                  <div class="container text-center">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-10 text-start">
                        <h4 class="card-title text-dark fweig-medium">Stargizer Prime</h4>
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
                        <span style="font-size: 12px">Matic</span>
                      </div>
                      <div class="col d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">
                            person
                        </span>
                        <span style="font-size: 12px">7 Orang</span>
                      </div>
                      <div class="col d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">
                            speed
                        </span>
                        <span style="font-size: 12px">1500 cc</span>
                      </div>
                    </div>
                  </div>
                  <div class="container text-center">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-6 text-start">
                        <p class="my-auto fsize-4 fw-medium text-dark">Rp. 550.000/<span class="txt-ntrl500">hari</span></p>
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
        </div>
    </div>
    <a href="/home" class="my-auto">to home</a>
@endsection
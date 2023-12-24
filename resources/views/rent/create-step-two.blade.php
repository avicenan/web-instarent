@extends('rent.layouts.main')
    
@section('rent-container')

{{-- <form action="/rent" method="POST">
    <input type="text" disabled value="{{ $vehicle->title }}">
    <input type="datetime-local" disabled value="{{ $start_date }}">
    <input type="datetime-local" disabled value="{{ $end_date }}">
</form> --}}

<div class="row justify-content-center">
    <div class="col-8">
        <div class="progress-bar" style="padding: 30px">
            <div class="position-relative m-4" style="height: 20px">
                <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                  <div class="progress-bar bg-success" style="width: 33%"></div>
                </div>
                <div class="row">
                    <div class="col-3 position-absolute top-0" style="right: 85%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill" style="width: 2rem; height:2rem;">1</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw">Data Diri</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: 53%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill border-0" style="width: 2rem; height:2rem;">2</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw; ">Rincian Sewa</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: 18%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-secondary rounded-pill border-0" style="width: 2rem; height:2rem; background-color:lightgray">3</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw;  color: lightgray">Syarat<br>dan Ketentuan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: -15%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-secondary rounded-pill border-0" style="width: 2rem; height:2rem; background-color:lightgray">4</button>
                                <h6 class="me-5 fweig-reg" style="font-size: 1vw; color: lightgray">Pembayaran</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-success rounded-pill" style="width: 2rem; height:2rem; right: 93%">1</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: 66%">2</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: 33%">3</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: -3%">4</button> --}}
            </div>
        </div>
    </div>
</div>

<form action="{{ route('rent.create.step.two.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="personal-data my-3 mt-4 p-3 rounded-3 bg-white shadow-sm">
        <h5 class="fweig-bold fsize-7" id="step-title">Rincian Penyewaan</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row g-4 my-3">
            <div class="col" hidden>
                <label for="vehicle_id">Vehicle</label>
                <input type="number" class="form-control @error('vehicle_id') is-invalid @enderror" id="vehicle_id" name="vehicle_id" value="{{ $vehicle->id ?? old('vehicle_id') }}" readonly>
                @error('vehicle_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @else
                    <div class="form-text" id="basic-addon4"><small>Silakan batalkan penyewaan untuk merubah tanggal.</small></div>
                @enderror
            </div>
            <div class="col-6 position-relative">
                <div class="my-auto text-center p-2 img-thumbnail border-0">
                    @if ($vehicle->image)
                      <img src="{{ asset('/storage/' . $vehicle->image) }}" class="img-fluid" alt="..." >
                    @else
                      <img src="../img/no-image.png" class="img-fluid" alt="..." style="max-height: 160px">
                    @endif
                </div>
                <div class="position-absolute" style="top: 80%; right: 5%">
                    <button type="button" class="btn btn-secondary" style="opacity: 75%" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="vehicleToggle"><i data-feather="search"></i></button>
                </div>
            </div>
            <div class="col-6">
                <div class="col mb-4">
                    <label for="start_date">Tanggal Mulai Penyewaan</label>
                    <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ $start_date ?? old('start_date') }}" readonly>
                    @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @else
                        <div class="form-text" id="basic-addon4"><small>Silakan batalkan penyewaan untuk merubah tanggal.</small></div>
                    @enderror
                </div>
                <div class="col ">
                    <label for="end_date">Tanggal Pengembalian</label>
                    <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ $end_date ?? old('end_date') }}" readonly>
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @else
                        <div class="form-text m-0" id="basic-addon4"><small>Silakan batalkan penyewaan untuk merubah tanggal.</small></div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="rute_tujuan">Rute Tujuan</label>
                <input type="text" class="form-control @error('rute_tujuan') is-invalid @enderror" id="rute_tujuan" name="rute_tujuan" value="{{ $rent->rute_tujuan ?? old('rute_tujuan') }}">
                @error('rute_tujuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="ktp">Foto KTP</label>
                <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" value="">
                @error('ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="rute_tujuan_ket">Keterangan Rute Tujuan</label>
                <textarea class="form-control @error('rute_tujuan_ket') is-invalid @enderror" id="rute_tujuan_ket" name="rute_tujuan_ket" value="{{ $rent->rute_tujuan_ket ?? old('rute_tujuan_ket') }}" rows="5"></textarea>
                @error('rute_tujuan_ket')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-6">
                <div class="col">
                    <label for="sim">Foto SIM</label>
                    <input type="file" class="form-control mb-4 @error('sim') is-invalid @enderror" id="sim" name="sim" value="{{ $rent->sim ?? old('sim') }}">
                    @error('sim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="ktm">Foto KTM</label>
                    <input type="file" class="form-control @error('ktm') is-invalid @enderror" id="ktm" name="ktm" value="{{ $rent->ktm ?? old('ktm') }}">
                    @error('ktm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col text-start">
                    <a href="{{ route('rent.create.step.one') }}" class="btn btn-danger pull-right"><i data-feather="arrow-left"></i> Kembali</a>
                </div>
                <div class="col text-end">
                    <button type="submit" class="btn btn-warning">Lanjut <i data-feather="arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

{{ $user }}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="vehicleModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header p-2 px-3">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Kendaraan Sewa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="img-thumbnail">
                @if($vehicle->image)
                    <img src="{{ asset('/storage/' . $vehicle->image) }}" alt="" class="img-fluid">
                @else
                <img src="../img/no-image.png" alt="" class="img-fluid">
                @endif
            </div>
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
        </div>
    </div>
</div>

<script>
    const vehicleModal = document.getElementById('vehicleModal')
    const vehicleToggle = document.getElementById('vehicleToggle')

    vehicleModal.addEventListener('shown.bs.modal', () => {
    vehicleToggle.focus()
    })

</script>

@endsection
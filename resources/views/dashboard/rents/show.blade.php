@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 col-lg-10">
    <h1 class="h2">Lihat Sewa #{{ $rent->id }} </h1>
    <span class="badge text-white rounded-pill me-3" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></span>
</div>


<div class="container-fluid my-3 ps-0">
    <div class="row mb-3">
        <div class="actions">
            <form action="/dashboard/rents/{{ $rent->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="mx-1 badge bg-neutral500 border-0"  onclick="return confirm('Apa anda yakin ingin membatalkan?')"><span class="fweig-semibold me-2">Batalkan</span> <i data-feather="x-circle"></i></button>
            </form>
            <a href="/dashboard/rents/{{ $rent->id }}/edit" class="mx-1 badge bg-success text-decoration-none"><span class="fweig-semibold me-2">Lanjutkan Proses</span> <i data-feather="chevrons-right"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title fsize-5 fweig-medium mb-4">Data Diri Penyewa</h5>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama_lengkap" value="{{ $rent->nama_lengkap }}" readonly disabled>
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user_id" value="{{ $rent->user->email }}" readonly disabled>
                        <label for="user_id">Email Akun User</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="alamat" value="{{ $rent->alamat }}" readonly disabled>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="row g-1">
                        <div class="fsize-2">Kontak</div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="telp_num" value="{{ $rent->telp_num }}" readonly disabled>
                                <label for="telp_num">Nomor Telepon</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sec_contact" value="{{ $rent->sec_contact }}" readonly disabled>
                                <label for="sec_contact">Nomor Telepon Darurat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="fsize-2">Media Sosial</div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username_instagram" value="{{ $rent->username_instagram }}" readonly disabled>
                                <label for="username_instagram">Username Instagram</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="id_line" value="{{ $rent->id_line }}" readonly disabled>
                                <label for="id_line">Id Line</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="fsize-2">Profesi</div>
                        <div class="col-12">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="pekerjaan" value="{{ $rent->pekerjaan }}" readonly disabled>
                                <label for="pekerjaan">Pekerjaan</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="universitas" value="{{ $rent->universitas }}" readonly disabled>
                                <label for="universitas">Universitas</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="jurusan" value="{{ $rent->jurusan }}" readonly disabled>
                                <label for="jurusan">Jurusan</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="nim" value="{{ $rent->nim }}" readonly disabled>
                                <label for="nim">NIM</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="angkatan" value="{{ $rent->angkatan }}" readonly disabled>
                                <label for="angkatan">Angkatan</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kelas" value="{{ $rent->kelas }}" readonly disabled>
                                <label for="kelas">Kelas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-1 mb-3">
                        <div class="fsize-2">Dokumen Pribadi</div>
                        <div class="col">
                            <div class="fsize-2">KTP</div>
                            <img src="{{ asset('/storage/' . $rent->ktp) }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        </div>
                        <div class="col">
                            <div class="fsize-2">SIM</div>
                            <img src="{{ asset('/storage/' . $rent->sim) }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        </div>
                        <div class="col">
                            <div class="fsize-2">KTM</div>
                            <img src="{{ asset('/storage/' . $rent->ktm) }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        </div>
                        
                    </div>
                </div>
            </div>
        
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title fsize-5 fweig-medium mb-4">Data Kendaraan Sewa</h5>
                    <div class="row g-1">
                        <div class="col-4">
                            @if ($rent->vehicle->image)
                                <img src="{{ asset('/storage/'. $rent->vehicle->image) }}" class="img-fluid img-thumbnail" alt="">
                            @else
                                <img src="/img/no-image.png" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="plate_num" value="{{ $rent->vehicle->plate_num }}" readonly disabled>
                                <label for="plate_num">No Polisi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="plate_num" value="{{ $rent->vehicle->brand->name . ' ' . $rent->vehicle->title }}" readonly disabled>
                                <label for="vehicle_name">Nama Kendaraan</label>
                            </div>
                            <a href="/dashboard/vehicles/{{ $rent->vehicle->slug }}" target="_blank">Lihat Detail Kendaraan</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fsize-5 fweig-medium mb-4">Data Pembayaran</h5>
                    <div class="row g-1">
                        <div class="col">
                            <div class="fsize-2">Status</div>
                            <span class="badge text-white rounded-pill" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></span>
                        </div>
                        <div class="col">
                            <div class="fsize-2">Dibayarkan</div>
                            <div class="fsize-2 font-monospace">IDR {{ number_format($rent->total_price) }}</div>
                            <hr class="my-1">
                            <div class="fsize-2 font-monospace" style="color: hotpink">IDR {{ number_format($rent->vehicle->price) }} (Sewa Kendaraan)</div>
                            <div class="fsize-2 font-monospace" style="color: hotpink">IDR {{ number_format($rent->total_price - $rent->vehicle->price) }} (Biaya Layanan)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
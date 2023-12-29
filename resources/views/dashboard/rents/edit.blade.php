@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 col-lg-10">
    <h1 class="h2">Lanjutkan Proses #{{ $rent->id }} </h1>
    <span class="badge text-white rounded-pill me-3" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></span>
</div>

<a href="/dashboard/rents">Kembali</a>

<div class="card border border-3 border-warning col-lg-10">
    <div class="card-body">
        <form method="post" action="/dashboard/rents/{{ $rent->id }}">
            @method('put')
            @csrf
            <div class="row mb-3">
                <div class="col">
                        {{-- <input type="text" value="{{ $rent->status->name }}" readonly disabled> --}}
                        <select name="status_now" id="" disabled hidden>
                            <option value="{{ $rent->status->id }}">{{ $rent->status->name }}</option>
                        </select>
                        <select name="status_id" id="status_id" hidden>
                            <option value="{{ $status_then->id }}">{{ $status_then->name }}</option>
                        </select>
                    <span class="badge text-white rounded-pill me-3" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></span>
                    <span class="fsize-2">Lanjutkan ke <i data-feather="chevrons-right"></i></span>
                    <span class="badge text-white rounded-pill ms-3" style="background-color: {{ $status_then->color }}"><span class="fweig-semibold">{{ $status_then->name }}</span></span>
                </div>
            </div>
            @if ($rent->status->slug == 'booked')
                <div class="row mb-4">
                    <div class="col">
                        <p class="fsize-2 txt-ntrl500 mt-2">Silakan ceklis persyaratan dibawah untuk melajutkan, perhatikan dengan baik saat menceklis.</p>
                        <input type="checkbox" id="booked1" name="booked1">
                        <label for="booked1">Apakah identitas penyewa valid?</label><br>
                        <input type="checkbox" id="booked2" name="booked2">
                        <label for="booked2">Apakah pembayaran telah masuk?</label><br>
                        <input type="checkbox" id="booked3" name="booked3">
                        <label for="booked3">Apakah kendaraan sewa telah siap digunakan?</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Perbarui Status <i data-feather="check"></i></button>
            @elseif ($rent->status->slug == 'confirmed')
                <div class="row mb-4">
                    <div class="col-8">
                        <p class="fsize-2 txt-ntrl500">Silakan ceklis persyaratan dibawah untuk melajutkan, perhatikan dengan baik saat menceklis.</p>
                        <div class="form-check mb-2">
                            <input type="checkbox" required class="form-check-input" id="confirmed1" name="confirmed1">
                            <label class="form-check-label fsize-2" for="confirmed1">Sudah melakukan dokumentasi kendaraan dengan penyewa?</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" required id="confirmed2" name="confirmed2">
                            <label class="form-check-label fsize-2" for="confirmed2">Penyewa sudah melakukan dokumentasi berupa perekaman video dan pengambilan gambar terhadap kondisi kendaraan secara menyeluruh? (termasuk sisa bensin dan saldo e-Money)</label>    
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" required id="confirmed3" name="confirmed3">
                            <label class="form-check-label fsize-2" for="confirmed3">Sudah menerima kartu identitas penyewa dalam bentuk fisik?</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Perbarui Status <i data-feather="check"></i></button>
            @endif
        </form>
    </div>
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
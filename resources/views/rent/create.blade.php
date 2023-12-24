@extends('rent.layouts.main')
    
@section('rent-container')

<div class="my-3">
    <form action="/cancel" method="post">
        @csrf
        <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('apakah ingin membatalkan penyewaan?'"><i data-feather="arrow-left"></i> Batalkan</button>
    </form>
</div>

{{-- <div class="my-3">
    <a href="/vehicles/{{ $vehicle->slug }}" class="fweig-medium text-danger" onclick="return confirm('apakah ingin membatalkan penyewaan?')"><i data-feather="arrow-left"></i> Batalkan</a>
</div> --}}

{{-- <form action="/rent" method="POST">
    <input type="text" disabled value="{{ $vehicle->title }}">
    <input type="datetime-local" disabled value="{{ $start_date }}">
    <input type="datetime-local" disabled value="{{ $end_date }}">
</form> --}}


<form action="{{ route('rent.post') }}" method="POST">
    @csrf
    
    {{-- Personal Data start --}}
    <fieldset>
        <div class="personal-data my-3 mt-4 border border-1 p-3 rounded-3">
            <legend class="fweig-bold fsize-7">Data Diri</legend>
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
                <div class="col-6" hidden>
                    <label for="user_id">User</label>
                    <input type="number" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{ $user->id ?? old('user_id') }}">
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $rent->nama_lengkap ?? $user->fname . ' ' . $user->lname ?? old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ $rent->pekerjaan ?? old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $rent->alamat ?? old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="universitas">Universitas</label>
                    <input type="text" class="form-control @error('universitas') is-invalid @enderror" name="universitas" id="universitas" value="{{ $rent->universitas ?? old('universitas') }}">
                    @error('universitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="telp_num">No. Hp / WhatsApp</label>
                    <input type="number" class="form-control @error('telp_num') is-invalid @enderror" id="telp_num" name="telp_num" value="{{ $rent->telp_num ?? old('telp_num') }}">
                    @error('telp_num')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="nim">NIM</label>
                    <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $rent->nim ?? old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="sec_contact">Kontak Darurat</label>
                    <input type="text" class="form-control @error('sec_contact') is-invalid @enderror" id="sec_contact" name="sec_contact" value="{{ $rent->sec_contact ?? old('sec_contact') }}">
                    @error('sec_contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="jurusan">Fakultas / Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ $rent->jurusan ?? old('jurusan') }}">
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="id_line">ID Line</label>
                    <input type="text" class="form-control @error('id_ine') is-invalid @enderror" id="id_line" name="id_line" value="{{ $rent->id_line ?? old('id_line') }}">
                    @error('id_line')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" value="{{ $rent->angkatan ?? old('angkatan') }}">
                    @error('angkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="username_instagram">Username Instagram</label>
                    <input type="text" class="form-control @error('username_instagram') is-invalid @enderror" id="username_instagram" name="username_instagram" value="{{ $rent->username_instagram ?? old('username_instagram') }}">
                    @error('username_instagram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ $rent->kelas ?? old('kelas') }}">
                    @error('kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right text-end">
                <button type="submit" class="btn btn-warning">Lanjut <i data-feather="arrow-right"></i></button>
            </div>
        </div>
    </fieldset>
    {{-- Personal Data end --}}

    {{-- Rent Details start --}}
    <fieldset>
        <div class="rent-details my-3 mt-4 border border-1 p-3 rounded-3">
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
                    <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" value="{{ $rent->ktp ?? old('ktp') }}">
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
    </fieldset>
    {{-- Rent Details end --}}

    {{-- TnC start --}}
    {{-- TnC end --}}

</form>

{{-- Step Toggle start --}}

{{-- Step Toggle end --}}

<script id="template" type="text/template">
    <div>
      <button class="previous" type="button">&lt;</button>
      <span><%= index %></span>
      <button class="next" type="button">&gt;</button>
      <a class="show-all" href="#">Show all pages</a>
      <progress value="<%= progress %>"></progress>
    </div>
  </script>

@endsection
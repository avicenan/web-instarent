@extends('rent.layouts.main')
    
@section('rent-container')

<div class="my-3">
    <form action="/cancel" method="post">
        @csrf
        <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('apakah ingin membatalkan penyewaan?'"><i data-feather="arrow-left"></i> Batalkan</button>
    </form>
</div>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="progress-bar" style="padding: 30px">
            <div class="position-relative m-4" style="height: 20px">
                <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                  <div class="progress-bar" style="width: 0%"></div>
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
                                <button type="button" class="translate-middle btn btn-sm btn-secondary rounded-pill border-0" style="width: 2rem; height:2rem; background-color:lightgray">2</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw; color: lightgray">Rincian Sewa</h6>
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

{{-- <div class="my-3">
    <a href="/vehicles/{{ $vehicle->slug }}" class="fweig-medium text-danger" onclick="return confirm('apakah ingin membatalkan penyewaan?')"><i data-feather="arrow-left"></i> Batalkan</a>
</div> --}}

{{-- <form action="/rent" method="POST">
    <input type="text" disabled value="{{ $vehicle->title }}">
    <input type="datetime-local" disabled value="{{ $start_date }}">
    <input type="datetime-local" disabled value="{{ $end_date }}">
</form> --}}


<form action="{{ route('rent.create.step.one.post') }}" method="POST">
    @csrf
    
    <div class="shadow-sm personal-data my-3 mt-4 p-3 rounded-3 bg-white">
        <h5 class="fweig-bold fsize-7">Data Diri</h5>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
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
</form>

@endsection
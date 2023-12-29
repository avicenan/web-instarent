@extends('layouts.entry')

@section('form-container')
    <h1 class="fsize-11 fweig-bold">Daftar</h1>
    <p>Sudah punya akun? <span><a href="/login">Masuk</a></span></p>
    <div class="container mt-5 p-0">
        <form action="/register" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class=" input-group-lg">
                        <label for="fname" class="form-label fw-medium fsize-5">Nama Depan</label>
                        <input type="text" class="form-control fs-6 @error('fname') is-invalid @enderror" id="fname" placeholder="Masukkan nama" name="fname" value="{{ old('fname') }}">
                        @error('fname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" input-group-lg">
                        <label for="lname" class="form-label fw-medium fsize-5">Nama Belakang</label>
                        <input type="text" class="form-control fs-6 @error('lname') is-invalid @enderror" id="lname" placeholder="Masukkan nama" name="lname" value="{{ old('lname') }}">
                        @error('lname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="input-group-lg">
                        <label for="telpNum" class="form-label fw-medium fsize-5">Nomor Telepon</label>
                        <div class="input-group input-group-lg mb-3">
                            <span class="input-group-text" id="country">ID</span>
                            <input type="number" class="form-control fs-6 @error('telpNum') is-invalid @enderror" placeholder="Masukkan No. Telp" name="telpNum" value="{{ old('telpNum') }}">
                            @error('telpNum')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" input-group-lg">
                        <label for="email" class="form-label fw-medium fsize-5">Email</label>
                        <input type="email" class="form-control fs-6 @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class=" input-group-lg">
                        <label for="password" class="form-label fw-medium fsize-5">Kata Sandi</label>
                        <input type="password" class="form-control fs-6 @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Kata Sandi" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" input-group-lg">
                        <label for="password_confirmation" class="form-label fw-medium fsize-5 @error('password_confirmation') is-invalid @enderror">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control fs-6" placeholder="Masukkan kata sandi kembali" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror   
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label fw-medium" for="rememberMe">Ingat saya</label>
                    </div>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class=" form-check">
                        <input type="checkbox" class="form-check-input @error('tnc') is-invalid @enderror" id="tnc" name="tnc" required>
                        <label class="form-check-label fw-medium" for="tnc">Saya menyetujui <span><a href="#">Syarat dan Ketentuan</a></span> yang berlaku</label>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-lg fw-medium fs-5 bg-ter1 bd-ter1">Daftar</button>
                    {{-- <button type="button" class="btn btn-outline-success btn-lg mx-3 fw-medium fs-5 bd-ter1 txt-ter1" id="checkTnc"><span class="me-3"><img src="/img/search.png" alt=""></span>Daftar dengan Google</button> --}}
                </div>
            </div>
        </form>
    </div>
@endsection
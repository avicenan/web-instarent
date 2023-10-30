@extends('layouts.entry')

@section('form-container')
    <h1 class="fsize-11 fweig-bold">Daftar</h1>
    <p>Sudah punya akun? <span><a href="#">Masuk</a></span></p>
    <div class="container mt-5 ps-0">
        <form action="">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="fname" class="form-label fw-medium">Nama Depan</label>
                        <input type="text" class="form-control fs-6" id="fname" placeholder="Masukkan nama" name="fname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="lname" class="form-label fw-medium">Nama Belakang</label>
                        <input type="text" class="form-control fs-6" id="lname" placeholder="Masukkan nama" name="lname">
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="telpNum" class="form-label fw-medium">Nomor Telepon</label>
                        <div class="input-group input-group-lg mb-3">
                            <span class="input-group-text" id="country">ID</span>
                            <input type="number" class="form-control fs-6" placeholder="Masukkan No. Telp" name="telpNum">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="email" class="form-label fw-medium">Email</label>
                        <input type="email" class="form-control fs-6" id="email" placeholder="Masukkan Email" name="email">
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="password" class="form-label fw-medium">Kata Sandi</label>
                        <input type="password" class="form-control fs-6" id="password" placeholder="Masukkan Kata Sandi" name="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 input-group-lg">
                        <label for="passConfirmation" class="form-label fw-medium">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control fs-6" placeholder="Masukkan kata sandi kembali" name="passConfirmation">   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label fw-medium" for="rememberMe">Ingat saya</label>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="tnc" name="tnc">
                        <label class="form-check-label fw-medium" for="tnc">Saya menyetujui <span><a href="#">Syarat dan Ketentuan</a></span> yang berlaku</label>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-lg mx-3 fw-medium fs-5 bg-ter1 bd-ter1">Daftar</button>
                    <button type="button" class="btn btn-outline-success btn-lg mx-3 fw-medium fs-5 bd-ter1 txt-ter1" id="checkTnc"><span class="me-3"><img src="/img/search.png" alt=""></span>Daftar dengan Google</button>
                </div>
            </div>
        </form>
    </div>
    <a href="/login">to login</a>
@endsection
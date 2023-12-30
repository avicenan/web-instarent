@extends('layouts.entry')

@section('form-container')

{{-- Title start --}}
    <h1 class="fsize-11 fweig-bold">Masuk</h1>
    <p>Belum punya akun? <span><a href="/register">Daftar sekarang!</a></span></p>
{{-- Title end --}}

{{-- Form start --}}
    <div class="container mt-5 ps-0">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="/login" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col-md-10">
                    <div class="mb-3 input-group-lg">
                        <label for="email" class="form-label fw-medium fsize-5">Email</label>
                        <input type="email" class="form-control fs-6 @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" autofocus required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="mb-3 input-group-lg">
                        <label for="password" class="form-label fw-medium fsize-5">Kata Sandi</label>
                        <input type="password" class="form-control fs-6" id="password" placeholder="Masukkan Kata Sandi" name="password" autofocus required>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-success mx-3 fw-medium fs-5 text-white">Masuk</button>
                </div>
            </div>
        </form>
    </div>
{{-- Form end --}}

@endsection
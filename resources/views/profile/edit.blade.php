@extends('layouts.main')

@section('container')

<h1 class="mt-5 mb-4 fsize-5 fweig-medium">Pengaturan Profil</h1>

<div class="background">
    <div class="containers">
        <!-- Account page navigation-->
        <div class="card rounded-4 border-0 shadow-sm" >
            
            <div class="card-body mx-4 mt-4">
                <h3>{{ $user->fname . ' ' . $user->lname }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 my-3 text-center">
                            <input type="hidden" name="oldImage" value="{{ $user->image }}">
                            <img src="{{ asset('storage/' . $user->image) }}" style="width: 200px; height:200px; object-fit:cover" class="img-fluid rounded-circle" >
                            <input class="my-3" type="file" name="image">
                        </div>
                      </div>   
                    <!-- Form Row-->
                    <div class="row gx-3 mb-2"> 
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="fname">Nama Depan</label>
                            <input class="form-control fsize-3 px-3" id="fname" name="fname" type="text" placeholder="Nama Depan" value="{{ $user->fname }}">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="lname">Nama Belakang</label>
                            <input class="form-control fsize-3 px-3" id="lname" name="lname" type="text" placeholder="Nama Belakang" value="{{ $user->lname }}">
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3">
                        <!-- Form Group (User Name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="usernames">Nama Pengguna</label>
                            <input class="form-control fsize-3 px-3" id="username" name="username" type="text" placeholder="..." value="{{ $user->username }}">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="password">Password</label>
                            <div class="input-group position-relative">
                                <input class="form-control fsize-3 px-3" id="password" name="password" type="password" placeholder="*********" value="">
                            </div>
                        </div>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (Email)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="email">Email</label>
                            <input class="form-control fsize-3 px-3" id="email" name="email" type="email" placeholder="..." value="{{ $user->email }}" disabled>
                        </div>
                        <!-- Form Group (phone number)-->
                        <div class=" col-md-6">
                                <label class="small mb-2 fsize-2" for="telpNum">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="Indonesia.png" class="pe-2" height="20" alt="">ID
                                    </span>
                                <input class="form-control fsize-3 px-3" id="telpNum" name="telpNum" type="tel" name="birthday" placeholder="Masukkan Nomor Anda" value="{{ $user->telpNum }}">
                                </div>
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-success fw-normal" type="button"><i data-feather="save" class="feather-16 me-2"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
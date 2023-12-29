@extends('layouts.main')

@section('container')

<h1 class="mt-5 mb-4 fsize-5 fweig-medium">Pengaturan Profil</h1>

<div class="background">
    <div class="containers">
        <!-- Account page navigation-->
        <div class="card rounded-4 border-0 shadow-sm" >
            
            <div class="card-body mx-4 mt-4">
                <h3>{{ $user->fname . ' ' . $user->lname }}</h3>
                <form>
                    <div class="row d-flex align-items-center">
                        <div class="col my-3 text-center">
                              <img src="{{ asset('storage/' . $user->image) }}" style="width: 200px; height:200px; object-fit:cover" class="img-fluid rounded-circle" >   
                        </div>
                      </div>   
                    <!-- Form Row-->
                    <div class="row gx-3 mb-2">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="inputFirstName">Nama Depan</label>
                            <input class="form-control fsize-3 px-3" id="inputFirstName" type="text" placeholder="Nama Depan" value="{{ $user->fname }}" disabled>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="inputLastName">Nama Belakang</label>
                            <input class="form-control fsize-3 px-3" id="inputLastName" type="text" placeholder="Nama Belakang" value="{{ $user->lname }}" disabled>
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3">
                        <!-- Form Group (User Name)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="inputOrgName">Nama Pengguna</label>
                            <input class="form-control fsize-3 px-3" id="inputOrgName" type="text" placeholder="..." value="{{ $user->username }}" disabled>
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="inputLocation">Password</label>
                            <div class="input-group position-relative">
                                <input class="form-control fsize-3 px-3" id="inputLocation" type="password" placeholder="*********" value="" disabled>
                                {{-- <span class="bi bi-eye-slash position-absolute p-2" style="right:1%">
                                    <button style="position:absolute; right:1%; bottom: 10%; opacity:0;" type="submit">sh
                                    </button>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (Email)-->
                        <div class="col-md-6">
                            <label class="small mb-2 fsize-2" for="inputEmail">Email</label>
                            <input class="form-control fsize-3 px-3" id="inputEmail" type="email" placeholder="..." value="{{ $user->email }}" disabled>
                        </div>
                        <!-- Form Group (phone number)-->
                        <div class=" col-md-6">
                                <label class="small mb-2 fsize-2" for="inputPhone">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="Indonesia.png" class="pe-2" height="20" alt="">ID
                                    </span>
                                <input class="form-control fsize-3 px-3" id="inputPhone" type="tel" name="birthday" placeholder="Masukkan Nomor Anda" value="{{ $user->telpNum }}" disabled>
                                </div>
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <div class="text-end">
                        <a href="/profile/edit" class="btn btn-sm btn-warning fw-normal" type="button"><i data-feather="edit" class="feather-16 me-2"></i> Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
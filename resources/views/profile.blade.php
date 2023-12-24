@extends('layouts.main')

@section('container')
<div class="background">
    <div class="container-xl px-4 py-5">
        <!-- Account page navigation-->
        <div class="card rounded-4" >
            <div class="row">
                <div class="col-md-5">
                    <nav class="nav nav-borders px-3">
                        <a class="nav-link active " href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Data Diri</a>
                        <a class="nav-link" href="" target="__blank">Reservasi</a>
                    </nav>
                </div>       
            </div>
            <hr class="my-0">
            
            <div class="card-body mx-4 mt-4">
                <h3>Ananta Pratama</h3>
                <form>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 my-3 text-center">
                      
                              <img src="Avatar.png"  width="200" height="200" class="img-fluid" >   
                        </div>
                        <div class="col-lg-5 gx-0 mb-4">
                          <div class="row ">
                              <div class="button d-flex justify-content-evenly ">
                                  <button class="btn border-light-subtle btn-sm  px-4 mx-4 normal rounded-3" 
                                    >Pilih Foto</button>
                                  <button class="btn border-light-subtle btn-sm px-4 mx-4 normal rounded-3 " 
                                  style="color: red;" >Hapus Foto</button>
                                  <!-- <button class="btn btn-outline-dark btn-sm ms-4">+ follow</button>
                                  <button class="btn btn-outline-dark btn-sm ms-4">See Profile</button>                                 -->
                              </div>
                          </div>

                        </div>

                      </div>   
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Nama Depan</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Nama Depan" value="">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Nama Belakang</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="Nama Belakang" value="">
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3">
                        <!-- Form Group (User Name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Nama Pengguna</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Nama Pengguna" value="">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Password</label>
                            <div class="input-group position-relative">
                                <input class="form-control" id="inputLocation" type="password" placeholder="*********" value="">
                                <span class="bi bi-eye-slash position-absolute p-2" style="right:1%">
                                    <button style="position:absolute; right:1%; bottom: 10%; opacity:0;" type="submit">sh
                                    </button>
                                </span>
                            </div>
                           

                           
                            <div class="form-text text-end" id="basic-addon4">
                                <a href="" style="color: #52B788;">Ganti Password?</a>
                            </div>
                    
                        </div>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (Email)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputEmail">Email</label>
                            <input class="form-control" id="inputEmail" type="email" placeholder="example@mail.com" value="">
                        </div>
                        <!-- Form Group (phone number)-->
                        <div class=" col-md-6">
                                <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="Indonesia.png" class="pe-2" height="20" alt="">ID
                                    </span>
                                <input class="form-control" id="inputPhone" type="tel" name="birthday" placeholder="Masukkan Nomor Anda" value="">
                                </div>
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <div class="text-end">
                        <button class="btn fw-normal px-5" style="background-color: #52B788; color: white;" type="button">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
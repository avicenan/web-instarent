<?php

use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LoginController;

use App\Models\Brand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Beranda",
        "active" => "home",
        "vehicles" => Vehicle::all()
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Beranda",
        "active" => "home",
        "vehicles" => Vehicle::all()
    ]);
});

Route::get('/register', function () {
    return view('register', [
        "title" => "Daftar",
        "active" => "register",
    ]);
});

Route::get('/login', function () {
    return view('login', [
        "title" => "Masuk",
        "active" => "login",
    ]);
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/vehicles', [VehicleController::class, 'index']);

Route::get('/vehicles/{vehicle:slug}', [VehicleController::class, 'show']);

Route::get('/brands', function() {
    return view('brands', [
        'title' => 'Vehicle Brands',
        'brands' => Brand::all(),
        'active' => 'vehicles'
    ]);
});

Route::get('/brands/{brand:slug}', function(Brand $brand) {
    return view('brand', [
        'title' => $brand->name,
        'vehicles' => $brand->vehicles,
        'brand' => $brand->name,
        'active' => 'vehicles'
    ]);
});

Route::get('/rent', function() {
    return view('rent', [
        'title' => 'Sewa Kendaraan',
        'active' => 'vehicles',
    ]);
});
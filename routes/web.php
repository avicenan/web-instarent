<?php

use App\Http\Controllers\DashboardController;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RegisterController;

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

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

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
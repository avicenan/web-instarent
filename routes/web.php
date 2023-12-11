<?php

use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentController;
use Carbon\Carbon;

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardVehicleController;
use App\Http\Controllers\DashboardRentController;

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
    
    if(request('start_date') && request('end_date')) {
        session(['start_date' => request('start_date')]);
        session(['end_date' => request('end_date')]);
    } else {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        session(['start_date' => $today]);
        session(['end_date' => $tomorrow]);
    }

    return view('home', [
        "title" => "Beranda",
        "active" => "home",
        "vehicles" => Vehicle::all()
    ]);
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/vehicles', [VehicleController::class, 'index']);

Route::get('/vehicles/{vehicle:slug}', [VehicleController::class, 'show']);

Route::post('/vehicles/{vehicle:slug}', [VehicleController::class, 'storeSession']);

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

Route::get('/rent', [RentController::class, 'index'])->middleware('auth');

Route::post('/rent', [RentController::class, 'store']);

Route::get('/dashboard/vehicles/checkSlug', [DashboardVehicleController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/vehicles', DashboardVehicleController::class)->middleware('auth');

Route::resource('/dashboard/rents', DashboardRentController::class)->middleware('auth');

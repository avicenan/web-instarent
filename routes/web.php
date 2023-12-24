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

// test route
Route::get('/welcome', function() {
    return view('welcome', [
        'rent' => session()->get('rent')
    ]);
})->name('welcome');

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
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/cancel', [RentController::class, 'cancel']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/vehicles', [VehicleController::class, 'index']);

Route::get('/vehicles/{vehicle:slug}', [VehicleController::class, 'show']);

Route::post('/vehicles/{vehicle:slug}', [VehicleController::class, 'store']);

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

Route::post('/rent', [RentController::class, 'store']);

Route::get('/dashboard/vehicles/checkSlug', [DashboardVehicleController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/vehicles', DashboardVehicleController::class)->middleware('auth');

Route::resource('/dashboard/rents', DashboardRentController::class)->middleware('auth');


// Renting Process

Route::get('rent/create-step-one', [RentController::class , 'createStepOne'])->name('rent.create.step.one')->middleware('auth');
Route::post('rent/create-step-one', [RentController::class , 'postCreateStepOne'])->name('rent.create.step.one.post')->middleware('auth');
  
Route::get('rent/create-step-two', [RentController::class , 'createStepTwo'])->name('rent.create.step.two')->middleware('auth');
Route::post('rent/create-step-two', [RentController::class , 'postCreateStepTwo'])->name('rent.create.step.two.post')->middleware('auth');
  
Route::get('rent/create-step-three', [RentController::class , 'createStepThree'])->name('rent.create.step.three')->middleware('auth');
Route::post('rent/create-step-three', [RentController::class , 'postCreateStepThree'])->name('rent.create.step.three.post')->middleware('auth');

Route::get('rent/create-checkout', [RentController::class , 'createCheckout'])->name('rent.create.checkout')->middleware('auth');
Route::get('rent/success', [RentController::class , 'success'])->name('rent.success')->middleware('auth');

Route::get('/profile', function() {
    return view('profile');
});
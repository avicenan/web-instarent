<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Brand;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Category;

class VehicleController extends Controller
{
    
    public function index()
    {

        return view('vehicles', [
            "title" => "Katalog",
            "active" => "vehicles",
            "vehicles" => Vehicle::latest()->filter(request(['search', 'brand', 'category', 'start_date', 'end_date']))->paginate(4)->withQueryString(),
            "brands" => Brand::all(),
            "categories" => Category::all()
        ]);
    }
    public function show(Vehicle $vehicle)
    {
        return view('vehicle', [
            "title" => "Vehicle Details",
            "active" => "vehicles",
            "vehicle" => $vehicle,
            "vehicles" => Vehicle::all()
        ]);
    }
}

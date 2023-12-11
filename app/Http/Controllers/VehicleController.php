<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Brand;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Category;
use App\Models\Type;
use Carbon\Carbon;

class VehicleController extends Controller
{
    public function index()
    {   

        if(request('start_date') && request('end_date')) {
            session(['start_date' => request('start_date')]);
            session(['end_date' => request('end_date')]);
        } else {
            $today = Carbon::today();
            $tomorrow = Carbon::tomorrow();

            session(['start_date' => $today]);
            session(['end_date' => $tomorrow]);
        }

        $start_date = new Carbon(session('start_date'));
        $end_date = new Carbon(session('end_date'));
    
        return view('vehicles', [
            "title" => "Katalog",
            "active" => "vehicles",
            "vehicles" => Vehicle::latest()->filter(request(['search', 'brand', 'category', 'start_date', 'end_date']))->paginate(4)->withQueryString(),
            "brands" => Brand::all(),
            "categories" => Category::all(),
            "types" => Type::all(),
            "start_date_string" => $start_date->toDayDateTimeString(),
            "end_date_string" => $end_date->toDayDateTimeString(),
            "duration" => [
                "day" => $end_date->day - $start_date->day
            ]
        ]);
    }
    public function show(Vehicle $vehicle)
    {   
        $start_date = new Carbon(session('start_date'));
        $end_date = new Carbon(session('end_date'));

        return view('vehicle', [
            "title" => "Vehicle Details",
            "active" => "vehicles",
            "vehicle" => $vehicle,
            "vehicles" => Vehicle::latest()->filter(request(['start_date', 'end_date'])),
            "start_date_string" => $start_date->toDayDateTimeString(),
            "end_date_string" => $end_date->toDayDateTimeString(),
            "duration" => [
                "day" => $end_date->day - $start_date->day
            ],
            "rent_fee" => 5000
        ]);
    }

    public function storeSession()
    {
        session(['vehicle' => request('vehicle')]);

        return redirect('/rent');
    }
    

}

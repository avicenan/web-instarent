<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Rent;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transmission;
use App\Models\Type;
use Carbon\Carbon;


class VehicleController extends Controller
{
    public function index(Request $request)
    {   
        $today = Carbon::today(7)->addHours(10);
        $tomorrow = Carbon::tomorrow(7)->addHours(10);

        // $validatedData = $request->validate([
        //     'start_date' => 'required|min:'
        // ]);


        if($request->start_date && $request->end_date) {
            session(['start_date' => $request->start_date]);
            session(['end_date' => $request->end_date]);
        } else {
            session(['start_date' => $today]);
            session(['end_date' => $tomorrow]);
        }

        $start_date = new Carbon(session('start_date'));
        $end_date = new Carbon(session('end_date'));
    
        return view('vehicles', [
            "title" => "Katalog",
            "active" => "vehicles",
            "vehicles" => Vehicle::latest()->filter(request(['search', 'brand', 'category', 'type', 'start_date', 'end_date']))->paginate(4)->withQueryString(),
            "brands" => Brand::all(),
            "categories" => Category::all(),
            "types" => Type::all(),
            "transmissions" => Transmission::all(),
            "today" => Carbon::today(7),
            "tommorow" => Carbon::tomorrow(7),
            "rents" => Rent::all(),
            "start_date" => $start_date,
            "end_date" => $end_date,
            "duration" => [
                "day" => $end_date->day - $start_date->day
            ]
        ]);
    }
    public function show(Vehicle $vehicle, Request $request)
    {   
        if($request->start_date && $request->end_date) {
            session(['start_date' => $request->start_date]);
            session(['end_date' => $request->end_date]);
        }

        $start_date = new Carbon(session('start_date'));
        $end_date = new Carbon(session('end_date'));

        $date = array(
            "start_date" => session('start_date'),
            "end_date" => session('end_date')
          );

        return view('vehicle', [
            "title" => "Vehicle Details",
            "rents" => Rent::all(),
            "vehicle" => $vehicle,
            "vehicles" => Vehicle::latest()->filter($date)->get(),
            "start_date" => $start_date,
            "end_date" => $end_date,
            "today" => Carbon::today(7),
            "tommorow" => Carbon::tomorrow(7),
            "duration" => [
                "day" => $end_date->day - $start_date->day
            ],
            "rent_fee" => 5000
        ]);
    }
    
    public function store(Vehicle $vehicle, Request $request)
    {
        $start_date = new Carbon(session('start_date'));
        $end_date = new Carbon(session('end_date'));
        
        session([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'vehicle' => $vehicle,
            'rent_fees' => 5000,
            'duration' => [
                "day" => $end_date->day - $start_date->day
            ]
        ]);

        return redirect('/rent/create-step-one');
    }

}

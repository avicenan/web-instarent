<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class DashboardVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vehicles.index', [
            'vehicles' => Vehicle::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vehicles.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:vehicles',
            'category_id' => 'required',
            'brand_id' => 'required',
            'type_id' => 'required',
            'transmission' => 'required',
            'capacity' => 'required|max:2',
            'power' => 'required',
            'price' => 'required',
            'plate_num' => 'required',
            'color' => 'required'
        ]);

        // $validatedData['user_id'] = auth()->user()->id;

        Vehicle::create($validatedData);

        return redirect('/dashboard/vehicles')->with('success', 'Kendaraan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('dashboard.vehicles.show', [
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function checkSlug (Request $request)
    {
        $slug = SlugService::createSlug(Vehicle::class, 'slug', $request->title . '-' . $request->plate_num);
        return response()->json(['slug' => $slug]);
    }
}

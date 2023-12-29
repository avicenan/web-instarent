<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Transmission;
use App\Models\Type;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
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
            'types' => Type::all(),
            'transmissions' => Transmission::all()
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
            'transmission_id' => 'required',
            'capacity' => 'required|max:2',
            'power' => 'required',
            'price' => 'required',
            'plate_num' => 'required',
            'color' => 'required',
            'image' => 'required|image|file|max:5120'
        ]);

        // $validatedData['user_id'] = auth()->user()->id;

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('vehicle-images');
        }

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
        //menampilkan view edit
        return view('dashboard.vehicles.edit', [
            'vehicle' => $vehicle,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'types' => Type::all(),
            'transmissions' => Transmission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //proses edit
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'brand_id' => 'required',
            'type_id' => 'required',
            'transmission_id' => 'required',
            'capacity' => 'required|max:2',
            'power' => 'required',
            'price' => 'required',
            'plate_num' => 'required',
            'color' => 'required',
            'image' => 'required|image|file|max:5120'
        ];

        // if($request->slug != $vehicle->slug) {
        //     $rules['slug'] = 'required|unique:vehicles';
        // }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('vehicle-images');
        }

        Vehicle::where('id', $vehicle->id)
                ->update($validatedData);

        return redirect('/dashboard/vehicles')->with('success', 'Kendaraan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        if($vehicle->image) {
            Storage::delete($vehicle->image);
        }
        
        Vehicle::destroy($vehicle->id);

        return redirect('/dashboard/vehicles')->with('success', 'Kendaraan telah berhasil dibatalkan!');
    }

    public function checkSlug (Request $request)
    {
        $slug = SlugService::createSlug(Vehicle::class, 'slug', $request->title . '-' . bcrypt($request->plate_num));
        return response()->json(['slug' => $slug]);
    }
}

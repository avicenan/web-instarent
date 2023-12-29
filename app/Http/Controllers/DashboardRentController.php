<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class DashboardRentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   

        // menghilangkan file tidak perlu
        $rents = Rent::all();
        $files = Storage::disk('public')->allFiles('rent-attachment');
        $rent_atts = array();
        $dump = array();

        foreach ($rents as $rent) {
            $ktp = $rent->ktp;
            $sim = $rent->sim;
            $ktm = $rent->ktm;
            
            array_push($rent_atts, $ktp, $sim, $ktm);
        }

        foreach ($files as $file) {

            if (!in_array($file, $rent_atts)) {
                File::delete('storage/'.$file);
            }
        }
        

        return view('dashboard.rents.index', [
            'rents' => Rent::latest()->filter(request(['search','status']))->paginate(10)->withQueryString(),
            'all_rents' => Rent::all(),
            'status' => Status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        return view('dashboard.rents.show', [
            'rent' => $rent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {

        $status_then_num = $rent->status_id + 1;
        $status_then = Status::firstWhere('id', $status_then_num);
        
        return view('dashboard.rents.edit', [
            'rent' => $rent,
            'status_then' => $status_then
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {   
        $rules = [
            'status_id' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Rent::where('id', $rent->id)
                ->update($validatedData);

        return redirect('/dashboard/rents')->with('success', 'Sewa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        Rent::destroy($rent->id);

        return redirect('/dashboard/rents')->with('success', 'Sebuah sewa telah berhasil dihapus!');
    }
}

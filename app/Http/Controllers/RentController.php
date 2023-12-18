<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Controllers\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (session('vehicle')) {
            return view('rent.index', [
                'title' => 'Sewa Kendaraan',
                'vehicle' => session('vehicle'),
                'start_date' => session('start_date'),
                'end_date' => session('end_date'),
                'rent_fee' => session('rent_fee'),
            ]);
        }

        return redirect('/vehicles');

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
    public function store(StoreRentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }

    // Renting Process

     /**
     * Show the step One Form for creating a new rent.
     *
     * 
     */
    public function createStepOne(Request $request)
    {
        
        $rent = $request->session()->get('rent');

        
        return view('rent.create-step-one', [
            'title' => 'Sewa - Data Diri',
            'vehicle' => session('vehicle'),
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'rent_fee' => session('rent_fee'),
            'user' => Auth::user(),
            'rent' => $rent
        ]);
    }
  
    /**  
     * Post Request to store step1 info in session
     *
     *
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'telp_num' => 'required',
            'sec_contact' => 'required',
            'username_instagram' => 'required',
            'pekerjaan' => 'required',
            'universitas' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'id_line' => 'max:12',
            'angkatan' => 'required',
            'kelas' => 'required' 
        ]);
  
        if(empty($request->session()->get('rent'))){
            $rent = new Rent;
            $rent->fill($validatedData);
            $request->session()->put('rent', $rent);
        }else{
            $rent = $request->session()->get('rent');
            $rent->fill($validatedData);
            $request->session()->put('rent', $rent);
        }
  
        return redirect()->route('rent.create.step.two');
        // return redirect()->route('welcome');
    }
  
    /**
     * Show the step One Form for creating a new rent.
     *
     * 
     */
    public function createStepTwo(Request $request)
    {
        $rent = $request->session()->get('rent');
  
        return view('rent.create-step-two', [
            'title' => 'Sewa - Rincian Penyewaan',
            'vehicle' => session('vehicle'),
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'rent_fee' => session('rent_fee'),
            'user' => Auth::user(),
            'rent' => $rent
        ]);
    }
  
    /**
     * Show the step One Form for creating a new rent.
     *
     *
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'rute_tujuan' => 'required',
            'rute_tujuan_ket' => 'required',
            'ktp' => 'required|image|file|max:3072',
            'sim' => 'required|image|file|max:3072',
            'ktm' => 'image|file|max:3072'
        ]);

        if($request->file('ktp') || $request->file('sim') || $request->file('ktm')) {
            $validatedData['ktp'] = $request->file('ktp')->store('rent-attachment');
            $validatedData['sim'] = $request->file('sim')->store('rent-attachment');
            $validatedData['ktm'] = $request->file('ktm')->store('rent-attachment');
        }

        $rent = $request->session()->get('rent');
        $rent->fill($validatedData);
        // $rent = array_merge($rent, $validatedData);
        // $request->session()->put('rent', $rent);
  
        // return redirect()->route('rent.create.step.three');
        return $rent;
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     *
     */
    public function createStepThree(Request $request)
    {
        $rent = $request->session()->get('rent');
  
        return view('rent.create-step-three', [
            'title' => 'Sewa - Syarat dan Ketentuan',
            'vehicle' => session('vehicle'),
            'user' => Auth::user(),
            'rent' => $rent
        ]);
    }
  
    /**
     * Show the step One Form for creating a new rent.
     *
     *
     */
    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required'
        ]);

        $rent = new Rent;
        $rent->fill($validatedData);
        $request->session()->put('rent', $rent);
  
        return redirect()->route('rent.create.step.four');
        // return $validatedData['sim'];
    }
    
     public function createStepFour(Request $request)
    {
        $rent = $request->session()->get('rent');
  
        return view('rent.create-step-four',compact('rent'));
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     *
     */
    public function postCreateStepFour(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();
  
        $request->session()->forget('product');
  
        return redirect()->route('products.index');
    }

    public function cancel(Request $request)
    {
        $request->session()->forget('rent');

        return redirect('/vehicles');
    }
}

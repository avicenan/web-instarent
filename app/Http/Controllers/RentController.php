<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Status;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Controllers\Requests;
use App\Http\Controllers\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Carbon\Carbon;

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
            'telp_num' => 'required|max:15',
            'sec_contact' => 'required|max:15',
            'username_instagram' => 'required',
            'pekerjaan' => 'required',
            'universitas' => 'required',
            'nim' => 'required|max:15',
            'jurusan' => 'required',
            'id_line' => 'max:15',
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
        $rent->save();
        // $rent = array_merge($rent, $validatedData);
        // $request->session()->put('rent', $rent);
  
        // return redirect()->route('rent.create.step.three');
        return redirect()->route('rent.create.step.three');
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
            'status_id' => Status::first(),
            'duration' => session('duration')['day'],
            'rent_price' => (session('duration')['day'])*(session('vehicle')->price),
            'rent_fees' => session('rent_fees'),
            'total_price' => session('rent_fees') + ((session('duration')['day'])*(session('vehicle')->price)),
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
        $rent = $request->session()->get('rent');
        
        $validatedData = $request->validate([
            'tnc' => 'required',
            'total_price' => 'required',
            'status_id' => 'required'
        ]);

        $rent->fill($validatedData);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$overrideNotifUrl = "/rented";

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $rent->total_price,
            ),
            'customer_details' => array(
                'first_name' => $rent->nama_lengkap,
                'email' => Auth::user()->email,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $rent->snap_token = $snapToken;

        $rent->fill($validatedData);

        $rent->save();
  
        return redirect()->route('rent.create.checkout');
    }
    
     public function createCheckout(Request $request)
    {
        $rent = $request->session()->get('rent');

        $start_date = new Carbon($rent->start_date);
        $end_date = new Carbon($rent->end_date);
  
        return view('rent.create-checkout', [
            'title' => 'Sewa - Checkout',
            'user' => Auth::user(),
            'vehicle' => session('vehicle'),
            'status' => Status::findOrFail($rent->status_id),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'duration' => session('duration')['day'],
            'rent_price' => (session('duration')['day'])*(session('vehicle')->price),
            'rent_fees' => session('rent_fees'),
            'total_price' => session('rent_fees') + ((session('duration')['day'])*(session('vehicle')->price)),
            'rent' => $rent
        ]);
        // return $rent;
    }
  
    public function success(Request $request)
    {   
        $rent = $request->session()->get('rent');

        if ($rent) {
            $rent->status_id = 2;
            $rent->save();
        }
        $request->session()->forget('rent');

        // if (empty($rent->status_id && $rent->total_price)) {
        //     $rent->status_id = $status_id[1];
        //     $rent->total_price = $total_price;
        // } else {
        //     $rent->status_id = $rent->status_id;
        //     $rent->total_price =$rent->total_price;
        // }
  
        return redirect('/rent/success')->with('success', 'Sewa berhasil dibuat!');
    }

    public function cancel(Request $request)
    {
        $request->session()->forget('rent');

        return redirect('/vehicles');
    }
}

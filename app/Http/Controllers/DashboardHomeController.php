<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Rent;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    function index() {

        return view('dashboard.index', [
            'title' => 'Home',
            'vehicles' => Vehicle::latest()->paginate(4),
            'rents' => Rent::latest()->paginate(4)
        ]);
    }
}

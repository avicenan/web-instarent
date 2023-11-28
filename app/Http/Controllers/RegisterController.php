<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Daftar",
            "active" => "register",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'telpNum' => 'required|numeric',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:password_confirmation|min:8|max:255',
            'password_confirmation'=> 'required|min:8|max:255|same:password',
            'tnc' => 'required'
        ]);

        User::create($validatedData);

        session()->flash('success', 'Registrasi berhasil! Silakan masuk');

        return redirect('/login');

    }
}

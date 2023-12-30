<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function index() {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    function edit() {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    function update(Request $request) {

        $user = Auth::user();

        $rules = [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'username' => 'required|max:255',
            'telpNum' => 'required|numeric',
            'image' => 'image|file|max:5120'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage != 'profile-photo/no-photo.png') {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-photo');
        }

        User::where('id', $user->id)
                ->update($validatedData);

        return redirect('/profile')->with('success', 'Perubahan profil berhasil disimpan!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index',[
            "title" => "Sign Up",
            "active" => "Profile"
        ]);
    }

    public function store(Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:20', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'phonenumber' => 'required|min:10|max:13',
            'address' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt(($validatedData['password']));
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        // session()->flash('success', 'Registrasi Berhasil!');
        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }
}

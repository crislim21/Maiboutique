<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdateProfileController extends Controller
{

    public function editprofile() {
        return view('editprofile', [
            'title' => 'Edit Profile',
            'active' => 'Profile'

        ]);
    }

    public function updateprofile(Request $request) {

        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:20', 'unique:users,username,' . auth()->id() ],
            'email' => ['required' , 'email:dns', 'unique:users,email,' . auth()->id()],
            'phonenumber' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:255'
        ]);


        auth()->user()->update($validatedData);

        return redirect('/profile')->with('success', 'Your Profile has been updated');
    }

    public function editpassword() {
        return view('editpassword', [
            'title' => 'Edit Profile',
            'active' => 'Profile'
        ]);
    }

    public function updatepassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|max:20|confirmed',
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('profile')->with('success', 'Your password has been changed');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our record'
        ]);
    }
}

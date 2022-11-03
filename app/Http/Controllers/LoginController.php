<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
class LoginController extends Controller
{
    //

    public function index() {
        return view('login.index', [
            "title" => "Sign In",
            "active" => "Profile"
        ]);
    }

    public function auth(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/posts');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    



}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
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
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
        ]);
        // @dd($request->get('remember'));
        $rememberMe = true;
        if($request->remember == null) {
            $rememberMe = false;
        }

        if(Auth::attempt($credentials, $rememberMe)) {
            if($rememberMe == true) {
                Cookie::queue('last_login',$request->email, time()+60);
            }
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/posts');
        }
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }





}

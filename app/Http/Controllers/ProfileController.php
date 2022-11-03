<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showrole() {
        // $seller = User::where('id', auth()->user()->id)->get('role');
        // dd($seller);
        $seller = User::where('id', auth()->user()->id)->get();
        // dd($seller);
        return view('profile', [
            'title' => 'Profile',
            'active' => 'Profile',
            // 'post' => $post,
            'seller' => $seller
        ]);


    }
}

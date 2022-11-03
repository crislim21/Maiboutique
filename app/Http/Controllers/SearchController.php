<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index() {
        return view('search',[
            "title" => "Search Your Favorites Clothes!",
            "active" => 'Search',

            "posts" => Post::latest()->filter(request(['search']))->paginate(8)->withQueryString()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->filter(request(['category','seller']))->get();
        // $posts = Post::latest()->get();

        $data = [
            "title" => "Find Your Best Clothes Here!",
            "active" => 'Posts',
            "posts" => $posts
        ];

        return view('posts', $data);
    }

    public function showpost(Post $post) {
        // dd($post);
        return view('post', [
            "title" => "Single Post",
            "active" => 'Posts',
            "post" => $post
        ]);
    }

    public function showcate() {
        $posts = Category::all();

        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'Category',
            'categories' => $posts
        ]);
    }

    public function showcatslug(Category $category) {
        
        return view('posts', [
            'title' => "Post by Category : $category->name",
            'active' => 'Category',
            'posts' => $category->posts->load('category', 'seller')
        ]);
    }

    public function showseller(User $seller) {
        return view('posts', [
            'title' => "Post By Seller : $seller->name",
            'active' => 'Posts',
            'posts'=> $seller->posts->load('category', 'seller')
        ]);
    }
}



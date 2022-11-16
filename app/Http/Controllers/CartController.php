<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        // dd($cart->count());
        return view('cart.index',[
            "title" => "Cart",
            "active" => "Cart",
            "cart" => $cart
        ]);
    }

    public function edit(Cart $cart) {


    }

    public function store(Request $request,$id) {
        if(Auth::id()) {
            $user = Auth::user();
            $product = Post::find($id);
            $cart = new cart;

            $cart->user_id = $user->id;

            $cart->post_id = $product->id;
            $cart->product_name = $product->title;
            $cart->image = $product->image;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->sub_total = $cart->price * $cart->quantity;
            $cart->save();
            return redirect('/cart')->with('success','Product berhasil ditambahkan ke dalam Cart !!');
        }


    }

    public function destroy(Post $post) {

        dd($post->id);

        return redirect('/cart')->with('success','Cart product Berhasil dihapus');
    }
}


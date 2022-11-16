<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        // dd($cart->count());
        return view('cart.index',[
            "title" => "Cart",
            "active" => "Cart",
            "cart" => $cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {
        Cart::destroy($cart);

        return redirect('/cart')->with('success','Cart product Berhasil dihapus');
    }
}

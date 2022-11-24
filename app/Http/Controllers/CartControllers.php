<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
    public function update(Request $request, $index)
    {
        // $user = auth()->user()->id;
        // dd($index);
        // $data = Cart::where($index, auth()->user()->id)->get();
        $item = DB::table('carts')->select('*')
            ->where('id', '=', $index)->get();
        $coba = $item[0]->post_id;
        $product = Post::findOrFail($item[0]->post_id);
        // $data = DB::table('carts')->select('*')->where('carts.id', $user)->get();
        // dd($product, $item[0]);
        // dd($index);

        $dummy = DB::table('users')
                    ->join('carts', 'users.id', '=', 'carts.user_id')
                    ->where('carts.user_id', '=', Auth::user()->id)
                    ->select('carts.*')->get();
        $count = $dummy->count();
        // dd($dummy[2]->id);
        // dd($dummy);
        $item = Post::find($index);
        for($i=0;$i<$count;$i++) {

            $idx = $dummy[$i]->id;
            if($idx == $item->id){
                break;
            }
        }
        // dd($idx);
        // dd($dummy,$item->id);
        $validatedData = $request->validate([
            'quantity' => ['required', 'min:1']
        ]);
        // dd($validatedData['quantity']);
        // $update = DB::table('carts')->where('post')

        Cart::where('id', $idx)
            ->update(['quantity' => $validatedData['quantity']]);
        return redirect('/cart')->with('success','Product Quantity diubah');

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

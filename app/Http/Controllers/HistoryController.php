<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\History;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller
{
    public function index()
    {
        $data = History::all();
        // dd($data);
        return view('history.index',[
            'title' => 'Check What You have Bought!',
            'active' => 'History',
            'history' => $data
        ]);
    }

    public function make_history() {
        $user = Auth::user();
        $userid = $user->id;

        $items = Cart::where('user_id','=', $userid)->get();
        $count=0;



    foreach($items as $item) {
        $history = new History;
        $history->user_id = $item->user_id;
        $history->cart_id = $item->id;
        $history->product_id = $item->post_id;
        // dd($item->image, $history->image);
        $history->product_title = $item->product_name;
        $history->quantity = $item->quantity;
        $history->price = $item->price;
        $history->image = $item->image;

        $history->total = $history->quantity * $history->price;
        $count++;
        // dd($history, $count);
        $history->save();

        $cart_id = $item->id;
        $cart = Cart::find($cart_id);
        $cart->delete();
        // dd($history);
    }

    return redirect('/history')->with('success','Cart berhasil ditambahkan ke History');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\HistoryDetail;
use App\Models\HistoryHeader;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryDetailController extends Controller
{
    public function index()
    {
        // DB::table('users')
        //             ->join('carts', 'users.id', '=', 'carts.user_id')
        //             ->where('carts.user_id', '=', Auth::user()->id)
        //             ->select('carts.*')->get();
        $data = HistoryHeader::all();
        // $data = DB::table('history_details')
        //             ->join('history_headers', 'history_details.history_header_id', '=', 'history_headers.id')
        //             ->where('history_headers.user_id', '=', Auth::user()->id)
        //             ->select('history_details.*')->get();

        // $datas = DB::table('history_headers')
        //             ->join('history_details', 'history_headers.id', '=', 'history_details.history_header_id')
        //             ->where('history_headers.user_id', '=', Auth::user()->id)
        //             ->select('history_headers.*')->get();
        // dd($data);
        return view('history.index',[
            'title' => 'Check What You have Bought!',
            'active' => 'History',
            'history' => $data,
            'count' => 0


        ]);
    }

    public function make_history() {
        $user = Auth::user();
        $userid = $user->id;

        $items = Cart::where('user_id','=', $userid)->get();
        $count=0;



        $history_header = new HistoryHeader();
        $history_header->user_id = $user->id;
        $history_header->save();
    foreach($items as $item) {
        $history = new HistoryDetail;
        $history->user_id = $item->user_id;
        $history->cart_id = $item->id;
        $history->product_id = $item->post_id;
        $history->history_header_id = $history_header->id;
        // dd($item->image, $history->image);
        $history->product_title = $item->product_name;
        $history->quantity = $item->quantity;
        $history->price = $item->price;
        $history->image = $item->image;


        $history->total += ($history->quantity * $history->price);
        $count++;
        // dd($history, $history_header);
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

<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListOrderTiketController extends Controller
{
    public function index()
    {
        $no = 0;
        $orders = OrderTiket::where('user_id',Auth::id())->get();
        // \Midtrans\Config::$serverKey = config('midtrans.Server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => 'askjasja',
        //         'gross_amount' => '8999',
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );

        // $snapToken = Snap::getSnapToken($params);
        return view('tiket.list-order-tiket', compact('no','orders'));
    }
    public function show($slug){

        $order = OrderTiket::where('slug', $slug)->firstOrFail()->get();

        return view('tiket.list-order-tiket', compact('order','snapToken'));
    }

    public function update($slug){
        $order = OrderTiket::where('slug',$slug)->firstOrFail()->get();

    }
    public function destroy($slug){
        $order = OrderTiket::where('slug', $slug)->firstOrFail();
        $order->delete();
        return redirect()->route('list.index');
    }

}

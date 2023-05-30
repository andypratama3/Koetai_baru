<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderTiket;
use App\Actions\OrderTiket\StoreOrderTiketAction;

class OrderTiketController extends Controller
{
    public function index(){
        $tikets = Tiket::all();
        return view('tiket.order-tiket', compact('tikets'));
    }

    public function order_tiket(Request $request){

        // $storeOrderAction->execute($request);
        $tikets = Tiket::select(['kategori','harga','stok','slug'])->get();
        $order = new OrderTiket();
        $order->user_id = Auth::id();
        $order->nama = $request->input("nama");
        $order->tiket_id = $request->input("tiket_id");
        $order->jumlah = $request->input("jumlah");
        $order->total = $request->total;
        //mengurangi stok pada tiket
        $stok = Tiket::find($request->tiket_id);
        $stok->stok = $stok->stok - $request->jumlah;
        $stok->update();
        $order->save();
        
        

        return response()->json(['status'=>'Tiket Berhasil Di Pesan']);
    }
    public function list_order(Request $request){

        $orders = OrderTiket::where('user_id',Auth::id())->select(['id','user_id','nama','jumlah','tiket_id','total','status','slug'])->get();
        $order = OrderTiket::select(['id','user_id','nama','jumlah','tiket_id','total','status','slug'])->firstOrFail();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_Key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('tiket.list-order-tiket', compact('orders','snapToken'));
    }

    public function update_tiket(Request $request){
        $order_id = $request->input("id");
        $qty = $request->input("jumlah");

        if(Auth::check()){
            if(OrderTiket::where('id',$order_id)->where('user_id',Auth::id())->exists())
            {
                $order = OrderTiket::where('id',$order_id)->where('user_id',Auth::id())->first();
                $order->jumlah = $qty;
                $order->update();
                return response()->json(['status'=>'Quantity Update']);
            }
        }
    }


    public function destroy(Request $request){

        if(Auth::check())
        {
            $order_id = $request->input('id');
            if(OrderTiket::where('id', $order_id)->where('user_id', Auth::id())->exists())
            {
            $order = OrderTiket::where('id', $order_id)->where('user_id', Auth::id())->first();
            $order->delete();
            return response()->json(['status' => "Tiket HasBeen Delete"]);
            }
        }
        else{
            return response()->json(['status' => "Login To continue"]);

        }
    }
    public function bayar(){

    }

}

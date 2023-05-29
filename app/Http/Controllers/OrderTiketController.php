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
    public function store(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction)
    {
        $storeOrderTiketAction->execute($request);

        return response()->json(['status'=>'Tiket Telah Di Pesan']);;
    }
    public function order_tiket(){

        $no = 0;
        $orders = OrderTiket::where('user_id',Auth::id())->get();
        return view('tiket.list-order-tiket', compact('orders','no'));
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

}

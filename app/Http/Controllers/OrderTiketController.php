<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderTiket;
use App\Actions\OrderTiket\StoreOrderTiketAction;

class OrderTiketController extends Controller
{
    public function index(){
        $tikets = Tiket::all();
        return view('tiket.order-tiket', compact('tikets'));
    }

    public function order_tiket(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction){

        $storeOrderTiketAction->execute($request);
        return response()->json(['status'=>'Tiket Berhasil Di Pesan']);
    }
    public function checkout(Request $request){

        $order = OrderTiket::where('user_id',Auth::id())->first();
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
                'jumlah' => $order->jumlah,

            ),
            'customer_details' => array(
                'nama' => $order->nama,
                'slug' => $request->slug,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('tiket.tiket-pay', compact('order','snapToken'));
    }
    public function orderan(Request $request){

        $orders = OrderTiket::with('tiket')->where('user_id', Auth::id())->get();
        $transaksi = OrderTiket::with("tiket")->select(["id","user_id","nama","tiket_id","jumlah","total","status","slug","created_at"])->firstOrFail();
        // Periksa status pembayaran dan waktu pembayaran
        if ($transaksi->status === 'Unpaid' && $transaksi->created_at->diffInHours(Carbon::now()) >= 24) {
            $tiket = Tiket::select(["kategori", "harga", "stok", "foto", "slug"])->firstOrFail();
            // Mengembalikan stok barang
            $tiket->stok += $transaksi->jumlah;
            $tiket->save();
        }
        return view('tiket.list-order-tiket', compact('orders'));
    }

    public function callback_status(Request $request){
        $serverKey = config('midtrans.server_Key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == "capture"){
                $order = OrderTiket::find($request->order_id);
                $order->update(['status' => 'Paid']);
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
            return response()->json(['status' => "Tiket Berhasil Di Hapus"]);
            }
        }
        else{
            return response()->json(['status' => "Login To continue"]);

        }
    }

}
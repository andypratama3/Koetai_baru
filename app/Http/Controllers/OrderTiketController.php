<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderTiket;
use App\Actions\OrderTiket\StoreOrderTiketAction;
use Illuminate\Http\RedirectResponse;


class OrderTiketController extends Controller
{
    public function index(){
        $tikets = Tiket::all();
        return view('tiket.order-tiket', compact('tikets'));
    }
    public function checkout(Request $request)
    {
        $nama = $request->input("nama");
        $tiket_id = $request->input("tiket_id");
        $jumlah = $request->input("jumlah");
        $tikets = Tiket::select(['kategori', 'harga', 'stok', 'foto', 'slug'])->first();
        $tiket = $tikets->find($tiket_id); // Retrieve the Tiket model by ID
        if (!$tiket) {
            return redirect()->route('tiket.index')->with('status','Tiket Tidak Di Temukan');
        }
        $total = $jumlah * $tiket->harga; // Access the `harga` property of the Tiket model
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_Key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
                'jumlah' => $jumlah,
            ),
            'customer_details' => array(
                'user_id' => Auth::id(),
                'name' => $nama,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('tiket.tiket-pay', compact('snapToken','nama','tiket_id','jumlah','total'));
    }
    public function payment_status(Request $request){
        $json = json_decode($request->get('json'));
        $order_tiket = new OrderTiket();
        $order_tiket->user_id = Auth::id();
        $order_tiket->tiket_id = $request->input('tiket_id');

        $order_tiket->nama = $request->input('nama');
        $order_tiket->email = Auth::user()->email;
        $order_tiket->jumlah = $request->input('jumlah');
        //from Json
        $order_tiket->order_id = $json->order_id;
        $order_tiket->status = $json->transaction_status;
        $order_tiket->transaction_id = $json->transaction_id;
        $order_tiket->payment_type = $json->payment_type;
        $order_tiket->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order_tiket->gross_amount = $json->gross_amount;
        $order_tiket->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order_tiket->save() ? redirect(url('/'))->with('status-success','Order Berhasil Di Buat') : redirect(url('/'))->with('status-failed','Order Gagal Terjadi Kesalahan');

    }
    public function order_tiket(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction){

        $storeOrderTiketAction->execute($request);
        return response()->json(['status'=>'Tiket Berhasil Di Pesan']);
    }
    public function orderan(Request $request){
        $orders = OrderTiket::with('tiket')->where('user_id', Auth::id())->get();
        return view('tiket.list-order-tiket', compact('orders'));
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

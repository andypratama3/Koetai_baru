<?php

namespace App\Http\Controllers\Api;

use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiOrderTiketController extends Controller
{
    public function payment_handler(Request $request){
        $json = json_decode($request->getContent());
        $orderTiket = OrderTiket::where('order_id', $json->order_id)->first();
        if(!$orderTiket){
            return abort(404);
        }

        if($json->transaction_status == 'settlement'){
            // Reduce stock if payment is successful
            $tiket = Tiket::find($orderTiket->tiket_id);
            $tiket->stok -= $orderTiket->jumlah;
            $tiket->save();
        }
        $orderTiket->update(['status' => $json->transaction_status]);




    }
}

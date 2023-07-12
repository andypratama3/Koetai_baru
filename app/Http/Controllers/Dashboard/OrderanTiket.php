<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\OrderTiket;
use App\Exports\OrderTiketExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Actions\OrderTiket\DeleteOrderanAction;

class OrderanTiket extends Controller
{
    public function index(){

        $limit = 15;
        $orderan = OrderTiket::select(['nama','user_id','tiket_id','email','jumlah','order_id','status','transaction_id','payment_type','payment_code','gross_amount','pdf_url'])->latest()->paginate($limit);
        $count = OrderTiket::all()->count();
        $no = $limit * ($orderan->currentPage() - 1);
        return view('dashboard.orderan_tiket.orderan', compact('orderan','no','count'));
    }
    public function show($order_id){

        $orderan = OrderTiket::where('order_id',$order_id)->select(['nama','user_id','tiket_id','email','jumlah','order_id','status','transaction_id','payment_type','payment_code','gross_amount','pdf_url'])->firstOrFail();


        return view('dashboard.orderan_tiket.show',compact('orderan'));
    }
    public function destroy($order_id, DeleteOrderanAction $deleteOrderanAction){

        $deleteOrderanAction->execute($order_id);
        return redirect()->route('dashboard.order.index')->with('success-delete','Orderan Berhasil Di Hapus!');
    }
    public function export(){

        return Excel::download(new OrderTiketExport, 'ordeTiket.xlsx');

    }
}

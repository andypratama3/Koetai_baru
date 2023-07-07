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
        $orderan = OrderTiket::select(['nama','tiket_id','jumlah','total','status','slug'])->latest()->paginate($limit);
        $count = OrderTiket::all()->count();
        $no = $limit * ($orderan->currentPage() - 1);
        return view('dashboard.orderan_tiket.orderan', compact('orderan','no','count'));
    }
    public function show($slug){

        $orderan = OrderTiket::where('slug',$slug)->select(['id','user_id','nama','tiket_id','jumlah','total','status','slug'])->firstOrFail();
        return view('dashboard.orderan_tiket.show',compact('orderan'));
    }
    public function destroy($slug, DeleteOrderanAction $deleteOrderanAction){

        $deleteOrderanAction->execute($slug);
        return redirect()->route('dashboard.order.index')->with('success-delete','Orderan Berhasil Di Hapus!');
    }
    public function export(){

        return Excel::download(new OrderTiketExport, 'ordeTiket.xlsx');

    }
}

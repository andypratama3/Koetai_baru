<?php

namespace App\Actions\OrderTiket;

use Str;

use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteOrderanAction
{
    public function execute($order_id)
    {
        $orderan = OrderTiket::where('order_id', $order_id)->firstOrFail();
        $orderan->delete();
    }
}

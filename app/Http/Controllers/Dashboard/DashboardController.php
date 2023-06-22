<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Talent;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $tikets = Tiket::count();
        $ordersTiket = OrderTiket::count();
        $Event = Event::count();
        $talent = Talent::count();
        return view('dashboard.index',compact('tikets','ordersTiket','Event','talent'));
    }
}

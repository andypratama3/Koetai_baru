<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        $crews = Anggota::select(['nama','foto','devisi','instagram','slug','deleted_at'])->get();
        return view('crew.index',compact('crews'));
    }
}

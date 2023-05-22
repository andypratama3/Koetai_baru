<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtoCart(Request $request)
    {
        
    }

    public function index()
    {
        return view('shop.cart');
    }

}

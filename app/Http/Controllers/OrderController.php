<?php

namespace App\Http\Controllers;

use App\Models\Order;
class OrderController
{
    public function index(){
        Order::saveOrder();
        return view('order');
    }
}

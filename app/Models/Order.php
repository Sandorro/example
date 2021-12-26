<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller;

class Order
{
    public static function saveOrder(){
        $cen = array();
        $tov = [];
        $ddd = date("d.m.Y");
        $userDB = auth()->user();
        $userDB = $userDB["name"];
        $cartDB =session('cart');
        foreach ($cartDB as $p) {
            settype($p["price"], "integer");
            array_push($cen, $p['price']);
            array_push($tov, $p['header']);
        }
        $tovDB = implode(' ', $tov);
        $cenDB = array_sum($cen);

        return Db::insert('INSERT INTO orders (user, data, tovars, price) values (?, ?, ?, ?)', [$userDB, $ddd, $tovDB, $cenDB]);
    }

    public static function getOrders(){
        $userDB = auth()->user();
        $results = DB::table('orders')->where('user', '=', $userDB['name'])->get();
//        $results = Order::select('tovars', 'price')->all();
        return $results;
    }
}

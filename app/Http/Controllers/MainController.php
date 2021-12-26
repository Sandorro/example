<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use App\Models\Sint;
use Illuminate\Database\Eloquent\Collection;

class MainController
{
    public function index(){
        $guitarCollection = Guitar::select('header', 'price', 'image')->paginate(20);
        $sintCollection = Sint::select('header', 'price', 'image')->paginate(20);
        $allCollection = new Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $guitarArr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $guitarArr[$i]['nom'] = $i+1;
            $guitarArr[$i]['header'] = $g->header;
            $guitarArr[$i]['price'] = $g->price;
            $guitarArr[$i]['categ'] = "guitars";
            $guitarArr[$i]['image'] = $g->image;
            $i = $i + 1;
        }
        $sintArr = [];
        $i = 0;
        foreach ($sintCollection as $g){
            $sintArr[$i]['nom'] = $i+1;
            $sintArr[$i]['header'] = $g->header;
            $sintArr[$i]['price'] = $g->price;
            $sintArr[$i]['image'] = $g->image;
            $sintArr[$i]['categ'] = "sints";
            $i = $i + 1;
        }

        $arr = array_merge($guitarArr, $sintArr);
        shuffle($arr);

//        dd($arr);
        return view('mainPage')->with(compact('arr'));
    }

    public function categories(){
        return view('categories');
    }

    public function product($product){
        var_dump($product);
        return view('product', ['product'=>$product]);
    }
}

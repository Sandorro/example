<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Good;
use App\Models\Guitar;
use App\Models\Sint;
use Illuminate\Http\Request;
use App\Console\Kernel;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $arr = array();
//        session(['cart' => $arr]);
        $arr = Session::get('cart');
//        dd($arr);

        return view('cart/cart', compact('arr'));
    }

    public function addToCart(Request $request){

        $arr = array();
        $arr['categ'] = $request->tabl;
        if ($request->tabl == "guitars") {
            $arr = Guitar::where('id', $request->id)->select('id', 'header', 'price', 'image')->get()->toArray();
        } elseif ($request->tabl == "sints") {
//           dd($id);
            $arr = Sint::where('id', $request->id)->select('id', 'header', 'price', 'image')->get()->toArray();
        }

//        $arr = $arr->only('header', 'price');
        $arr[0]['categ'] = $request->tabl;
//        $allSession = Session::get('cart');

//        dd($arr);
        $a = 0;
        $test = 0;

        if (!($request->session()->has('cart'))){
            $arr[0]['kolvo']=1;
            $arr[0]['dubler']=1;
            $test = 1;
        }
        else{
            $allSession = Session::get('cart');
            $arr[0]['kolvo']=count($allSession)+1;
            $arr[0]['dubler']=1;
            foreach ($allSession as &$p) {
                if ((($p['categ'] == $request->tabl) and ($p['id']==$request->id)))
                {
                    $p['dubler'] = $p['dubler'] +1;
                    $a = $a + 1;

                }
            }
            $test = 2;
        }
        //Если нет дублёров, то записываем в конец массива выбранный товар
        if ($a==0){
            session()->push('cart', $arr[0]);
        }
        //Если есть дублёр, то обновляем массив на массив с изменённым значением ключа "dubler"
        else{
            session()->forget(['cart']);
            session()->put('cart', $allSession);
        }
//        session()->forget(['cart']);
        return true;
    }

    public function deleteFromCart(Request $request){
        $id = $request->id;
//        dd('hello');
        $arr = Session::get('cart');
        $id = intval($id);

        foreach ($arr as $key => &$product) {
            if ($product['kolvo'] == $id){
                if ($product['dubler'] != 1){
                    $product['dubler'] = $product['dubler'] - 1;
                    session(["cart" => $arr]);
                }
                else {
                    unset($arr[$id - 1]);
                    session(["cart" => $arr]);
                }
            }
//        session()->forget(['cart']);
        }
        return back();
    }

    public function actionSchAjax(){

        $sch = 0;
        $arr = Session::get('cart');

        foreach ($arr as $p){
            $sch += $p['dubler'];
        }
        return $sch;
    }

    public function actionPrice(){
        $pr = 0;
        $arr = Session::get('cart');

        foreach($arr as $p) {
            $pr += ($p['price']*$p['dubler']);
        }
        return $pr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Guitar;
use App\Models\Sint;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $tabl)
    {
        if ($tabl == "guitars") {
        $opisanie = Guitar::where('id', $id)->get();
    } elseif ($tabl == "sints") {
//            dd($id);
        $opisanie = Sint::where('id', $id)->get();
    }
//        dd($opisanie);


        return view('good', compact('opisanie', 'id', 'tabl'));
    }

    public function clas($tabl)
    {
        $goodArr = new \Illuminate\Database\Eloquent\Collection();
        if ($tabl == "guitars") {
            $goodArr = Guitar::select('header', 'price')->paginate(20);
            $arr = [];
            $i = 0;
            foreach ($goodArr as $g) {
                $arr[$i]['header'] = $g->header;
                $arr[$i]['price'] = $g->price;
                $arr[$i]['image'] = $g->image;
                $arr[$i]['nom'] = $i+1;
                $arr[$i]['categ'] = "guitars";
                $i = $i + 1;
            }
        }
        if ($tabl == "sints") {
            $goodArr = Sint::select('header', 'price')->paginate(20);
            $arr = [];
            $i = 0;
            foreach ($goodArr as $g) {
                $arr[$i]['header'] = $g->header;
                $arr[$i]['price'] = $g->price;
                $arr[$i]['image'] = $g->image;
                $arr[$i]['nom'] = $i+1;
                $arr[$i]['categ'] = "sints";
                $i = $i + 1;
            }
        }
//        if ($tabl == "sints") {
//            $goodArr = Sint::select('header', 'price')->paginate(20);
//        }

        shuffle($arr);
        return view('clas', compact('arr'));

//        $sortirovka = Good::classification($tabl);
//        dd($sortirovka);
    }

    public function getListOver(Request $request)
    {
        var_dump($request->dor);
        $cen = $request->input('dor');
        $cen = intval($cen);
//        dd($cen);
        $guitarCollection = Guitar::select('header', 'price')->where('price', '>', $cen)->paginate(20);
        $sintCollection = Sint::select('header', 'price')->where('price', '>', $cen)->paginate(20);
        $allCollection = new \Illuminate\Database\Eloquent\Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $guitarArr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $guitarArr[$i]['nom'] = $i+1;
            $guitarArr[$i]['header'] = $g->header;
            $guitarArr[$i]['price'] = $g->price;
            $guitarArr[$i]['categ'] = "guitars";
            $i = $i + 1;
        }
        $sintArr = [];
        $i = 0;
        foreach ($sintCollection as $g){
            $sintArr[$i]['nom'] = $i+1;
            $sintArr[$i]['header'] = $g->header;
            $sintArr[$i]['price'] = $g->price;
            $sintArr[$i]['categ'] = "sints";
            $i = $i + 1;
        }

        $arr = array_merge($guitarArr, $sintArr);
        shuffle($arr);
        return view('doroge', compact('arr'));
    }

    public function getListLess(Request $request)
    {
        var_dump($request->desh);
        $cen = $request->input('desh');
        $cen = intval($cen);
//        dd($cen);
        $guitarCollection = Guitar::select('header', 'price')->where('price', '<', $cen)->paginate(20);
        $sintCollection = Sint::select('header', 'price')->where('price', '<', $cen)->paginate(20);
        $allCollection = new \Illuminate\Database\Eloquent\Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $guitarArr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $guitarArr[$i]['nom'] = $i+1;
            $guitarArr[$i]['header'] = $g->header;
            $guitarArr[$i]['price'] = $g->price;
            $guitarArr[$i]['categ'] = "guitars";
            $i = $i + 1;
        }
        $sintArr = [];
        $i = 0;
        foreach ($sintCollection as $g){
            $sintArr[$i]['nom'] = $i+1;
            $sintArr[$i]['header'] = $g->header;
            $sintArr[$i]['price'] = $g->price;
            $sintArr[$i]['categ'] = "sints";
            $i = $i + 1;
        }

        $arr = array_merge($guitarArr, $sintArr);
        shuffle($arr);
        return view('doroge', compact('arr'));
    }

    public function clean(){
        return view('mainPage');
    }
}
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Good  $good
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Good $good)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Good  $good
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Good $good)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Good  $good
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Good $good)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Good  $good
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Good $good)
//    {
//        //
//    }
//}

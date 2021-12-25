<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use App\Models\Sint;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GuitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('Вы попали в index');
        $guitarCollection = Guitar::select('header', 'price')->paginate(20);
        $sintCollection = Sint::select('header', 'price')->paginate(20);
        $allCollection = new Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $arr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $arr[$i]['id'] = $g->id;
            $arr[$i]['header'] = $g->header;
            $arr[$i]['price'] = $g->price;
            $i = $i + 1;
        }
        foreach ($sintCollection as $g){
            $arr[$i]['id'] = $g->id;
            $arr[$i]['header'] = $g->header;
            $arr[$i]['price'] = $g->price;
            $i = $i + 1;
        }
//        dd($arr);
//        $allCollection = $allCollection->shuffle();
        return view('guitar/index', compact('arr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('Вы попали в create');
        return view('guitar/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Вы попали в store');
        return view('guitar/store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function show(Guitar $guitar)
    {
        dd('Вы попали в show');
        return view('guitar/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    {
        dd('Вы попали в edit');
        return view('guitar/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guitar $guitar)
    {
        dd('Вы попали в update');
        return view('guitar/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guitar  $guitar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guitar $guitar)
    {
        dd('Вы попали в destroy');
        return view('guitar/destroy');
    }
}

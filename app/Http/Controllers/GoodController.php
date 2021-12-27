<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Guitar;
use App\Models\Category;
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
        $opisanie = Guitar::where('id', $id)->get()->toArray();
    } elseif ($tabl == "sints") {
        $opisanie = Sint::where('id', $id)->get()->toArray();
    }


        return view('good', compact('opisanie', 'id', 'tabl'));
    }

    public function clas($tabl)
    {
        $goodArr = new \Illuminate\Database\Eloquent\Collection();
        $cat = Category::select('cat')->where('tabl', '=', $tabl)->first();
        if ($tabl == "guitars") {
            $goodArr = Guitar::select('header', 'price', 'image')->paginate(20);
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
            $goodArr = Sint::select('header', 'price', 'image')->paginate(20);
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

        shuffle($arr);
        return view('clas', compact('arr', 'cat'));

    }

    public function getListOver(Request $request)
    {
        $cen = $request->input('dor');
        $cen = intval($cen);
//        dd($cen);
        $guitarCollection = Guitar::select('header', 'price', 'image')->where('price', '>', $cen)->paginate(20);
        $sintCollection = Sint::select('header', 'price', 'image')->where('price', '>', $cen)->paginate(20);
        $allCollection = new \Illuminate\Database\Eloquent\Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $guitarArr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $guitarArr[$i]['nom'] = $i+1;
            $guitarArr[$i]['header'] = $g->header;
            $guitarArr[$i]['price'] = $g->price;
            $guitarArr[$i]['image'] = $g->image;
            $guitarArr[$i]['categ'] = "guitars";
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
        $moreOrLess = "Дороже";
        return view('doroge', compact('arr', 'moreOrLess'));
    }

    public function getListLess(Request $request)
    {
        $cen = $request->input('desh');
        $cen = intval($cen);
//        dd($cen);
        $guitarCollection = Guitar::select('header', 'price', 'image')->where('price', '<', $cen)->paginate(20);
        $sintCollection = Sint::select('header', 'price', 'image')->where('price', '<', $cen)->paginate(20);
        $allCollection = new \Illuminate\Database\Eloquent\Collection;
        $everything = $allCollection->merge($guitarCollection)->merge($sintCollection);
//        $arr = $guitarCollection->toArray();
        $guitarArr = [];
        $i = 0;
        foreach ($guitarCollection as $g){
            $guitarArr[$i]['nom'] = $i+1;
            $guitarArr[$i]['header'] = $g->header;
            $guitarArr[$i]['price'] = $g->price;
            $guitarArr[$i]['image'] = $g->image;
            $guitarArr[$i]['categ'] = "guitars";
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
        $moreOrLess = "Дешевле";
        return view('doroge', compact('arr', 'moreOrLess'));
    }

}


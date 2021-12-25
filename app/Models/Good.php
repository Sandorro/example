<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

//require 'Db.php';


class Good extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function getProductById($tabl, $id){
        $db = DB::connection();


//        $result = $db->prepare ('SELECT * FROM products WHERE id = :id');
//        $result ->bindParam('id', $id, PDO::PARAM_INT);
//
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//        $result->execute();
//        $product = $result->fetch();
//
//        $kolichestvo = array("kolvo" => "1");
//        $dubl = array("dubler" => "1");
//        $product = array_merge($product, $kolichestvo);
//        $product = array_merge($product, $dubl);
//        $product['category'] = intval($product['category']);
//        $product['kolvo'] = intval($product['kolvo']);
//        $product['dubler'] = intval($product['dubler']);
//        $product['id'] = intval($product['id']);
//
//        $result = $db->prepare ('SELECT cat FROM categories WHERE id = :num');
//        $result ->bindParam('num', $product['category'], PDO::PARAM_INT);
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//        $result->execute();
//        $categ = $result->fetch();
//
//
//        $product['category'] = $categ['cat'];

        if ($tabl=='guitars') {
            $sql = 'SELECT * FROM guitars WHERE id = :id';
        }
        else {
            $sql = 'SELECT * FROM sints WHERE id = :id';
        }


//        $i = 0;
//        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//            $product[$i] = $row;
//            $i++;
//        }
        $result = $db->prepare($sql);
//        $result->bindParam('tabl', $tabl, PDO::PARAM_STR);
        $result->bindParam('id', $id, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function classification($tabl){
        $db = DB::connection();

        $result = $db->query("SELECT * FROM {$tabl}");
        $sortirovka = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $sortirovka[$i]['id'] = $row['id'];
            $sortirovka[$i]['header'] = $row['header'];
            $sortirovka[$i]['price'] = $row['price'];
            $sortirovka[$i]['image'] = $row['image'];
            $sortirovka[$i]['categ'] = $tabl;
            $i++;
        }
        return $sortirovka;
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}

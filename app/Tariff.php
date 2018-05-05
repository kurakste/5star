<?php

/**
 * This is Tariff class file.  
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * This is Tariff class file.  
 */
class Tariff extends Model
{
    /**
     * It returns the brackpoints. It's a count of objects that user has
     * when the daily payment will be changed.   
     *
     * @return integer
     */
    /* static public function GetTariffBrackPoints() */ 
    /* { */
    /*     // Возвращает брекпоинты с которых меняются тарифы. */ 
    /*     $out = DB::table('tariffs')->select('max_object')->get(); */  
    /*     return $out; */
    /* } */

    /* static public function GetTariffsAsArray() */ 
    /* { */
    /*     // Возвращает брекпоинты с которых меняются тарифы. */ 
    /*     $out = DB::table('tariffs')->select('max_object', 'sum') */
    /*                     ->orderBy('max_object','asc')->get(); */  
    /*     $out = $out->toArray(); */
    /*     return $out; */
    /* } */
}

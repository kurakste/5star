<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tariff extends Model
{
    //
    static public function GetTariffBrackPoints () {
        // Возвращает брекпоинты с которых меняются тарифы. 
        $out = DB::table('tariffs')->select('max_object')->get();  
        return $out;
    }

    static public function GetTariffsAsArray () {
        // Возвращает брекпоинты с которых меняются тарифы. 
        $out = DB::table('tariffs')->select('max_object', 'sum')
                        ->orderBy('max_object','asc')->get();  
        $out = $out->toArray();
        return $out;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tariff;

class TariffController extends Controller
{
    //
    public function showTariffs() {
        $tariffs = Tariff::all();
        //dd($tariffs);
        return view('tariffs',['tariffs'=>$tariffs]);
    }
}

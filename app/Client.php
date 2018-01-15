<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function objects() {
        return $this->hasMany('App\Object');

    }
    public function balance() {
        $sum=Bill::where('client_id',$this->id)->sum('sum');
        return $sum;
    }
    //
}

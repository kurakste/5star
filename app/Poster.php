<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Pformat;

class Poster extends Model
{
    //
    public $timestamps = false;

    public function formats () {
    
    return $this->hasMany('App\Pformat');
    }

}

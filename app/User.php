<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Bill;


class User extends Model implements Authenticatable
{
    protected $fillable =['name','email', 'password'];
    use AuthenticableTrait;

    public function objects() {
    return $this->hasMany('App\Object');

}
    public function balance() {
        $sum=Bill::where('user_id',$this->id)->sum('sum');
        return $sum;
    }
    //
}

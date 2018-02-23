<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Bill;
use App\Feedback;
use App\Object;


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

    public function settings ()
    {
        return $this->hasOne('App\Usersetting');

    }
    
    public function allFB(){

        return $this->hasManyThrough('App\Feedback', 'App\Object');
    }
    //
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Bill;
use App\Feedback;
use App\Object;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends Model implements Authenticatable, CanResetPasswordContract
{
    protected $fillable =['name','email', 'password'];
    use AuthenticableTrait;
    use CanResetPassword;
    use Notifiable;

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

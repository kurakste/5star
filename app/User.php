<?php
/**
 * File with User class
 *
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use App\Bill;
use App\Feedback;
use App\Oobject;


/**
 * User class
 *
 */
class User extends Model implements Authenticatable, CanResetPasswordContract
{
    protected $fillable =['name','email', 'password'];
    use AuthenticableTrait;
    use CanResetPassword;
    use Notifiable;

    /**
     * Function returns all objects for this user. 
     *
     * @return App\Oobject
     */
    public function objects() 
    {
        return $this->hasMany('App\Oobject');
    }

    /**
     * Function returns current balance. 
     *
     * @return float
     */
    public function balance() 
    {
        $sum=Bill::where('user_id', $this->id)->sum('sum');
        return $sum;
    }

    /**
     * Function returns settings for current user.
     *
     * @return App\Ussersetting
     */
    public function settings()
    {
        return $this->hasOne('App\Usersetting');

    }
    
    /**
     * Function returns all feedbacks for this user. 
     *
     * @return App\Ussersetting
     */
    public function allFB()
    {
        return $this->hasManyThrough('App\Feedback', 'App\Oobject');
    }
    //
}

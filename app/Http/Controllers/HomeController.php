<?php
/**
 * Class of HomeController
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usersetting;
use App\User;

/**
 * Class of HomeController
 *
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return view home 
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return view home 
     */
    public function getHomeScreen()
    {
        $user = Auth::user();

        if (session('user_id') == null) {
            session(['user_id' => $user->id]);
        }

        return view('main', ['user' => $user]);

    }

    /**
     * Show user information.
     *
     * @return view info 
     */
    public function getInfo(Request $request)
    {
        $user = Auth::user();

        return view('info', ['user' => $user]);
    }



    /**
     * Function for different testings. 
     *
     * @return view info 
     */
    public function test() 
    {
    }

}

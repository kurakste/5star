<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usersetting;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $secret = 'mhfVcZ3uvkZ0rtXWyP59v+zj';


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getHomeScreen()
    {
        $user = Auth::user();

        if (session('user_id') == null) {
            session(['user_id' => $user->id]);
        }

        //dd($user->balance());

        return view('main', ['user' => $user]);

    }

    public function getInfo(Request $request)
    {
        $user = Auth::user();

        return view('info', ['user' => $user]);
    }
    
    private function checkSecretString(Array $data) {
        $str = $data['notification_type'].'&'.$data['operation_id'].'&'.
            $data['amount'].'&'.$data['currency'].'&'.$data['datetime'].'&'.
            $data['sender'].'&'.$data['codepro'].'&'.$this->secret.'&'.$data['label'];
        return ($data['sha1_hash'] == sha1($str));
    }

        public function test() 
        {
        
        /* $weeklyusers = Usersetting::where('send_daily_report', 1)->get(); */
        /* /1* dd($weeklyusers); *1/ */
        /* $actusr=[]; */
        /* foreach ($weeklyusers as $wuser) { */
        /*     $tmp = User::find($wuser->user_id)->first(); */
        /*     if ($tmp->active) { */
        /*         $actusr[]=$tmp; */
        /*     } */
        /* } */
        /* dd($actusr); */
        
    }

    private function getWeeklyRepport (User $user) {
    
    }
}

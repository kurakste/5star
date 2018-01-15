<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard () {
        $user = Auth::user();

        if (session('user_id')==null) {
            session(['user_id'=>$user->id]);}

            //dd($user->balance());

            return view ('main',['user'=>$user]);

    }
}

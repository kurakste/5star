<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usersetting;

class SettingController extends Controller
{
    public function getSettings(Request $request) 
    {
        $user_id = $request->session()->get('user_id');
        $user = User::where('id', $user_id)->firstorFail();
        //dd($user->settings['send_each_fb']);
        return view('getsetting', ['user'=>$user]);
    }

    public function storeSettings(Request $request) 
    {
        $user_id = $request->session()->get('user_id');
        $user = User::where('id', $user_id)->firstorFail();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email =$request->input('email');
        $user->city =$request->input('city');
        $settings = Usersetting::where('user_id', $user_id)->firstorfail();

        $settings->send_each_fb = (!empty(
            $request->input('send_each_fb')
        )) ? 1 : 0;
        $settings->send_daily_report= (!empty(
            $request->input('send_daily_report')
        )) ? 1 : 0;
        $settings->send_weekly_report = (!empty(
            $request->input('send_weekly_report')
        )) ? 1: 0;
        $user->save();
        $settings->save();
        return redirect("/home");
    }
}

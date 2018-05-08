<?php
/**
 *
 * @package Rdefault
 * @author Kurakste <kurakste@gmail.com>
 * @copyright Kurakste, 08 мая, 2018
 * @version $Id$
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;
use Carbon\Carbon;
use Auth;

class BillController extends Controller
{
    /**
     * The function gets view where user will recharge balance.
     * The bill will be changed when bank's server system hint the webhook  
     * '/proof 
     *  
     * @param Request $request We get user id there.
     *
     * @return view rechargeTheBalancw
     */ 
    public function rechargeTheBalance(Request $request) 
    {
        $user_id = Auth::user()->id;
        return view('rechargethebalance', ['user_id'=>$user_id]);
    }

    public function checkPositiveBalance($user_id) 
    {
        //Проверяем баланс клиента. Если баланс меньше 0 то переводим 
        //
        $user_ = User::find($user_id);
        if ($user_->balance()>0) {
            $user_->active = true;
            $user_->save();
        }
    }

    public function billDetails(Request $request) 
    {
        if ($request->input('startDate') && ($request->input('endDate'))) {
            $endDate = $request->input('endDate'); 
            $startDate = $request->input('startDate');
        } else {
            $endDate = Carbon::now()->format('Y-m-d'); 
            $startDate = Carbon::now()->addMonth(-2)->format('Y-m-d');
        } 

        $user_id = Auth::user()->id;
        $incomingBallance = Bill::where('user_id', $user_id)
            ->where('created_at', '<', $startDate)
            ->sum('sum');

        $bills= Bill::where('user_id', $user_id)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->orderByRaw('created_at')->get();
        
        $arrBills = $bills->toArray();
        array_unshift(
            $arrBills, [
                'created_at'=>'','updated_at'=>'',
                'user_id'=>$user_id, 
                'sum'=>$incomingBallance,
                'type'=>'incoming', 
                'comment'=>'Переходяший баланс с прошлого периода.' 
            ]
        );
        return view(
            'billdetails', [
                'bills' => $arrBills,
                'startDate'=>$startDate,
                'endDate'=>$endDate
            ]
        );  
    }
}

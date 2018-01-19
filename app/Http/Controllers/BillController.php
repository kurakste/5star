<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;

class BillController extends Controller
{
    //
    public function rechargeTheBalance(Request $request) {
        $user_id=session('user_id');

       return view ('rechargethebalance',['user_id'=>$user_id]);
    }

    public function checkPositiveBalance($user_id) {
        //Проверяем баланс клиента. Если баланс меньше 0 то переводим 
        //
        $user_ = User::find($user_id);
        if ($user_->balance()>0) {
            $user_->active = true;
            $user_->save();
            }
    }

    public function store(Request $request) {
        //!! Здесь сначало должна идти проверка поступления денег
        //за тем пополнение баланса.
        // object_id в этой таблице не испрользуется!!!

        $validateDate = $request->validate([
           'sum'=>'integer|min:0|max:10000'
        ]);
        $user_id=$request->session()->get('user_id');

        $bill= new Bill;
        $bill->type = 'recharge';
        $bill->sum = $request->input('sum');
        $bill->user_id = $user_id;
        $bill->comment='Пополнение счета клиентом.';
        $bill->save(); 
        //теперь нужно проверить баланc и выставить флаг актив в true
        //если баланс больше нуля.
        $this->checkPositiveBalance($user_id);
        
        return redirect("/home");
    }

    public function billDetails (Request $request) {

        $user_id = $request->session()->get('user_id');
        $bills= Bill::where('user_id',$user_id)->get();
        return view ('billdetails', ['bills' => $bills]);  
    }

}

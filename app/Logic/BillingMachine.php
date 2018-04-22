<?php namespace Logic;
use BD;
use App\Bill;
use App\User;
use App\Tariff;
use Illuminate\Support\Facades\Log;
use App\Events\BalanceLessThanCriticalLevel;
use App\Events\BalanceZeroLevel;

class BillingMachine {

    private $MIN_DAY_FOR_ALLERT = 7;

    public function GetClientsTariff($user_id) 
    {
        //Получаем отсортированный по убыванию максимального кол-ва объектов 
        //массив. Сортировка позволит быстрей определить тариф. 
        $Tariffs = new Tariff;
        $arrayWithTariffs = $Tariffs->getTariffsAsArray();
        $client = User::find($user_id); //  создаем экземпляр клиента.
        $countOfObject = count($client->objects); // Получаем кол-во объектов.
        foreach ($arrayWithTariffs as $tariff) {
            if ($countOfObject <= $tariff->max_object) 
            {
                $out=$tariff->sum;
                break;
            }
        }
        //  Если кол-во больше всех максимальных значение занчит нужно взять последний элемент массива(максимальное значение и тарифицировать по нему).  
        $max_tariff = array_pop($arrayWithTariffs);
        if ($countOfObject > $max_tariff->max_object) 
        {
            $out = $max_tariff->sum;
        };
        return $out;
    }

    public function MakeBill($user_id, $mounth_tariff) {
        // Функция принимает id клиента и его месячные тариф
        // после чего расчитывает дневной тариф и добовляет запись 
        // о снятии денег в таблицу bills
        $bill = new Bill;
        $bill->user_id = $user_id;
        $bill->type = 'billing';
        $bill->sum = - 12 * $mounth_tariff / 365;
        $bill->comment = 'auto billing';
        $bill->save(); 
        $user = User::find($user_id); // We will send it into handler.
        //Если баланс еще положительный нужно проверить не снизился ли баланс ниже чем цифра MIN_DAY_FOR_ALLERT *
        // * (mounth_tariif/365) 
        if ($user->balance() > 0) {
            if (($user->balance()/(12*$mounth_tariff/365)) <= $this->MIN_DAY_FOR_ALLERT) {
                // Здесь нужно выбросить событие - баланс ниже критического уровня
                event(new BalanceLessThanCriticalLevel($user, $mounth_tariff));
            }
        }

    }

    public function checkNegativeBalance($user_id) {
        //Проверяем баланс клиента. Если баланс меньше 0 то переводим 
        //
        $client = User::find($user_id);
        if ($client->balance()<0) {
            $client->active = false;
            $client->save();
            event(new BalanceZeroLevel($client)); // Fire low balace event
            }
    }

    public function MakeBilling () {
        //Функция фильтрует всех актиыных клинетов. 
        $clients = User::where('active', true)->get();
        foreach ($clients as $client) {

            $this->MakeBill($client->id,$this->GetClientsTariff($client->id));
            $this->checkNegativeBalance($client->id);
        }
    }

}

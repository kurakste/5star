<?php namespace Logic;
use BD;
use App\Bill;
use App\Client;
use App\Tariff;

class BillingMachine {

    public function GetClientsTariff($client_id) {
        //Функця принимает id клиента и возвращает id тарифа по следующей логике:
        //Если на клиение 1-3 объктов то мы применяем тариф №1 из таблицы tariffs
        //3-10 - применяем тариф №2, если больще 10-ти тариф №3
        //Функция вернет сумму в рублях которую нужно удержать за день

        //Получаем отсортированный по убыванию максимального кол-ва объектов 
        //массив. Сортировка позволит быстрей определить тариф. 
        $arrayWithTariffs = Tariff::GetTariffsAsArray();
        $client = Client::find($client_id); //  создаем экземпляр клиента.
        $countOfObject = count($client->objects); // Получаем кол-во объектов.
        foreach ($arrayWithTariffs as $tariff) {
            if ($countOfObject <= $tariff->max_object) {
                $out=$tariff->sum;
                break;
                }   
        }
        return $out;
    }

    public function MakeBill($client_id, $mounth_tariff) {
        // Функция принемает id клиента и его месячные тариф
        // после чего расчитывает дневной тариф и добовляет запись 
        // о снятии денег в таблицу bills
        $bill = new Bill;
        $bill->client_id = $client_id;
        $bill->type = 'billing';
        $bill->sum = -12 * $mounth_tariff / 365;
        $bill->comment = 'auto billing';
        $bill->save(); 
    }

    public function checkNegativeBalance($client_id) {
        //Проверяем баланс клиента. Если баланс меньше 0 то переводим 
        //
        $client = Client::find($client_id);
        if ($client->balance()<0) {
            $client->active = false;
            $client->save();
            }
    }

    public function MakeBilling () {
        //Функция фильтрует всех актиыных клинетов. 
        $clients = Client::where('active', true)->get();
        foreach ($clients as $client) {

            $this->MakeBill($client->id,$this->GetClientsTariff($client->id));
            $this->checkNegativeBalance($client->id);

        }

    }

}

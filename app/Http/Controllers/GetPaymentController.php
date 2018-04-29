<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMoneyIncome;
use Log;

class GetPaymentController extends Controller
{
    //
    private $secret ='cjYlQQNm7++dM31KLLZrPC7K';

    private function checkSecretString(Array $data) {
        // This will check is the signature valid or not. 
        // Return boolean.

        $str = $data['notification_type'].'&'.$data['operation_id'].'&'.
            $data['amount'].'&'.$data['currency'].'&'.$data['datetime'].'&'.
            $data['sender'].'&'.$data['codepro'].'&'.$this->secret.'&'.$data['label'];
        $out = ($data['sha1_hash'] == sha1($str));
        
         if ($out) {
             Log::info('The secret string is correct.');
         } else {
             Log::info('The secret string is not correct.');
         }

        return $out; 
    }

    private function validIncomingData($data) {
        // This will check has input array all required data or not.
        // Return boolean.
         $requierd_keys = ['notification_type', 'operation_id', 'amount', 'currency', 'datetime',
             'sender', 'codepro', 'label'];
         $out = true; //you are innocent until proven guilty 
         foreach ($requierd_keys as $requierd_key) {
             $out = $out && array_key_exists($requierd_key, $data);
         } 

         if ($out) {
             Log::info('The data structure is correct.');
         } else {
             Log::info('The data structure is not correct.');
         }

         return $out;
    }

    public function getIncomingPayment (Request $request) {
        // This will get feedback from payment system and if all is ok,
        // make all necessary records in database and fire required event.

        $data = $request->all();
        
        Log::info ($request->all());
        Log::info ('hi!');

         if (!$this->validIncomingData($data)) { 
             return 'Bad request. <br>';
         } 

        if (!$this->checkSecretString($data)){
            Log::info('Payment access denied due to incorrect hash.');
            Log::info($request);
            Log::info('--------------------------------------------');
            return 'Bad secret string';
        }

        event (new NewMoneyIncome($data));

        return 'ok<br>';

    }
}

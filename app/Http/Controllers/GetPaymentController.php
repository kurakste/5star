<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class GetPaymentController extends Controller
{
    //
    private $secret = 'mhfVcZ3uvkZ0rtXWyP59v+zj';

    private function checkSecretString(Array $data) {
        // This will check is the signature valid or not. 
        // Return bool.

        $str = $data['notification_type'].'&'.$data['operation_id'].'&'.
            $data['amount'].'&'.$data['currency'].'&'.$data['datetime'].'&'.
            $data['sender'].'&'.$data['codepro'].'&'.$this->secret.'&'.$data['label'];

        return ($data['sha1_hash'] == sha1($str));
    }

    private function validIncomingData($data) {
        // This will check has input array all requierd data or not.
        // Return bool.
    
         $requierd_keys = ['notification_type', 'operation_id', 'amount', 'currency', 'datetime',
             'sender', 'codepro', 'label'];
         $out = true;
         foreach ($requierd_keys as $requierd_key) {
             $out = $out && array_key_exists($requierd_key, $data);
         } 

         return $out;
    }

    public function getIncomingPayment (Request $request) {
        // This will get feedback from payment system and if all is ok,
        // make all necessary records in database and fire requierd event.

        $data = $request->all();
        
        Log::info ($request->fullUrl());

         if (!$this->validIncomingData($data)) { 

             return 'Bad request. <br>';
         } 

        if (!$this->checkSecretString($data)){
            Log::info('Payment access denied due to incorect hash.');
            Log::info($request);
            Log::info('--------------------------------------------');
            return '';
        }
        return 'ok<br>';

    }
}

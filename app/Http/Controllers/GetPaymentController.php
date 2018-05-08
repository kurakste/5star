<?php

/**
 * Class CtePaymentController
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMoneyIncome;
use Log;

/**
 * Class CtePaymentController
 *
 */
class GetPaymentController extends Controller
{
    /**
     * This method checks incoming data with secret string
     *
     * @return boolean
     */
    private function _checkSecretString(Array $data)
    {
        // This will check is the signature valid or not. 
        // Return boolean.
        $secret = env('BANK_SEC_KEY', '');
        $str = $data['notification_type'].'&'.$data['operation_id'].'&'.
            $data['amount'].'&'.$data['currency'].'&'.$data['datetime'].'&'.
            $data['sender'].'&'.$data['codepro'].'&'.$secret.'&'.$data['label'];
        $out = ($data['sha1_hash'] == sha1($str));
        
        if ($out) {
             Log::info('The secret string is correct.');
        } else {
             Log::info('The secret string is not correct.');
        }

        return $out; 
    }

    /**
     * This method validate is all necessary data was sent or not. 
     *
     * @return boolean
     */
    private function _validIncomingData($data) 
    {
        // This will check has input array all required data or not.
        // Return boolean.
        $requierd_keys = [
            'notification_type', 
            'operation_id', 
            'amount', 
            'currency', 
            'datetime',
            'sender', 
            'codepro', 
            'label'
        ];
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

    /**
     * This will get feedback from payment system and if all is ok,
     * make all necessary records in database and fire required event.
     *
     * @return ok, just god http response for bank service
     */
    public function getIncomingPayment(Request $request) 
    {
        $data = $request->all();
        
        if (!$this->_validIncomingData($data)) { 
             return 'Bad request. <br>';
        } 

        if (!$this->_checkSecretString($data)) {
            Log::info('Payment access denied due to incorrect hash.');
            Log::info($request);
            Log::info('--------------------------------------------');
            return 'Bad secret string';
        }

        event(new NewMoneyIncome($data));

        return 'ok<br>';
    }
}

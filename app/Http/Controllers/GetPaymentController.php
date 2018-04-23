<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class GetPaymentController extends Controller
{
    //
    public function getIncomingPayment (Request $request) {

        Log::info('incoming..');
        Log::info ($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitController extends Controller
{
    //
    function pull () {
      $output = `cd /var/www/html/5star/5satr | git pull`;

      return $output;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public function create () {
    
        return view('createclient');
    }
    

    public function store(Request $request) {
        $client = new Client;
        $client->vender_id = $request->input('vender_id');
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->city = $request->input('city');
        //$client->pincod = $request->input('pin');
        $client->ballance = 0;
        $client->save(); 
    }
    public function getinfo ($id) {

        return view('main',['out'=>$out,]);
    }

    public function getClient ($id, Request $request)
    {

        if (session('user_id')==null) {
            session('user_id'=>'';
        }

        return redirect('/main');
    }

     public function main(Request $request) {
        $client_id = $request->session()->get('user_id');
        $client = Client::where('id',$client_id)->firstorFail();

        $out['id']=$client_id;
        $out['Name']=$client->name;
        $out['City']=$client->city;
        $out['Phone']=$client->phone;
        $out['Ballance']=$client->balance();
        $out['Objects']=$client->objects;
        $out['OCount']=count($out['Objects']);
        return view('main',['out'=>$out,]);
    }

}


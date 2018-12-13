<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ShowClientController extends Controller
{
    //

    public function index(){


        $client = Client::all();

        return view('pages.all_client')->withClients($client);

    }
}

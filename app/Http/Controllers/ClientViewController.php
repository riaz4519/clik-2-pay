<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class ClientViewController extends Controller
{
    //

    public function index($url_short){

        $invoice = Invoice::where('url_short',$url_short)->first();



        return view('pages.client_view_page')->with(['invoice'=>$invoice]);

    }

}

<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class CreateClientController extends Controller
{
    //

    public function index(){

        return view('pages.create_client');
    }

    public function create(Request $request){



        $this->validate($request,[

            'first_name' => 'required',
            'last_name'  => 'string',
            'email'      => 'required',
            'phone'      => 'required',
            'city'       => 'required',
            'post_code'  => 'required',
            'company'    => 'required',
            'address1'   => 'required',

        ]);

        $input = $request->all();

        Client::create($input);

        \Session::flash('message','Success');

        return redirect()->back();



    }

}

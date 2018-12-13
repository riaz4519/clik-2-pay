<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index(){


        return view('pages.show_all_invoice');

    }

    public function create(){

        $user_by_role = Role::all()->where('name','!=','admin')->where('name','!=','accountant');





        return view('pages.create_invoice')->withRoles($user_by_role);

    }


}

<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


public function __construct()
{
    $this->middleware('auth');
}

    public function index(){

        /*when working for real add auth->id*/

        $invoices_last_five_due = Status::find(1)->invoices;

        return view('pages.admin_home')->with(['invoices'=>$invoices_last_five_due]);

    }

}

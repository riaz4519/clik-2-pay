<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


public function __construct()
{
    $this->middleware('admin');
}

    public function index(){

        /*when working for real add auth->id*/

        $invoice = Invoice::all();

        $generate_today = Invoice::whereDate('created_at',Carbon::today())->count();

        $invoices_last_five_due = Status::find(1)->invoices;

        return view('pages.admin_home')->with(['invoices'=>$invoices_last_five_due,'invoice'=>$invoice,'generated_today'=>$generate_today]);

    }

}

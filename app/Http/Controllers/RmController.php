<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RmController extends Controller
{
    //

    public function index(){


        //$todays_income = Invoice::whereDate('updated_at',Carbon::today())->where('user_id',Auth::user()->id)->where('status_id',2)->sum('amount');

        $invoice = Invoice::where('user_id',Auth::user()->id);

        $generate_today = Invoice::where('user_id',Auth::user()->id)->whereDate('created_at',Carbon::today())->count();



        return view('pages.rm_home')->with(['invoice'=>$invoice,'generated_today'=>$generate_today]);

    }


}

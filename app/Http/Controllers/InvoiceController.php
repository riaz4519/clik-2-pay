<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\Role;
use App\Status;
use Illuminate\Contracts\Session\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    //

    public function index(){

        $use_role = Auth::user()->role->name;

        if ($use_role == 'admin' || $use_role == 'accountant'){

            $invoices = Invoice::all();

        }else{

            $invoices = User::find(Auth::user()->id)->invoices;


        }


        return view('pages.show_all_invoice')->with(['invoices'=>$invoices]);

    }

    public function create($client_id){

        $user_by_role = Role::all()->where('name','!=','admin')->where('name','!=','accountant');


        $client = Client::find($client_id);



        return view('pages.create_invoice')->with(['roles'=>$user_by_role,'client' =>$client]);
    }
    public function store(Request $request,$client_id){

        $this->validate($request,

            [
                'user_id' => 'required',
                'invoice_for' => 'required',
                'amount'    => 'required'
            ]
            );



            $url_short = substr(md5($client_id.$request->get('user_id').time()),'10','10');

            $insert =
                [
                  'client_id' =>$client_id,
                    'user_id' =>$request->get('user_id'),
                    'status_id'  =>1,
                    'invoice_for' => $request->get('invoice_for'),
                    'amount'    => $request->get('amount'),
                    'url_short' =>$url_short,
                ];

            $invoice = new Invoice();

            $invoice->create($insert);
        \Session::flash('message','Success');

        return redirect()->back();


    }

    public function pending(){




        $use_role = Auth::user()->role->name;

        if ($use_role == 'admin' || $use_role == 'accountant'){

            $pending_invoice = Status::find(1)->invoices;

        }else{

            $pending_invoice = User::find(Auth::user()->id)->invoices->where('status_id',1);


        }


        return view('pages.pending_invoice')->with(['invoices'=>$pending_invoice]);

    }


    public function paid(){

        $use_role = Auth::user()->role->name;

        if ($use_role == 'admin' || $use_role == 'accountant'){
            $paid_invoice = Status::find(2)->invoices;
        }else{

            $paid_invoice = User::find(Auth::user()->id)->invoices->where('status_id',2);


        }

        return view('pages.pending_invoice')->with(['invoices'=>$paid_invoice]);

    }

    public function edit($invoice_id){


        $user_by_role = Role::all()->where('name','!=','admin')->where('name','!=','accountant');

        $invoice = Invoice::find($invoice_id);



        return view('pages.edit_invoice')->with(['roles'=>$user_by_role,'invoice'=>$invoice]);
    }
    public function update(Request $request,$invoice_id){

        $this->validate($request,

            [
                'user_id' => 'required',
                'invoice_for' => 'required',
                'amount'    => 'required'
            ]
        );


        $update =
            [
                'user_id' =>$request->get('user_id'),
                'invoice_for' => $request->get('invoice_for'),
                'amount'    => $request->get('amount'),
            ];

        $invoice = Invoice::find($invoice_id);

        $invoice->update($update);

        \Session::flash('message','Success');

        return redirect()->back();

    }

    public function delete(Request $request,$invoice_id){


        $invoice = Invoice::find($invoice_id);

        $invoice->delete();

        echo 'deleted';

    }




}

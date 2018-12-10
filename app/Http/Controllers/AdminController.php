<?php

namespace App\Http\Controllers;

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

        return view('pages.admin_home');

    }

}

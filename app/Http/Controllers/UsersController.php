<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('show_users');

    }

    public function index(){

        $users = User::all();

        return view('pages.users_page')->withUsers($users);

    }
}

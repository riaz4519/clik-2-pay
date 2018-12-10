<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('user_group');
    }

    public function index(){

        $roles = Role::all();

        return view('pages.create_user_group')->withRoles($roles);
    }
}

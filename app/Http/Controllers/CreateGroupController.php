<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class CreateGroupController extends Controller
{
    //

    public function create(Request $request){


        $role_name = $request->get('name');

        $role = new Role();

        $role->name = $role_name;
        $role->save();

        echo 'success';



    }
}

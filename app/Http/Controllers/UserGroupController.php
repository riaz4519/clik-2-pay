<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    //

    public function index(){

        $roles = Role::all();

        return view('pages.create_user_group')->withRoles($roles);
    }

    public function edit($user_role_id){



        $user_role = Role::find($user_role_id);

        $user_permissions = Permission::all();

        return view('pages.edit_user_group')->with(['permissions' =>$user_permissions ,'role'=>$user_role]);





    }

    public function editStore(Request $request,$user_role){




        $role = Role::find($user_role);

        $role->accesses()->detach();

        $role->accesses()->sync($request->get('access_id'));

        \Session::flash('message','Success');

        return redirect()->back();


    }
}

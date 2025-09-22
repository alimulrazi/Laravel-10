<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
        public function index(){
        $user = User::find(2);
        $roleIds = [1, 2, 3];
        // $user->roles()->attach($roleIds);
        $user->roles()->sync($roleIds);

        $role = Role::find(1);
        $userIds = [2, 3];
        // $role->users()->attach($userIds);
    }
}

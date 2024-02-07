<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Users\ManageUsers;

class UsersController extends Controller
{
    public function index(ManageUsers $manageUsers)
    {
        $users = $manageUsers->getUsers();
        //dd($users);
        return view('admin.users', ['users' => $users]);
    }
}

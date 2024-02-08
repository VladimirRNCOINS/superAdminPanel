<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Users\ManageUsers;

class UsersController extends Controller
{
    private $_paginationDefault = [
                                    'startPage' => 1,
                                    'perPage'   => 25
                                ];

    public function index()
    {
        return redirect()->route('users_show', ['page' => $this->_paginationDefault['startPage'], 'limit' => $this->_paginationDefault['perPage']]);
    }

    public function show(Request $request, ManageUsers $manageUsers)
    {
        $page = (int) $request->page;
        $limit = (int) $request->limit;

        if (!$page || !$limit) {
            return redirect()->route('users');
        }

        $users = $manageUsers->getUsers();
        return view('admin.users', ['users' => $users]);
    }
}

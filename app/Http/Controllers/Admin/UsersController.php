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
        if (!is_numeric($request->page) || !is_numeric($request->limit) || $request->limit > 100) {
            return redirect()->route('users');
        }

        $request->page = (int) $request->page;
        $request->limit = (int) $request->limit;

        $users = $manageUsers->getUsers();
        return view('admin.users', ['users' => $users]);
    }
}

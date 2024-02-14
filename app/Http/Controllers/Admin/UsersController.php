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
        $roles = $manageUsers->getRoles();

        return view('admin.users', ['users' => $users, 'roles' => $roles]);
    }

    public function find(Request $request, ManageUsers $manageUsers)
    {
        $user = $manageUsers->getUser($request->id);
        return view('admin.user', ['user' => $user]);
    }

    public function search(Request $request, ManageUsers $manageUsers)
    {
        if($request->name){
            $users = $manageUsers->searchUsers($request->name);
            return response()->json(['names' => $users], 200);
        }
        return;
    }

    public function filters(Request $request, ManageUsers $manageUsers)
    {
        $manageUsers->getUserFilters($request);
        return redirect()->route('users');
    }

    public function filters_refresh()
    {
        session()->forget('show_users_filters');
        return redirect()->route('users');
    }
}

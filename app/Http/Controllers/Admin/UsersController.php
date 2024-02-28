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

    public function edit(Request $request, ManageUsers $manageUsers)
    {
        $user = $manageUsers->getUser($request->id);
        if ($user) {
            $user_roles = $manageUsers->explodeUserRoles($user->roles);
            $roles = $manageUsers->getRoles();
            return view('admin.user', ['user' => $user, 'roles' => $roles, 'user_roles' => $user_roles, 'post_action' => "/user_update"]);
        }
        return redirect()->route('users');
    }

    public function update(Request $request, ManageUsers $manageUsers)
    {
        $validated = $request->validate([
            'check_roles' => 'required|array',
            'active' => 'required|numeric|in:1,0',
            'publish' => 'required|numeric|in:1,0',
        ]);

        if (isset($request->check_roles) && !empty($request->check_roles)) {
            $request->impRoles = $manageUsers->implodeUsersRoles($request->check_roles);
        }
        else {
            $request->impRoles = '2';
        }

        $res = $manageUsers->updateUser($request);

        if($res){
            return redirect()->route('edit_user', ['id' => $request->id])->with('user_update_success', 'Пользователь успешно обновлен!');
        }
        
        return redirect()->route('users');
    }

    public function create(ManageUsers $manageUsers)
    {
        $roles = $manageUsers->getRoles();
        return view('admin.user', ['roles' => $roles, 'post_action' => "/user_store"]);
    }

    public function store(Request $request, ManageUsers $manageUsers)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
            'check_roles' => 'required|array',
            'active' => 'required|numeric|in:1,0',
            'publish' => 'required|numeric|in:1,0',
        ]);

        if (isset($request->check_roles) && !empty($request->check_roles)) {
            $request->impRoles = $manageUsers->implodeUsersRoles($request->check_roles);
        }
        else {
            $request->impRoles = '2';
        }

        $id = $manageUsers->storeUser($request);
        
        if($id){
            return redirect()->route('edit_user', ['id' => $id])->with('user_update_success', 'Пользователь успешно создан!');
        }
        return redirect()->route('create_user');
    }
}

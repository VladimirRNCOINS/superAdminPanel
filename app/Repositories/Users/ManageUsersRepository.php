<?php

namespace App\Repositories\Users;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Session;

class ManageUsersRepository
{
    private $_request;

    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function getUsersRepository()
    {
        $page = $this->_request->page;
        $perPage = $this->_request->limit;
        $query = User::query();
        
        $s_filters = Session::get('show_users_filters');

        if (!empty($s_filters)) {
            if (isset($s_filters['role'])) {
                $query->where('roles', 'like', '%'.$s_filters['role'].'%');
            }

            if (isset($s_filters['active'])) {
                $query->where('active', $s_filters['active']);
            }

            if (isset($s_filters['publish'])) {
                $query->where('publish', $s_filters['publish']);
            }
        }
        //query count
        $total = $query->count('id');

        $lastPage = (int) ceil($total / $perPage);

        $skip = ($page * $perPage) - $perPage;
        //query data
        $result = $query->orderBy('name', 'asc')
            ->skip($skip)
            ->take($perPage)
            ->get();

        $result->total = $total;
        $result->perPage = $perPage;
        $result->lastPage = $lastPage;
        $result->currentPage = $page;

        return $result;
    }

    public function getUserRepository($id)
    {
        return User::find($id);
    }

    public function getUsersLikeName($name)
    {
        return User::select(['id', 'name'])->where('name', 'like', '%'.$name.'%')->take(10)->get();
    }

    public function getRolesRepository()
    {
        return Role::all();
    }

    public function updateUserRepository($request)
    {
        return User::where('id', $request->id)
                                            ->update([
                                                "roles" => $request->impRoles,
                                                "active" => $request->active,
                                                "publish" => $request->publish
                                            ]);
    }
}
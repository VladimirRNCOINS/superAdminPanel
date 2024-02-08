<?php

namespace App\Repositories\Users;
use Illuminate\Http\Request;
use App\Models\User;

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

        $total = User::count('id');

        $lastPage = (int) ceil($total / $perPage);

        $skip = ($page * $perPage) - $perPage;

        $result = User::orderBy('name', 'asc')
            ->skip($skip)
            ->take($perPage)
            ->get();

        $result->total = $total;
        $result->perPage = $perPage;
        $result->lastPage = $lastPage;
        $result->currentPage = $page;

        return $result;
    }
}
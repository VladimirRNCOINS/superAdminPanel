<?php

namespace App\Services\Users;
use App\Repositories\Users\ManageUsersRepository;
use Session;

class ManageUsers
{
    private $_manageUsersRepository;

    private $_filters = [
        'role',
        'active',
        'publish'
    ];

    public function __construct(ManageUsersRepository $manageUsersRepository)
    {
        $this->_manageUsersRepository = $manageUsersRepository;
    }

    public function getUsers()
    {
        return $this->_manageUsersRepository->getUsersRepository();
    }

    public function getUser($id)
    {
        return $this->_manageUsersRepository->getUserRepository($id);
    }

    public function searchUsers($name)
    {
        return $this->_manageUsersRepository->getUsersLikeName($name);
    }

    public function getRoles()
    {
        return $this->_manageUsersRepository->getRolesRepository();
    }

    public function getUserFilters($request)
    {
        $show_users_filters = [];
        $arr_req = $request->all();
        
        foreach ($this->_filters as $filter ) {
            if (isset($arr_req[$filter]) && is_numeric($arr_req[$filter])) {
                $show_users_filters[$filter] = (int) $arr_req[$filter];
            }
        }
        if (!empty($show_users_filters)) {
            Session::put('show_users_filters', $show_users_filters);
            return $show_users_filters;
        }
        return;
    }

    public function explodeUserRoles($roles)
    {
        $expRoles = explode('|', $roles);
        return $expRoles;
    }

    public function implodeUsersRoles($roles)
    {
        $impRoles = implode('|', $roles);
        return $impRoles;
    }

    public function updateUser($request)
    {
        return $this->_manageUsersRepository->updateUserRepository($request);
    }

    public function storeUser($request)
    {
        return $this->_manageUsersRepository->storeUserRepository($request);
    }
}
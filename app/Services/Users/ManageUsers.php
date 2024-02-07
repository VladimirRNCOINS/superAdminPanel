<?php

namespace App\Services\Users;
use App\Repositories\Users\ManageUsersRepository;

class ManageUsers
{
    private $_manageUsersRepository;

    public function __construct(ManageUsersRepository $manageUsersRepository)
    {
        $this->_manageUsersRepository = $manageUsersRepository;
    }

    public function getUsers()
    {
        return $this->_manageUsersRepository->getUsersRepository();
    }
}
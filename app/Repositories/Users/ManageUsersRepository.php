<?php

namespace App\Repositories\Users;
use App\Models\User;

class ManageUsersRepository
{
    public function getUsersRepository()
    {
        return User::paginate(15);
    }
}
<?php
namespace App\Traits\Auth;
use Auth;
use Session;

Trait AssertRolesToSession
{
    private $_roles_arr = [];

    private function rolesToSession() 
    {
        if (Auth::user()->roles) {
            $expAuthUserRoles = explode('|', Auth::user()->roles);

            if (!empty($expAuthUserRoles) && in_array(7, $expAuthUserRoles)) {
                $this->_roles_arr += ['SuperAdmin' => '7'];
            }

            if (!empty($this->_roles_arr)) {
                foreach ($this->_roles_arr as $key => $value) {
                    Session::put($key, $value);
                }
                return true;
            }
        }
        return false;
    }
}
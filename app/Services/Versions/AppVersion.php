<?php

namespace App\Services\Versions;

class AppVersion 
{
    public static function createVersion()
    {
        return md5(microtime());
    }
}
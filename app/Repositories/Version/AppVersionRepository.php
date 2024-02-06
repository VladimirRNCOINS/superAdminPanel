<?php

namespace App\Repositories\Version;
use App\Models\Version;

class AppVersionRepository
{
    public function saveOrCreateVersion($hash)
    {
        $version = new Version;
        
        $version->version = $hash;

        $result = $version->save();
        
        return $result;
    }
}
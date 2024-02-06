<?php

namespace App\Services\Versions;
use App\Repositories\Version\AppVersionRepository;

class AppVersion 
{
    private $_appVersionRepository;

    public function __construct(AppVersionRepository $appVersionRepository)
    {
        $this->_appVersionRepository = $appVersionRepository;
    }

    public function createVersion()
    {
        $hash_version = md5(microtime());
        return $result = $this->_appVersionRepository->saveOrCreateVersion($hash_version);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Versions\AppVersion;

class VersionsController extends Controller
{
    public function index()
    {
        return view('admin.versions');
    }

    public function create(AppVersion $appVersion)
    {
        $result = $appVersion->createVersion();

        if ($result) {
            return redirect()->route('versions')->with('version_success', 'Хеш для новой версии приложения успешно сохранен!');
        }

        return redirect()->route('versions')->with('version_error', 'Хеш для новой версии приложения не сохранен!');
    }
}

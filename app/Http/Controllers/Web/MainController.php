<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('main.main');
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Auth\AssertRolesToSession;
use DB;
use Auth;

class EntryController extends Controller
{
    use AssertRolesToSession;

    public function index()
    {
        if (!Auth::check()) {
            return view('main.entry');
        }
        return redirect()->route('main');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {

            $request->session()->regenerate();
            if ($this->rolesToSession()) {
                return redirect()->route('admin');
            }
        }
        
        return redirect()->route('entry');
    }
}

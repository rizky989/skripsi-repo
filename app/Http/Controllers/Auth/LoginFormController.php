<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginFormController extends Controller
{
    public function __invoke()
    {
        if(Auth::user()) {
            return redirect()->route('profile.page');
        }
        return view('auth.login');
    }
}

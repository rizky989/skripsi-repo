<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('profile');
        }else{
            return redirect()->back()->with('login_error','Email atau password anda salah');
        }
        $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;

class ResetPasswordFormController extends Controller
{
    public function __invoke($token)
    {
        $reset = PasswordReset::where('token', $token)->firstOrFail();
        $user = User::where('email', $reset->email)->firstOrFail();
        return view('auth.passwords.reset', compact('user'));
    }
}

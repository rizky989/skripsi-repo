<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;

class ResetPasswordSubmitController extends Controller
{
    public function __invoke($token, Request $request)
    {
        $reset = PasswordReset::where('token', $token)->firstOrFail();
        User::where('email', $reset->email)->update(['password' => bcrypt($request->password)]);
        return response()->json(['message' => 'Berhasil update password, silahkan login kembali'], 200);
    }
}

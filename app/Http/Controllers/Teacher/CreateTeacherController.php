<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateTeacherController extends Controller
{
    public function __invoke(Request $request)
    {
        $emailExist = User::where('email', $request->email)->first();
        if ($emailExist) {
            return response()->json(['message' => 'Email telah terpakai'], 422);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ])
        ->assignRole('lecturer');
        return response()->json(['message' => 'Berhasil membuat akun dosen'], 201);
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateStudentController extends Controller
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
        ->assignRole('student');
        return response()->json(['message' => 'Berhasil membuat akun mahasiswa'], 201);
    }
}

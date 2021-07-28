<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateTeacherController extends Controller
{
    public function __invoke($id, Request $request)
    {
        $emailExist = User::where('email', $request->email)->where('id','!=', $id)->first();
        if ($emailExist) {
            return response()->json(['message' => 'Email telah terpakai'], 422);
        }
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if(isset($request->password)) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        return response()->json(['message' => 'Berhasil update akun dosen'], 200);
    }
}

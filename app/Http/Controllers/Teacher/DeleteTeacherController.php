<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteTeacherController extends Controller
{
    public function __invoke($id)
    {
        User::find($id)->delete();
        return response()->json(['message' => 'Berhasil menghapus akun dosen'], 200);
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Essay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteStudentController extends Controller
{
    public function __invoke($id)
    {
        User::find($id)->delete();
        Essay::where('user_id', $id)->delete();
        return response()->json(['message' => 'Berhasil menghapus akun mahasiswa'], 200);
    }
}

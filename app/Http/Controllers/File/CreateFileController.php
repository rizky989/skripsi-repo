<?php

namespace App\Http\Controllers\File;

use App\Models\Essay;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateFileController extends Controller
{
    public function __invoke(Request $request)
    {
        $file = $request->file('file');
        $fileName = Str::random(32).'-'. $file->getClientOriginalName();
        $file->move(public_path('file/essay'), $fileName);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['file'] = $fileName;
        Essay::create($input);
        return back()->with('message','Sukses menginput data skripsi');
    }
}

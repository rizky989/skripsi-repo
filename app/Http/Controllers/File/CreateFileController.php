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
        $input = $request->except('id');
        if($request->file) {
            $fileName = $this->upload($request->file('file'));
            $input['file'] = $fileName;
        }
        $input['user_id'] = Auth::user()->id;

        if($request->id) {
            Essay::find($request->id)->update($input);
            return back()->with('message','Sukses update data skripsi');
        } else {
            Essay::create($input);
            return back()->with('message','Sukses menginput data skripsi');
        }
    }

    private function upload($file)
    {
        $fileName = Str::random(32).'-'. $file->getClientOriginalName();
        $file->move(public_path('file/essay'), $fileName);
        return $fileName;
    }
}

<?php

namespace App\Http\Controllers\File;

use App\Models\Essay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $essay = Essay::find($id);
        return view('file.show', compact('essay'));
    }
}

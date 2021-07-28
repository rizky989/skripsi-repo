<?php

namespace App\Http\Controllers\Auth;

use App\Models\Essay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $file = Essay::where('user_id', Auth::user()->id)->first();
        return view('auth.profile', compact('file'));
    }
}

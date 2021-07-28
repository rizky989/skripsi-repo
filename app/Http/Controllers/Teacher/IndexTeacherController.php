<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class IndexTeacherController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = User::role('lecturer')->orderBy('name');
        if ($request->has('search') && !is_null($request->get('search')['value'])) {
            $search = $request->get('search')['value'];
            $response = $response->where(function($query) use($search){
                $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        return DataTables::of($response->get())
            ->addIndexColumn()
            ->addColumn('action', function($user){
                return view('users.teacher.action', ['user' => $user]);
            })
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers\File;

use DataTables;
use Carbon\Carbon;
use App\Models\Essay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexFileController extends Controller
{
    public function __invoke(Request $request)
    {
        $essay = Essay::with('author');
        if($request->filter_by === 'title') {
            $essay = $essay->where('title', 'like', "%$request->q%");
        }
        if($request->filter_by === 'year') {
            $essay = $essay->whereYear('date', $request->q);
        }
        if($request->filter_by === 'author') {
            $essay = $essay->whereHas('author', function ($query) use($request){
                return $query->where('name', 'like', "%$request->q%");
            });
        }
        if($request->filter_by === 'lecturer') {
            $essay = $essay->where('lecturer', 'like', "%$request->q%");
        }

        return DataTables::of($essay->get())
            ->addIndexColumn()
            ->addColumn('year', function($item){
                return Carbon::parse($item->date)->format('Y');
            })
            ->addColumn('detail', function($item){
                return view('file.detail', ['item' => $item]);
            })
            ->make(true);
    }
}

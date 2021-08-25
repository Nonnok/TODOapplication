<?php

namespace App\Http\Controllers;

use App\Models\Todotask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todotask::all();
        $items = DB::table('todotasks') -> get();
        return view('layouts.index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->content,
        ];
        DB::table('todotasks')->insert($param);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $param = [
            'content' => $request->content,
            'updated_at' => $request->updated_at,
        ];
        DB::table('todotasks')->where('id', $request->id)->update($param);
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        $item = DB::table('todotasks')->where('id', $request->id)->first();
        return view('delete', ['form' => $item]);
    }
}
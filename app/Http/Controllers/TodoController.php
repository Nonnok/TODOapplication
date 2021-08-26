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
            'content' => $request->content,
        ];
        DB::insert('insert into todotasks(content) values (:content)', $param);
        $this -> validate($request, Todotask::$rules);
        $form = $request->all();
        Todotask::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $param = [
            'content' => $request->content,
            'updated_at' => $request->updated_at,
        ];
        // DB::table('todotasks')->where('id', $request->id)->update($param);
        DB::update('update todotasks set content =:content, updated_at =:updated_at', $param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        // $item = DB::table('todotasks')->where('id', $request->id)->first();
        //  return view('delete', ['form' => $item]);
        // return redirect('/delete');
        $param = ['content' => $request->content];
        DB::select('select * from todotasks where content =:content', $param);
        return redirect('/todo/delete', ['form' => $item[0]]);
    }
}
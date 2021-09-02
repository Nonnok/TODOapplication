<?php

namespace App\Http\Controllers;


use App\Models\Todotask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function index(Request $id)
    {
        $items = Todotask::all();
        $items = DB::select('select * from todotasks');
        return view('layouts.index', ['items' => $items]);
    }
    public function create(Request $request)
    {

        $this->validate($request, Todotask::$rules);
        $form = $request->all();
        Todotask::create($form);
        return redirect('/');
    }


    public function edit(Request $request)
    {
        $todotask = Todotask::find($request->id);
        return view('edit', ['form'=>'todotask']);
    }

    public function update(Request $request)
    {

        $this -> validate($request, Todotask::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todotask::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todotask=Todotask::find($todotask->id);
        return view('delete', ['form'=>$request]);
    }

    public function remove(Request $request)
    {
        Todotask::find($request->id)->delete();
        return redirect('/');
    }
}
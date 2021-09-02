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
        // $param = [
        //     'content' => $request->content,
        // ];
        // DB::insert('insert into todotasks (content) values (:content)', $param);
        // $form = $request->all();
        // Todotask::create($form);
        // return redirect('/');

        $this->validate($request, Todotask::$rules);
        $form = $request->all();
        Todotask::create($form);
        return redirect('/');
    }

    // public function bind(Todotask $todotask)
    // {
    //     $data = [
    //         'item' => $todotask,
    //     ];
    //     return view('todotask.bins', $data);
    // }

    public function edit(Request $request)
    {
        $todotask = Todotask::find($request->id);
        return view('edit', ['form'=>'todotask']);
    }

    public function update(Request $request)
    {
        // $task = \App\Models\Todotask::findOrFail($id);

        // $task->content = $request->content;

        // $task->save();

        // return redirect('/');

        $this -> validate($request, Todotask::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todotask::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        // $task = \App\Models\Todotask::findOrFail($id);

        // $task->delete();
        // return redirect('/');

        $todotask=Todotask::find($todotask->id);
        return view('delete', ['form'=>$request]);
    }

    public function remove(Request $request)
    {
        Todotask::find($request->id)->delete();
        return redirect('/');
    }
}

// デバック
// コンソール
// ロガー
// Laravel　ログ

//sklとして間違えている。

// 数字を入れて４２０００が帰ってきたら間違っている。

// 音声認識は後回し可
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Todotask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function index()
    {
        $items = Todotask::all();
        $items = DB::select('select * from todotasks');
        return view('layouts.index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
        ];
        DB::insert('insert into todotasks (content) values (:content)', $param);
        $form = $request->all();
        return redirect('/');
    }
    public function update(Request $request)
    {
        $task = \App\Models\Todotask::findOrFail($id);

        $task->content = $request->content;

        $task->save();

        return redirect('/');
    }
    public function delete(Request $id)
    {
        $task = \App\Models\Todotask::findOrFail($id);

        $task->delete();
        return redirect('/');
    }

    // public function newDate(Request $request)
    // {
    //     $datetime = new Carbon::today();
    //     print $datetime;
    //     return redirect('/');
    // }
}

// デバック
// コンソール
// ロガー
// Laravel　ログ

//sklとして間違えている。

// 数字を入れて４２０００が帰ってきたら間違っている。

// 音声認識は後回し可
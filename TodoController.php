<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from todotasks');
        return view('layouts.index', ['items' => $items]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function index()
    {
        $test = "je suis la variable test";
        $test2 = "je suis le second";

        $testdb = DB::select('select test2 from test where id = "1"');

        return view('test', compact('test', 'test2', 'testdb'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function index()
    {
        $test = "je suis la variable test";
        $test2 = "je suis le second";

        $testdb = DB::select('select test1 from test where test1 = "123456"');

        return view('test', compact('test', 'test2', 'testdb'));
    }
}

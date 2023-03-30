<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function index()
    {
        $test = "je suis la variable test";
        $test2 = "je suis le second";

        return view('test', compact('test', 'test2'));
    }
}

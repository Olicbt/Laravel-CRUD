<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function test()
    {
       // return 'Zdravo123';
       return view('test');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class practicascontroller extends Controller
{
    public function vista1()
    {
        return view('ejemplo1');
    }

    public function vista2()
    {
        return view('ejemplo2');
    }

    public function vista3()
    {
        return view('ejemplo3');
    }
}

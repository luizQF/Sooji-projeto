<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        $dash = auth()->user()->tarefas;
        return view('home', compact('dash'));
    }
}

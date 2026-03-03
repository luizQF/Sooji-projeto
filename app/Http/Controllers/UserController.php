<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        

    // O dd() para a execução e "printa" o ID na tela
    dd(auth()->id()); 

        $tarefas = auth()->user()->tarefas;
        return view('perfil', compact('tarefas'));
    }
}

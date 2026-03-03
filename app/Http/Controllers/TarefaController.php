<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
class TarefaController extends Controller
{
    public function index()
    {

        $tarefas = auth()->user()->tarefas;
        return view('tarefas', compact('tarefas'));
    
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'situacaoAtual' => 'required|in:pendente,concluida,vencida',
        ]);

        Tarefa::create([
            'name' => $validated['name'],
            'situacaoAtual' => 'pendente',
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('tarefas')->with('success','');
    }
}

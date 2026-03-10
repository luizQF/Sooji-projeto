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
            'descricao' => 'nullable',
            'venc_date' => 'nullable|date',
            'categoria' => 'required',
        ]);

        Tarefa::create([
            'name' => $validated['name'],
            'descricao' => $validated['descricao'] ?? null,
            'user_id' => auth()->id(),
            'venc_date' => $validated['venc_date'] ?? null,
            'categoria' => $validated['categoria'],
        ]);
        return redirect()->route('tarefas')->with('success','');
    }

    public function destroy(string $id)
    {
        $item = Tarefa::findOrFail($id);
        $item->delete();
        return redirect()->route('tarefas')->with('sucess', 'Tarefas Excluido');
    }

    public function check(string $id){
        $item = Tarefa::findOrFail($id);
        $item->update([
            'situacaoAtual' => 'concluida',
        ]);
        $item->save();
        return redirect()->route('tarefas')->with('sucess', 'Tarefa Concluida');
    }
}

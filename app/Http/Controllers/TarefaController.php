<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
class TarefaController extends Controller
{
    public function index()
    {

        $tarefas = auth()->user()->tarefas;
        $grupos = auth()->user()->grupos;
        return view('tarefas', compact('tarefas', 'grupos'));
    
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'descricao' => 'nullable',
            'group_id'  => 'nullable|exists:groups,id',
            'venc_date' => 'nullable|date',
            'categoria' => 'required',
            'tags'      => 'nullable'
        ]);

        Tarefa::create([
            'name'      => $validated['name'],
            'descricao' => $validated['descricao'] ?? null,
            'user_id'   => auth()->id(),
            'group_id'  => $validated['group_id'],
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

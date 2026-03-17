<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
class GruposController extends Controller
{
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string'
        ]);

        auth()->user()->grupos()->create($validated);

        return redirect()->back()->with('success', 'Grupo criado!');
    }
    public function destroy(string $id)
    {
        $item = Grupos::findOrFail($id);
        $item->delete();
        return redirect()->route('tarefas')->with('sucess', 'Tarefas Excluido');
    }
}

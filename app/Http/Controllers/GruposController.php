<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
class GruposController extends Controller
{
    public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'desc' => 'nullable|string'
    ]);

    Grupos::create([
        'name' => $validated['name'],
        'desc' => $validated['desc']
    ]);

    return redirect()->back()->with('success', 'Grupo criado!');
}
}

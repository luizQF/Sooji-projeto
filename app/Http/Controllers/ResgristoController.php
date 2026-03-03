<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ResgristoController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        
        $usuario = new User();
        $usuario->name = explode('@', $validatedData['email'])[0]; // Usar a parte antes do @ como nome
        $usuario->email = $validatedData['email'];
        $usuario->password = bcrypt($validatedData['password']);
        $usuario->save();

        // Redirecionar para a página de sucesso ou para a home
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
    }
}

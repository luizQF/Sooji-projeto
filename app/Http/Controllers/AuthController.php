<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function logar(Request $request)
    {
        // Lógica de login
        //Procura o usuário pelo email q foi feito pela requisição e escolhe o primeiro (se tiver duplicidade pode dar errado)
        $user = User::where('email', $request->email)->first();
        //se encontrar o usuário, verifica se a senha bate com a senha do banco de dados
        if ($user) {
            //se o Hash da senha do request bater com o hash da senha do banco de dados, autentica o usuário
            if(Hash::check($request->password, $user->password)) {
                // Autenticar o usuário
                Auth::login($user);
                
                return redirect()->route('home');
            } else {
                return back()->withErrors(['password' => 'Senha incorreta']);
            }
    }
        return back()->withErrors(['erro' => 'Email ou senha inválida']);
    }


    public function logout(Request $request)
    {
        // Faz o logout do usuário na sessão
        Auth::logout();

        // Invalida a sessão atual do usuário
        $request->session()->invalidate();

        // Gera um novo token CSRF para prevenir ataques
        $request->session()->regenerateToken();

        // Redireciona para a página inicial ou login
        return redirect()->route('cadastro.index');
    }
}

<?php

use App\Http\Controllers\TarefaController;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResgristoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
Route::get("/", function(){
    return view("login");
})->name('login');

Route::post("/logar", [AuthController::class, 'logar'])->name('logar');
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');

Route::post("/cadastro", [ResgristoController::class, 'store'])->name('cadastro.store');
Route::get("/cadastrar", [ResgristoController::class, 'index'])->name('cadastro.index');

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/tarefas', [TarefaController::class,'index'])->name('tarefas');

    Route::get('/calendario', function () {
        return view('calendario');
    })->name('calendario');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');

});

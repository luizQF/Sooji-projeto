<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tarefas', function () {
    return view('tarefas');
})->name('tarefas');

Route::get('/calendario', function () {
    return view('calendario');
})->name('calendario');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');
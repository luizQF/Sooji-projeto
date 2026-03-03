@extends('layouts.app')
@section('title', 'Perfil')
@section('content')


<h1>Bem vindo ao seu perfil! {{ auth()->user()->name }}</h1>

@forelse ($tarefas as $tarefa)
<p>{{ $tarefa->name }}</p>
@empty
@endforelse
<h1>Tarefas</h1>
@endsection
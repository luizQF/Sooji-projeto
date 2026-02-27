@extends('layouts.app')

@section('title', 'Bem vindo')

@section('content')

    <h1 class="text-2xl font-bold">Bem vindo ao Sooji</h1>

    <p class="text-thin text-grayText-color">
        O Sooji é um sistema de gerenciamento de tarefas que ajuda você a organizar 
        suas atividades diárias de forma eficiente. Com uma interface intuitiva 
        e recursos poderosos...
    </p>

    <div class="grid flex-col lg:grid-cols-5 gap-6 w-full">

        <x-dashboard-card label="Tarefas">

            <!-- Card de Tarefas Hoje -->  
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /> 
            4

        </x-dashboard-card>

        <x-dashboard-card label="Concluídas">

            <!-- Card de Tarefas Concluídas -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            1

        </x-dashboard-card>

        <x-dashboard-card label="Pendentes" >

            <!-- Card de Tarefas Pendentes -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            2

        </x-dashboard-card>

        <x-dashboard-card label="Vencidas">

            <!-- Card de Tarefas Vencidas (passadas do prazo) -->
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            1

        </x-dashboard-card>

        <x-dashboard-card label="Produtividade">

            <!-- Card de Produtividade -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
            88.7%

        </x-dashboard-card>

    </div>
    <div class=" rounded-xl p-4 shadow-sm border border-gray-200 mt-5 flex flex-col">
        
    <div class="w-full flex justify-between">
            <h2 class="text-lg font-bold m-3">Bloco de Anotações</h2>
            <a href="" class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6.5 flex-1 mt-[3.3px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>

        <ul class="m-6">
            <li>
                <p class="text-grayText-color text-sm">Aqui você pode adicionar suas anotações rápidas para organizar melhor suas tarefas e ideias. Use este espaço para escrever lembretes, listas de afazeres ou qualquer coisa que ajude você a se manter produtivo.</p>
            </li>
        </ul>
    </div>

@endsection

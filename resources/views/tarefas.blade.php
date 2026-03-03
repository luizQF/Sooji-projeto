@extends('layouts.app')
@section('title', 'Tarefas')
@section('content')

    <div class="flex justify-between items-center">

        <h1 class="text-2xl font-bold">Minhas Tarefas</h1>
        <button class=" hover:cursor-pointer bg-primary-color text-white px-4 py-2 rounded-lg hover:bg-secondary-color transition-colors w-[8vw] flex items-center justify-center">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            Nova Tarefa

        </button>
    
    </div>

    <div class="focus-within:ring-2 focus-within:ring-primary-color focus-within:border-transparent w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent mt-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>

        <input type="text" name="filtrarTarefas" id="filtroTarefas" placeholder="Filtrar tarefas..." class="focus:outline-none w-full  focus:border-transparent">
    
    </div>  

    
    
    <div class="grid flex-col grid-cols-1 gap-2 w-full">
    <h2 class="font-bold mt-2 text-lg">Pendentes ({{ $tarefas->where('situacaoAtual', 'pendente')->count() }})</h2> 

        @forelse ($tarefas->where('situacaoAtual', 'pendente') as $tarefa)
                
                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center gap-4">
                        <div>
                            <h3 class="font-bold">{{ $tarefa->name }}</h3>
                            <p class="text-sm text-grayText-color">{{ $tarefa->descricao }}</p>
                        </div>
                    </div>
                </div>

            @empty

                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center gap-4">
                        <div>
                            <h3 class="font-bold">Sem Tarefas</h3>
                            <p class="text-sm text-grayText-color">Termine uma <strong>tarefa</strong> para vizualizar.</p>
                        </div>
                    </div>
                </div>
    
        @endforelse
    
    </div>
  <div class="grid flex-col grid-cols-1 gap-2 w-full">
    <h2 class="font-bold mt-2 text-lg">Concluídas ({{ $tarefas->where('situacaoAtual', 'concluida')->count() }})</h2>


        @forelse ($tarefas->where('situacaoAtual', 'concluida') as $tarefa)
                
                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center gap-4">
                        <div>
                            <h3 class="font-bold">{{ $tarefa->name }}</h3>
                            <p class="text-sm text-grayText-color">{{ $tarefa->descricao }}</p>
                        </div>
                    </div>
                </div>

            @empty

                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center gap-4">
                        <div>
                            <h3 class="font-bold">Sem Tarefas</h3>
                            <p class="text-sm text-grayText-color">Termine uma <strong>tarefa</strong> para vizualizar.</p>
                        </div>
                    </div>
                </div>
    
        @endforelse
    </div>

@endsection

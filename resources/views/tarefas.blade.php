@extends('layouts.app')
@section('title', 'Tarefas')
@section('content')
<div x-data="{ openModal: false }">


    <div class="flex justify-between items-center">

        <h1 class="text-2xl font-bold">Minhas Tarefas</h1>
        <button @click="openModal = true" class=" hover:cursor-pointer bg-primary-color text-white px-4 py-2 rounded-lg hover:bg-secondary-color transition-colors w-[8vw] flex items-center justify-center">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            Nova Tarefa

    </button>
    
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
                        </div> <div 
            x-show="openModal" 
            class="fixed inset-0 z-50 overflow-y-auto" 
            style="display: none;"
        >
            {{-- Fundo escuro --}}
            <div 
                class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
                @click="openModal = false"
                x-show="openModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            ></div>

            {{-- Caixa do Formulário --}}
            <div class="flex items-center justify-center min-h-screen p-4">
                <div 
                    x-show="openModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-2xl"
                >
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Nova Tarefa</h2>
                        <button @click="openModal = false" class="text-gray-400 hover:text-black">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    {{-- Formulário --}}
                    <form action="{{ route('tarefas.create') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium mb-1">Título</label>
                            <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Ex: Estudar Laravel" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Descrição</label>
                            <textarea name="descricao" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Detalhes da tarefa..."></textarea>
                        </div>
                        
                        <button type="submit" @click="openModal = false" class="bg-primary-color text-white font-bold py-2 rounded-lg hover:bg-secondary-color transition-all">
                            Criar Tarefa
                        </button>
                    </form>
                </div>
            </div>
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
    <div 
            x-show="openModal" 
            class="fixed inset-0 z-50 overflow-y-auto" 
            style="display: none;"
        >
            {{-- Fundo escuro --}}
            <div 
                class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
                @click="openModal = false"
                x-show="openModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            ></div>

            {{-- Caixa do Formulário --}}
            <div class="flex items-center justify-center min-h-screen p-4">
                <div 
                    x-show="openModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-2xl"
                >
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Nova Tarefa</h2>
                        <button @click="openModal = false" class="text-gray-400 hover:text-black hover:cursor-pointer">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    {{-- Formulário --}}
                    <form action="{{ route('tarefas.create') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Título</label>
                            <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Ex: Estudar Laravel" required>
                        </div>
                       
                        <div>
                            <label class="block text-sm font-medium mb-1">Descrição</label>
                            <textarea name="descricao" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Detalhes da tarefa..."></textarea>
                        </div>
                        
                        <div class="">
                            <label class="block text-sm font-medium mb-1">Repetir na semana</label>
                        
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Prazo da tarefa</label>
                            <input type="date" name="venc_date" class="border border-gray-300 p-2">
                        </div>
                        
                        <button type="submit" @click="openModal = false" class="bg-primary-color text-white font-bold py-2 rounded-lg hover:bg-secondary-color transition-all">
                            Criar Tarefa
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection

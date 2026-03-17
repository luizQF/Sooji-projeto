@extends('layouts.app')
@section('title', 'Tarefas')
@section('content')
<div x-data="{ openModal: false, modalGrupo: false }">

    {{-- Menu de criação --}}
    <div class="flex justify-between">
        <h1 class="text-2xl font-bold justify-start">Minhas Tarefas</h1>
        <div class="flex gap-4">
            <button @click="modalGrupo = true" class="w-fit hover:cursor-pointer text-primary-color px-4 py-2 rounded-lg border-solid border border-primary-color transition-colors flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Novo Grupo
            </button>
            <button @click="openModal = true" class="hover:cursor-pointer bg-primary-color text-white px-4 py-2 rounded-lg hover:bg-secondary-color transition-colors w-fit flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Nova Tarefa
            </button>
        </div>
    </div>

    {{-- Tarefas Pendentes --}}
    <div class="grid flex-col grid-cols-1 gap-2 w-full">
        <h2 class="font-bold mt-2 text-lg">Pendentes ({{ $tarefas->where('situacaoAtual', 'pendente')->count() }})</h2> 
        
        <x-group-card :grupos="$grupos" />

        @foreach ($tarefas->where('situacaoAtual', 'pendente')->whereNull('grupo_id') as $tarefaIndividual)
            <x-task-card :tarefa="$tarefaIndividual"></x-task-card>
        @endforeach
    </div>

    {{-- Tarefas Concluídas --}}
    <div class="grid flex-col grid-cols-1 gap-2 w-full">
        <h2 class="font-bold mt-2 text-lg">Concluídas ({{ $tarefas->where('situacaoAtual', 'concluida')->count() }})</h2>
        
        <x-group-card :grupos="$grupos" />

        @foreach ($tarefas->where('situacaoAtual', 'concluida')->whereNull('grupo_id') as $tarefaIndividual)
            <x-task-card :tarefa="$tarefaIndividual"></x-task-card>
        @endforeach
    </div>

    {{-- Tarefas Vencidas --}}
    <div class="grid flex-col grid-cols-1 gap-2 w-full">
        <h2 class="font-bold mt-2 text-lg">Vencidas ({{ $tarefas->where('situacaoAtual', 'vencido')->count() }})</h2>
        
        <x-group-card :grupos="$grupos" />

        @foreach ($tarefas->where('situacaoAtual', 'vencido')->whereNull('grupo_id') as $tarefaIndividual)
            <x-task-card :tarefa="$tarefaIndividual"></x-task-card>
        @endforeach
    </div>

    {{-- Modal de Nova tarefa --}}
    <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="openModal = false" x-show="openModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div class="flex items-center justify-center min-h-screen p-8">
            <div x-show="openModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Nova Tarefa</h2>
                    <button @click="openModal = false" class="text-gray-400 hover:text-black hover:cursor-pointer">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                
                <form action="{{ route('tarefas.create') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium mb-1">Título*</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Ex: Estudar Laravel" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Descrição</label>
                        <textarea name="descricao" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-primary-color outline-none" placeholder="Detalhes da tarefa..."></textarea>
                    </div>
                    <x-category-card label="Estudos" task="estudo" />
                    <div>
                        <label class="block text-sm font-medium mb-1">Prazo da tarefa</label>
                        <input type="date" name="venc_date" class="border border-gray-300 p-2">
                        <p class="text-[10px] mt-2 text-gray-500">Caso não possua deixar em branco</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Tags</label>
                        <input type="text" name="tags" class="w-full border rounded-lg border-gray-300 p-2" placeholder="Separe as tags por &quot,&quot Ex: casa, urgente, joão">
                        <p class="text-[10px] mt-2 text-gray-500">Caso não possua deixar em branco</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Grupo</label>
                        <select name="grupo_id" id="grupo" class="w-full border rounded-lg border-gray-300 p-2">
                            <option value="">Nenhum grupo</option>
                            @forelse ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                            @empty
                                <option disabled>Sem Grupos Disponíveis</option>
                            @endforelse
                        </select>
                        <p class="text-[10px] mt-2 text-gray-500">Caso não possua deixar em branco</p>
                    </div>
                    <button type="submit" class="bg-primary-color text-white font-bold py-2 rounded-lg hover:bg-secondary-color transition-all">
                        Criar Tarefa
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal de Novo Grupo --}}
    <div x-show="modalGrupo" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="modalGrupo = false"></div>
        <div class="flex items-center justify-center min-h-screen p-8">
            <div x-show="modalGrupo" x-transition class="relative bg-white w-full max-w-md p-6 rounded-xl shadow-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Novo Grupo</h2>
                    <button @click="modalGrupo = false" class="text-gray-400 hover:text-black">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12" stroke-width="2"/></svg>
                    </button>
                </div>
                <form action="{{ route('grupos.create') }}" method="post" class="flex flex-col gap-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium mb-1">Nome do Grupo*</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 outline-none focus:ring-2 focus:ring-primary-color" placeholder="Ex: Trabalho, Faculdade..." required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Descrição</label>
                        <textarea name="desc" rows="3" class="w-full border border-gray-300 rounded-lg p-2 outline-none focus:ring-2 focus:ring-primary-color" placeholder="Resumos rápidos"></textarea>
                    </div>
                    <button type="submit" class="bg-primary-color text-white font-bold py-2 rounded-lg hover:bg-secondary-color transition-all">
                        Criar Grupo
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
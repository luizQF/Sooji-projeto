@props(['grupos'=>[]])      

@foreach ($grupos as $grupo)
    {{-- Adicionamos o x-data para controlar o estado (aberto/fechado) --}}
    <div class="mb-4" x-data="{ aberto: false }"> 
        {{-- Card --}}
        <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center justify-between bg-white">
           {{-- Atributos --}}
            <div class="flex items-center gap-3">
                
                <button 
                    @click="aberto = !aberto" 
                    class="text-gray-500 transition-transform duration-200"
                    :class="aberto ? 'rotate-90' : ''"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>

                </button>

                <div class="flex flex-col gap-2">
                    <p class="font-bold text-gray-700">{{ $grupo->name }}</p>
                </div> 
            </div>

            <div class="flex gap-4">
        
                <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-transform hover:scale-110 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Area das Tarefas com x-show e transição --}}
        <div 
            x-show="aberto" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="ml-6 mt-2 flex flex-col gap-2"
        >
            @forelse ($grupo->tarefas ?? [] as $tarefa)
                <x-task-card :tarefa="$tarefa">
                </x-task-card>
            @empty
                <p class="text-gray-400 text-sm italic">Nenhuma tarefa neste grupo.</p>
            @endforelse
        </div>
    </div>
@endforeach
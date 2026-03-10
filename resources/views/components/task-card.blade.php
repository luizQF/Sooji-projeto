@props(['situacao' => []])      
        
        @forelse ($situacao as $tarefa)
                 
                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center justify-between gap-4">
                        <div class="flex flex-col">
                            <h3 class="font-bold text-2xl capitalize">{{ $tarefa->name }}</h3>
                            <p class="text-sm text-grayText-color"><strong>Descrição:</strong> {{ $tarefa->descricao }}</p>
                            <p class="text-sm text-grayText-color"><strong> Vencimento: </strong> {{ $tarefa->venc_date ? date('d/m/Y', strtotime($tarefa->venc_date)) : "Sem prazo" }}</p>
                            <p class="text-sm text-grayText-color"><strong>Categoria:</strong> {{ $tarefa->categoria }}</p>
                        </div> 
                        <div class="flex gap-4">

                            @if($tarefa->situacaoAtual === "pendente")
                                <form action="{{ route('tarefas.check', $tarefa->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-gray-400 hover:text-green-600 transition-transform hover:scale-110 hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition-transform hover:scale-110 hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty

                <div>
                    <div class="rounded-lg p-4 shadow-sm border border-gray-200 flex items-center gap-4">
                        <div>
                            <h3 class="font-bold text-xl">Sem Tarefas</h3>
                            <p class="text-sm text-grayText-color">Termine uma <strong>tarefa</strong> para vizualizar.</p>
                        </div>
                    </div>
                </div>
    
        @endforelse
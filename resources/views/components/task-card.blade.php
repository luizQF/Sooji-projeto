@props(['tarefa'])      

    {{-- Lógica da cor label da tarefa --}}
    <?php
        $corFiltro = [
            'pendente'  => 'border-l-yellow-500',
            'vencido'   => 'border-l-red-500',
            'concluida' => 'border-l-green-500',
        ];
        $iconeDinamico = [
            'Estudos'   => '
                                M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5
                            ',

            'Pessoal'   => '
                                M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z
                            ',
                            
            'Trabalho'  => '
                                M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z
                            ',
        ];
        $cor = $corFiltro[$tarefa->situacaoAtual] ?? 'border-l-gray-600';
        $icone = $iconeDinamico[$tarefa->categoria] ?? "teste";
    ?>

    {{-- Card de Tarefas --}}
    <div class="mb-4"> <div class=" rounded-lg {{ $cor }} border-l-6 p-4 shadow-sm border border-gray-200 flex items-center justify-between">
            
            {{-- Atributos --}}
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-xl capitalize leading-tight">{{ $tarefa->name }}</h3>
                
                <p class="text-grayText-color">{{ $tarefa->descricao }}</p>
                <div class="flex items-center gap-3 mt-1 ">
                    <p class="flex text-sm text-blue-700 bg-blue-100  px-2 py-0.5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icone }}" />
                        </svg>

                        {{ $tarefa->categoria }}
                    </p>
                    <p class="flex text-sm px-2 py-0.5 rounded-lg"> 
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>

                        {{ $tarefa->venc_date ? date('d/m/Y', strtotime($tarefa->venc_date)) : "Sem prazo" }}
                        
                    </p>
                
                    @foreach (explode(',', $tarefa->tags) as $tag)
                        @if($tag)
                            <p class="flex text-sm text-gray-700 bg-gray-100 px-2 py-0.5 rounded-lg">#{{ $tag }}</p>
                        @endif
                    @endforeach
                </div>
            </div> 
            {{-- Ícones e lógica de concluído e deletado --}}
            <div class="flex gap-4">
                @if($tarefa->situacaoAtual === "pendente")
                    <form action="{{ route('tarefas.check', $tarefa->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-gray-400 hover:text-green-600 transition-transform hover:scale-110 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </form>
                @endif

                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
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
    </div>

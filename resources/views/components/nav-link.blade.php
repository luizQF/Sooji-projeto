@props(['route', 'label'])
@php
/**
 * Componente de navegação (recebe props Rota e label via x-nav-link)
 * faz a verificação pelas variaveis do ternarios caso esteja em uma rota ativa (ex home )
 * caso esteja ativo recebe uma classe para container e outra para o texto, caso contrário recebe outras classes para ambos
 */
$ativo = Route::is($route);

$containerClasses = $ativo ? 'border-b-secondary-color' : 'border-transparent';
$textClasses = $ativo 
        ? 'text-secondary-color' 
        : 'text-gray-600 hover:text-secondary-color';
@endphp

<div class="grow border-b-2 transition-all {{ $textClasses }} {{ $containerClasses }}">
    <a href="{{ route($route) }}" class="flex flex-col items-center justify-center mb-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mb-1">
            <!--Slot (funciona como um rascunho para o conteudo q irá ser inserido, nesse caso o SVG-->
            {{ $slot }}
        </svg>
        
        <!-- O label do link de navegação (nome do  menu) -->
        <span>{{ $label }}</span>
    </a>
</div>
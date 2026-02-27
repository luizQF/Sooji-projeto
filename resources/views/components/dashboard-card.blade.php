@props(['label'])
@php
  $dashColors = [
    'Tarefas' => 'bg-blue-500',
    'Concluídas' => 'bg-green-500',
    'Pendentes' => 'bg-yellow-500',
    'Produtividade' => 'bg-purple-500',
    'Vencidas' => 'bg-red-500',
  ];
  $dashColorSet = $dashColors[$label];
@endphp 

<div class="sm-max-w-[280px] mx-auto w-full sm:mx-0 md:max-w-none md:mx-none   rounded-2xl sm:p-5 p-3 flex flex-col justify-between shadow-sm border border-gray-200">

  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 {{ $dashColorSet }} sm:min-w-8 sm:min-h-8 p-1 rounded-lg shadow-sm text-white text-[clamp(0.875rem,1.2vw,1.25rem)]">
    {{ $slot }}
  </svg>

  <p class="text-[clamp(1.5rem,5vw,2.2rem)] font-bold mb-2 mt-2">{{ $slot }}</p>
  
  <p class="text-[clamp(0.875rem,1.2vw,1.25rem)] text-grayText-color font-thin">{{ $label }}</p>

</div>
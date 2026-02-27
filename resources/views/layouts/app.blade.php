<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooji - Bem Vindo</title>
    
    {{-- O Vite e as fontes ficam aqui no Layout --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/menu.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800&display=swap" rel="stylesheet">

</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">

    <!-- Header -->
    <header class="bg-primary-color text-white p-3 flex items-center justify-between mb-4">
        
        <a href="{{ route('home') }}">
                <h1 class="text-4xl font-bold hover:cursor-pointer select-none">Sooji</h1>
        </a>
        
        <a class="bg-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 hover:cursor-pointer" id="menu-toggle" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>

    </header>

    <!-- Menu de navegação -->
    <nav class="w-full flex border-b-gray-100 border-b font-bold text-sm ">
        
        <!--Dashboard-->
        <x-nav-link route="home" label="Dashboard">
                    
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />

        </x-nav-link>

        <!-- Tarefas -->
        <x-nav-link route="tarefas" label="Tarefas">

            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
           
        </x-nav-link>

        <!-- Calendário -->
        <x-nav-link route="calendario" label="Calendário">
          
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />

        </x-nav-link>

        <!-- Perfil -->
        <x-nav-link route="perfil" label="Perfil">
                
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                
        </x-nav-link>


    </nav>
    
    <main class="flex justify-center ">
        <section class="w-full h-full flex justify-center flex-col gap-4 p-7 rounded-lg  max-w-[75vw]">
        
        {{-- O conteúdo da página será "jogado" aqui --}}
            @yield('content')
            
        </section>
    </main>

    <footer>
    </footer>
</body>
</html>
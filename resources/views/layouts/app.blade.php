<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooji - @yield('title')</title>
    
    {{-- O Vite e as fontes ficam aqui no Layout --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/menu.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800&display=swap" rel="stylesheet">
</head>
<body class="font-sans text-gray-900 antialiased">

    <header class="bg-primary-color text-white p-5 flex items-center justify-between mb-4">
        <a href="{{ route('home') }}">
            <h1 class="text-4xl font-bold hover:cursor-pointer select-none">Sooji</h1>
        </a>
        
        <button class="bg-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2" id="menu-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </button>
    </header>

    <nav class="w-full">
        <div>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Dashboard
            </a>
        </div>
        
        <div>
            
            <a href="">Tarefas</a>
        </div>

        <div>
            <a href="">Calendário</a>
        </div>

        <div>
            <a href="">Perfil</a>
        </div>
    </nav>
    <main>
        {{-- O conteúdo da página será "jogado" aqui --}}
        @yield('content')
    </main>

    <footer>
    </footer>
</body>
</html>
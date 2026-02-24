<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooji - @yield('title')</title>
    
    {{-- O Vite e as fontes ficam aqui no Layout --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800&display=swap" rel="stylesheet">
</head>
<body class="font-sans text-gray-900 antialiased">
    <header class="bg-primary-color text-white p-10 flex items-center justify-between mb-4">
        <a href="{{ route('home') }}">
            <h1 class="text-5xl font-bold hover:cursor-pointer select-none">Sooji</h1>
        </a>
        <img class="w-12 h-12 rounded-full object-cover shadow-lg translate-y-1 hover:cursor-pointer select-none" src="{{ asset('images/header-ico.jpg') }}" alt="Logo do Sooji">
    </header>

    <main>
        {{-- O conteúdo da página será "jogado" aqui --}}
        @yield('content')
    </main>

    <footer>
        </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooji - Cadastro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/menu.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800&display=swap" rel="stylesheet">
</head>
<body class="h-screen w-screen font-sans text-gray-900 antialiased">
    <header class="bg-primary-color text-white p-3 flex items-center justify-between">
        <h1 class="text-4xl font-bold hover:cursor-pointer select-none">Sooji</h1>
    </header>

    <main class="flex items-center justify-center h-[calc(100vh-64px)]"> 
    
        <div class="flex flex-col ms-center p-10 min-h-fit items-center rounded-3xl shadow-md">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mb-2 bg-primary-color text-white rounded-full p-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>

            <h2 class="text-xl font-bold">Crie sua conta</h2>
            <p class="mb-4">Junte-se à comunidade Sooji</p>

            <form action="{{ route('cadastro.store') }}" method="POST">
                
                @csrf
                
                <div class="flex flex-col gap-2 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="border bg-white rounded p-2 w-80" placeholder="seu@email.com" required>
                </div>
                
                <div class="flex flex-col gap-2 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="border bg-white rounded p-2 w-80" placeholder=" ........" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirm_password" class="border bg-white rounded p-2 w-80" placeholder=" ........" required>
                </div>

                <button type="submit" class="w-[90%] text-white mx-auto flex items-center align-middle justify-center bg-secondary-color h-10 mt-8 rounded hover:cursor-pointer">
                    Cadastrar
                </button>
            
            </form>

            <a href="{{ route('login') }}" class="mt-4">Já possui Cadastro? <span class="text-blue-600 hover:underline">Clique Aqui</span></a>
        </div>

    </main>
</body>
</html>
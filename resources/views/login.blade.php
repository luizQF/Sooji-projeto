<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooji - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/menu.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800&display=swap" rel="stylesheet">
</head>
<body class="h-screen w-screen font-sans text-gray-900 antialiased">
        <!-- Header -->
    <header class="bg-primary-color text-white p-3 flex items-center justify-between">
            <h1 class="text-4xl font-bold hover:cursor-pointer select-none">Sooji</h1>
    </header>
    <main class=" flex items-center justify-center h-[calc(100vh-64px)]"> 
    
        <div class="flex flex-col ms-center p-10  h-[50%] items-center rounded-3xl shadow-md">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mb-2 bg-primary-color text-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
            </svg>

            <h2 class="text-xl font-bold">Bem-vindo de volta!</h2>
            <p class="mb-4">Entre na sua conta Sooji</p>
            <form action="{{ route('logar') }}" method="POST" class>
                
                @csrf
                
                <div class="flex flex-col gap-2 mb-3">
                    <label for="email" >Email</label>
                    <input type="email" name="email" id="email" class="border bg-white rounded p-2" placeholder="seu@email.com" required>
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="password" >Password</label>
                    <input type="password" name="password" id="password" class="border bg-white rounded p-2 w-80" placeholder=" ........" insert="test" required>
                </div>

                <button type="submit" class=" w-[90%] text-white m-5 flex items-center align-middle justify-center bg-secondary-color h-10 mt-5 rounded hover:cursor-pointer">
                    
                    Entrar
                </button>
            
            </form>
            <a href="{{ route('cadastro.index') }}" class="">Não tem conta? <span class="text-blue-600 hover:underline">Cadastre-se</span></span></a>
        </div>

    </main>
</body>
</html>
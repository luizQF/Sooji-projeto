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
<body class=" bg-gray-50 h-screen w-screen font-sans text-gray-900 antialiased">
        <!-- Header -->
    <header class="bg-primary-color text-white p-3 flex items-center justify-between">
            <h1 class="text-4xl font-bold hover:cursor-pointer select-none">Sooji</h1>
    </header>
    <main class=" flex items-center justify-center h-[calc(100vh-64px)]"> 
    
        <div class="flex flex-col bg-primary-color p-10 min-w-90 w-150 h-[50%] items-center rounded-3xl">
            
        <h1 class="text-5xl font-bold text-white mb-10">Sooji</h1>

            <form action="{{ route('cadastro.store') }}" method="POST" class>
                
                @csrf
                
                <div class="flex flex-col gap-2">
                    <label for="email" class="text-white">Email</label>
                    <input type="email" name="email" id="email" class="border bg-white rounded-2xl" required>
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="password" class="text-white">Password</label>
                    <input type="password" name="password" id="password" class="border bg-white rounded-2xl" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="confirm_password" class="text-white">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirm_password" class="border bg-white rounded-2xl" required>
                </div>

                <button type="submit" class=" w-50 text-white m-5 flex items-center align-middle justify-center bg-secondary-color h-10 mt-5 rounded-3xl hover:cursor-pointer">Cadastrar</button>

            </form>
             <a href="{{ route('login') }}" class="text-white hover:underline">Já possui Cadastro? Clique Aqui</a>
        </div>

    </main>
</body>
</html>
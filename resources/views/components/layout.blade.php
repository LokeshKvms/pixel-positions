<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Pos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@400;500;600&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-hgpse">
    
    <div class="px-10">
        
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="#">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>

            @auth
                <div class="flex space-x-6 font-bold">
                    <a href="/jobs/create">Post a Job</a>
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="cursor-pointer">Logout</button>
                    </form>
                </div>
            @endauth

            @guest()
            <div class="space-x-6 font-bold">
                <a href="/register">Sign up</a>
                <a href="/login">Login</a>
            </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto mb-10">
            {{ $slot }}
        </main>
    
    </div>
    
</body>
</html>
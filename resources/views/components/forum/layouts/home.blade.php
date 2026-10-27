<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de programación</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-purple-950 text-purple-100 font-sans min-h-screen flex flex-col selection:bg-orange-500 selection:text-white">
    
    <div class="flex flex-col min-h-screen">
        <header class="bg-purple-900/50 backdrop-blur-md border-b border-purple-800/50 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <x-forum.navbar />
            </div>
        </header>

        <div class="relative flex-1 flex items-center justify-center px-4 py-12 overflow-hidden">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu blur-3xl sm:-top-80">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-gradient-to-tr from-orange-500/20 to-purple-800/30 opacity-40 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>

            <div class="max-w-2xl text-center">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div class="rounded-full px-4 py-1.5 text-xs font-medium text-purple-200 border border-purple-700/50 bg-purple-900/40 shadow-sm">
                        Resuelve tus preguntas de programación. <a href="#" class="font-semibold text-orange-400 hover:text-orange-300 transition">Acerca de &rarr;</a>
                    </div>
                </div>
        
                <div class="space-y-6">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl drop-shadow-sm">
                        Bienvenido a tu foro favorito
                    </h1>                        
                    
                    <p class="text-base font-medium text-purple-300 sm:text-lg max-w-xl mx-auto leading-relaxed">
                        Es un espacio para compartir, aprender y crecer en el mundo de la programación. Únete a nuestra comunidad, participa en discusiones y aprende de otros profesionales.
                    </p>
                    
                    <div class="flex items-center justify-center gap-4 pt-2">
                        <a href="{{ route('questions.create') }}" class="rounded-lg bg-orange-600 hover:bg-orange-500 px-5 py-2.5 text-xs font-semibold text-white shadow-lg shadow-orange-600/20 cursor-pointer transition">
                            Preguntar
                        </a>
                        
                        @guest
                        <a href="{{ route('login') }}" class="text-xs font-bold text-purple-200 hover:text-orange-400 transition">
                            Login &rarr;
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-4xl w-full px-4 mb-12">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
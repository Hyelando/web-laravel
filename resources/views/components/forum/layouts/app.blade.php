<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de programación</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-purple-950 text-purple-100 font-sans min-h-screen flex flex-col selection:bg-orange-500 selection:text-white">
    
    <!-- Barra de navegación -->
    <div class="px-4 border-b border-purple-900/60 bg-purple-950/80 backdrop-blur-md sticky top-0 z-50">
        <x-forum.navbar />
    </div>
    
    <!-- Contenido principal -->
    <main class="mx-auto max-w-4xl w-full px-4 py-8 flex-1">
        {{ $slot }}
    </main>

</body>
</html>
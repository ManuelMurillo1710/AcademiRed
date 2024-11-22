<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col justify-between">
        <!-- Encabezado -->
        <header class="bg-purple-600 text-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Bienvenido a {{ config('app.name', 'Laravel') }}</h1>
                <nav>
                    <a href="{{ route('login') }}" class="bg-white text-purple-600 px-4 py-2 rounded-md shadow hover:bg-gray-100 mr-2">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="bg-purple-700 text-white px-4 py-2 rounded-md shadow hover:bg-purple-800">
                        Registrarse
                    </a>
                </nav>
            </div>
        </header>

        <!-- Sección principal -->
        <main class="flex-1">
            <div class="container mx-auto px-6 py-12 text-center">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                    Bienvenido a la Red Social del Colegio
                </h2>
                <p class="text-lg text-gray-600 mb-8">
                    Conecta con tus compañeros, profesores y padres en un entorno seguro y colaborativo.
                </p>
                <div class="flex justify-center">
                    <a href="{{ route('login') }}" class="bg-purple-600 text-white px-6 py-3 rounded-md shadow hover:bg-purple-700 mr-4">
                        Comienza Ahora
                    </a>
                    <a href="#features" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-md shadow hover:bg-gray-300">
                        Más Información
                    </a>
                </div>
            </div>
        </main>

        <!-- Características -->
        <section id="features" class="bg-white py-12">
            <div class="container mx-auto px-6">
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-6">Características</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                        <h4 class="text-xl font-semibold text-purple-600 mb-2">Conexión Segura</h4>
                        <p class="text-gray-600">Interactúa con confianza en una plataforma diseñada para proteger tus datos.</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                        <h4 class="text-xl font-semibold text-purple-600 mb-2">Gestión de Tareas</h4>
                        <p class="text-gray-600">Consulta y entrega tus tareas de manera organizada.</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                        <h4 class="text-xl font-semibold text-purple-600 mb-2">Eventos Escolares</h4>
                        <p class="text-gray-600">Mantente al tanto de las actividades y eventos del colegio.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto px-6 text-center">
                <p class="text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>


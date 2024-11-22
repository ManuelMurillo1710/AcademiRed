<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('AcademiRed') }}
            </h2>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                Nueva Publicación
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Grilla con las tarjetas de información -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Publicaciones recientes -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-gray-600 text-lg font-semibold">Publicaciones Recientes</h3>
                    <ul class="space-y-4 mt-4">
                        <li class="flex justify-between">
                            <p class="text-gray-700">El profesor de Matemáticas asignó tarea nueva.</p>
                            <span class="text-sm text-gray-500">Hace 2 horas</span>
                        </li>
                        <li class="flex justify-between">
                            <p class="text-gray-700">Nueva reunión de padres este viernes.</p>
                            <span class="text-sm text-gray-500">Hace 1 día</span>
                        </li>
                    </ul>
                </div>

                <!-- Tareas pendientes -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-gray-600 text-lg font-semibold">Tareas Pendientes</h3>
                    <ul class="space-y-4 mt-4">
                        <li class="flex justify-between">
                            <p class="text-gray-700">Matemáticas: Resolver ejercicios de la página 45.</p>
                            <span class="text-sm text-gray-500">Fecha: 23/11/2024</span>
                        </li>
                        <li class="flex justify-between">
                            <p class="text-gray-700">Historia: Preparar presentación sobre la Edad Media.</p>
                            <span class="text-sm text-gray-500">Fecha: 25/11/2024</span>
                        </li>
                    </ul>
                </div>

                <!-- Eventos próximos -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-gray-600 text-lg font-semibold">Eventos Próximos</h3>
                    <ul class="space-y-4 mt-4">
                        <li class="flex justify-between">
                            <p class="text-gray-700">Reunión de Padres y Profesores</p>
                            <span class="text-sm text-gray-500">25/11/2024, 18:00</span>
                        </li>
                        <li class="flex justify-between">
                            <p class="text-gray-700">Excursión a la biblioteca</p>
                            <span class="text-sm text-gray-500">27/11/2024, 09:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sección de Publicar algo (similar a redes sociales) -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">¿Qué está pasando?</h3>
                <textarea class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" rows="4" placeholder="Escribe algo..."></textarea>
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">Publicar</button>
                </div>
            </div>

            <!-- Notificaciones -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Notificaciones</h3>
                <ul class="space-y-4">
                    <li class="flex justify-between">
                        <p class="text-gray-700">Nuevo mensaje en el foro de Matemáticas.</p>
                        <span class="text-sm text-gray-500">Hace 3 horas</span>
                    </li>
                    <li class="flex justify-between">
                        <p class="text-gray-700">Tu tarea de Historia ha sido calificada.</p>
                        <span class="text-sm text-gray-500">Hace 1 día</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>



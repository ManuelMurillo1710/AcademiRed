@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">
    <div class="container mx-auto px-6">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-blue-600 text-white text-xl font-semibold p-4">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="p-6">
                        @if (session('status'))
                            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-gray-800 text-lg">
                            {{ __('You are logged in!') }}
                        </p>

                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('What would you like to do today?') }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Acción 1 -->
                                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                                    <h4 class="text-lg font-semibold">Publicar algo</h4>
                                    <p class="text-gray-200">Comparte tus pensamientos o actividades con la comunidad.</p>
                                    <button class="bg-white text-blue-500 hover:bg-gray-200 mt-4 px-4 py-2 rounded-lg">Publicar</button>
                                </div>
                                <!-- Acción 2 -->
                                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                                    <h4 class="text-lg font-semibold">Ver Tareas</h4>
                                    <p class="text-gray-200">Consulta tus tareas pendientes y fechas de entrega.</p>
                                    <button class="bg-white text-green-500 hover:bg-gray-200 mt-4 px-4 py-2 rounded-lg">Ver Tareas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

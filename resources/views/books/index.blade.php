@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center py-10">
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Gestión de Libros</h1>

        <!-- Tabla de CRUD -->
        <table class="min-w-full table-auto bg-gray-100 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Título</th>
                    <th class="px-6 py-3 text-left">Autor</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr class="border-b hover:bg-gray-200">
                    <td class="px-6 py-4">{{ $book->id }}</td>
                    <td class="px-6 py-4">{{ $book->title }}</td>
                    <td class="px-6 py-4">{{ $book->author }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('books.edit', $book) }}" class="text-blue-600 hover:underline">Editar</a> |
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Lista de Carreras</h1>
    <a href="{{ route('carreras.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nueva Carrera
    </a>
</div>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="p-3">#</th>
            <th class="p-3">Nombre</th>
            <th class="p-3">Clave</th>
            <th class="p-3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($carreras as $carrera)
        <tr class="border-t">
            <td class="p-3">{{ $carrera->id }}</td>
            <td class="p-3">{{ $carrera->nombre }}</td>
            <td class="p-3">{{ $carrera->clave }}</td>
            <td class="p-3 flex gap-2">
                <a href="{{ route('carreras.edit', $carrera) }}"
                   class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                    Editar
                </a>
                <form action="{{ route('carreras.destroy', $carrera) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar esta carrera?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="p-4 text-center text-gray-500">No hay carreras registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
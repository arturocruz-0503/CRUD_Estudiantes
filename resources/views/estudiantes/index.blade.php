@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nuevo Estudiante
    </a>
</div>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="p-3">#</th>
            <th class="p-3">Nombre</th>
            <th class="p-3">Correo</th>
            <th class="p-3">Carrera</th>
            <th class="p-3">Semestre</th>
            <th class="p-3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($estudiantes as $estudiante)
        <tr class="border-t">
            <td class="p-3">{{ $estudiante->id }}</td>
            <td class="p-3">{{ $estudiante->nombre }}</td>
            <td class="p-3">{{ $estudiante->correo }}</td>
            <td class="p-3">{{ $estudiante->carrera->nombre ?? '—' }}</td>
            <td class="p-3">{{ $estudiante->semestre }}</td>
            <td class="p-3 flex gap-2">
                <a href="{{ route('estudiantes.edit', $estudiante) }}"
                   class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                    Editar
                </a>
                <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar este estudiante?')">
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
            <td colspan="6" class="p-4 text-center text-gray-500">No hay estudiantes registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Registrar Estudiante</h1>

<form action="{{ route('estudiantes.store') }}" method="POST"
      class="bg-white shadow rounded p-6 space-y-4 max-w-lg">
    @csrf

    <div>
        <label class="block font-medium mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
        <label class="block font-medium mb-1">Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
        <label class="block font-medium mb-1">Carrera</label>
        <select name="carrera_id"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option value="">-- Selecciona una carrera --</option>
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                    {{ $carrera->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium mb-1">Semestre</label>
        <input type="number" name="semestre" value="{{ old('semestre') }}" min="1" max="12"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="flex gap-3">
        <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Guardar
        </button>
        <a href="{{ route('estudiantes.index') }}"
           class="bg-gray-300 text-gray-700 px-5 py-2 rounded hover:bg-gray-400">
            Cancelar
        </a>
    </div>
</form>
@endsection
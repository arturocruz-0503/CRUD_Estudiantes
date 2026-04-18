@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Registrar Carrera</h1>

<form action="{{ route('carreras.store') }}" method="POST"
      class="bg-white shadow rounded p-6 space-y-4 max-w-lg">
    @csrf

    <div>
        <label class="block font-medium mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
        <label class="block font-medium mb-1">Clave</label>
        <input type="text" name="clave" value="{{ old('clave') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="flex gap-3">
        <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Guardar
        </button>
        <a href="{{ route('carreras.index') }}"
           class="bg-gray-300 text-gray-700 px-5 py-2 rounded hover:bg-gray-400">
            Cancelar
        </a>
    </div>
</form>
@endsection
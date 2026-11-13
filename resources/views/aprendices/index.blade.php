@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
<div class="space-y-6">
    <!-- Header & Actions Toolbar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Listado de Aprendices</h1>
            <p class="text-sm text-gray-500">Gestione los aprendices registrados en el sistema ADSO.</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('aprendices.create') }}" class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                + Nuevo aprendiz
            </a>
        </div>
    </div>

    <!-- Search Toolbar -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <form action="{{ route('aprendices.index') }}" method="GET" class="flex items-center gap-3 w-full sm:w-auto flex-1">
            <input
                type="text"
                name="q"
                value="{{ $q }}"
                placeholder="Buscar por nombre o documento..."
                class="w-full sm:w-80 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border py-2 px-3"
            >
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                Buscar
            </button>

            @if ($q !== '')
                <a href="{{ route('aprendices.index') }}" class="text-sm text-gray-600 hover:text-gray-900 font-medium">
                    Limpiar
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Documento</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Correo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Ficha</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($aprendices as $aprendiz)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $aprendiz->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $aprendiz->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aprendiz->documento }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aprendiz->correo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-50 text-indigo-700">
                                    {{ $aprendiz->ficha_id ?? 'Sin ficha' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                <a href="{{ route('aprendices.edit', $aprendiz) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>

                                <form action="{{ route('aprendices.destroy', $aprendiz) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar este aprendiz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-sm">
                                No se encontraron aprendices registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($aprendices->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $aprendices->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

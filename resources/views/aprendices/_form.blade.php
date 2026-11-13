@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg shadow-sm">
        <strong class="text-sm font-semibold text-red-800">Se encontraron algunos errores:</strong>
        <ul class="mt-2 list-disc list-inside text-sm text-red-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf

<div class="space-y-4">
    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo:</label>
        <input
            id="nombre"
            type="text"
            name="nombre"
            value="{{ old('nombre', $aprendiz->nombre) }}"
            maxlength="120"
            required
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border"
        >
    </div>

    <div>
        <label for="documento" class="block text-sm font-medium text-gray-700 mb-1">Número de Documento:</label>
        <input
            id="documento"
            type="text"
            name="documento"
            value="{{ old('documento', $aprendiz->documento) }}"
            maxlength="40"
            required
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border"
        >
    </div>

    <div>
        <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico:</label>
        <input
            id="correo"
            type="email"
            name="correo"
            value="{{ old('correo', $aprendiz->correo) }}"
            maxlength="120"
            required
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border"
        >
    </div>

    <div>
        <label for="ficha_id" class="block text-sm font-medium text-gray-700 mb-1">Número de Ficha:</label>
        <input
            id="ficha_id"
            type="number"
            name="ficha_id"
            value="{{ old('ficha_id', $aprendiz->ficha_id) }}"
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border"
        >
    </div>

    <div class="pt-4 flex items-center space-x-4">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
            {{ $buttonText ?? 'Guardar' }}
        </button>
        <a href="{{ route('aprendices.index') }}" class="text-sm text-gray-600 hover:text-gray-900 transition">
            Cancelar
        </a>
    </div>
</div>

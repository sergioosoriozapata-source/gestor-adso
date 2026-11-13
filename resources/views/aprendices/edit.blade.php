@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Editar Aprendiz</h1>
        <p class="text-sm text-gray-500 mt-1">Actualice la información del aprendiz seleccionado.</p>
    </div>

    <form action="{{ route('aprendices.update', $aprendiz) }}" method="POST">
        @method('PUT')

        @include('aprendices._form', [
            'aprendiz' => $aprendiz,
            'buttonText' => 'Actualizar aprendiz',
        ])
    </form>
</div>
@endsection

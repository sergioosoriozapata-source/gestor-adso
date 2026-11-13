@extends('layouts.app')

@section('title', 'Crear Aprendiz')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Registrar Nuevo Aprendiz</h1>
        <p class="text-sm text-gray-500 mt-1">Complete los datos requeridos para registrar un nuevo aprendiz en el sistema.</p>
    </div>

    <form action="{{ route('aprendices.store') }}" method="POST">
        @include('aprendices._form', [
            'aprendiz' => $aprendiz,
            'buttonText' => 'Guardar aprendiz',
        ])
    </form>
</div>
@endsection

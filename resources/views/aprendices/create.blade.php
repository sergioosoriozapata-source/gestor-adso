@extends('layouts.app')

@section('title','Nuevo Aprendiz')

@section('content')

<div class="card" style="max-width:700px">
    <div class="card-header">
        <div>
            <h1 class="page-title">Nuevo Aprendiz</h1>
            <p class="page-subtitle">Completa los datos para registrar un aprendiz</p>
        </div>
        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form method="POST" action="{{ route('aprendices.store') }}" style="padding:24px">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label class="required">Nombre completo</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" placeholder="Juan Pérez García">
                @error('nombre')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Documento</label>
                <input type="text" name="documento" value="{{ old('documento') }}" required autocomplete="off" placeholder="1234567890">
                @error('documento')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="required">Correo electrónico</label>
                <input type="email" name="correo" value="{{ old('correo') }}" required autocomplete="email" placeholder="juan@ejemplo.com">
                @error('correo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Ficha (opcional)</label>
                <input type="number" name="ficha_id" value="{{ old('ficha_id') }}" min="1" placeholder="2693627">
                @error('ficha_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Guardar aprendiz</button>
            <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@endsection
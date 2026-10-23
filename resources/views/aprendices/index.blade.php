@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Listado de Aprendices</h2>
        <a href="{{ route('aprendices.create') }}" class="btn btn-primary">+ Nuevo aprendiz</a>
    </div>

    <div class="card-body">
        <form method="GET" action="{{ route('aprendices.index') }}" class="search-form" style="padding:20px;border-bottom:1px solid #e9ecef">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar nombre, documento o correo...">
            <button type="submit" class="btn btn-primary">Buscar</button>
            @if($search ?? false)
                <a href="{{ route('aprendices.index') }}" class="btn btn-outline">Limpiar</a>
            @endif
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Ficha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aprendices as $aprendiz)
                <tr>
                    <td style="color:#6c757d;font-size:.9rem">{{ $aprendiz->id }}</td>
                    <td style="font-weight:500">{{ $aprendiz->nombre }}</td>
                    <td style="font-family:monospace;font-size:.9rem">{{ $aprendiz->documento }}</td>
                    <td>{{ $aprendiz->correo }}</td>
                    <td style="color:#6c757d">{{ $aprendiz->ficha_id ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty">No hay aprendices registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($aprendices->hasPages())
    <div class="card-footer">
        {{ $aprendices->links() }}
    </div>
    @endif
</div>

@endsection
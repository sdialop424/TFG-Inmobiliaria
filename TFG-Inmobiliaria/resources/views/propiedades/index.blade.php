@extends('layouts.app')

@section('title', 'Propiedades — ComunIpanema')

@section('content')
<div class="page-header">
    <h1 class="page-title"><i class="fas fa-home"></i> Propiedades</h1>
    <p class="page-subtitle">Gestiona todas las propiedades del sistema</p>
</div>

<div style="margin-bottom: 24px; display: flex; gap: 12px; flex-wrap: wrap;">
    @if($info['mostrarBotones'] ?? false)
        <a href="{{ route('propiedades.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Propiedad
        </a>
    @endif
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Propiedades</h3>
    </div>
    <div class="card-body">
        @if($propiedades->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Dirección</th>
                        <th>Propietario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($propiedades as $propiedad)
                    <tr>
                        <td>{{ $propiedad->direccion }}</td>
                        <td>{{ $propiedad->usuario->nombre }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('propiedades.show', $propiedad) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($info['mostrarBotones'] ?? false)
                                    <a href="{{ route('propiedades.edit', $propiedad) }}" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('propiedades.destroy', $propiedad) }}" method="POST" class="form-eliminar" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 16px; display: flex; justify-content: flex-end;">
                {{ $propiedades->links() }}
            </div>
        @else
        <div style="text-align: center; padding: 48px 24px;">
            <div style="font-size: 48px; color: var(--primary); margin-bottom: 16px; opacity: 0.5;">
                <i class="fas fa-home"></i>
            </div>
            <p style="color: var(--text-muted); margin-bottom: 24px;">No hay propiedades registradas</p>
            @if($info['mostrarBotones'] ?? false)
                <a href="{{ route('propiedades.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Crear la primera propiedad
                </a>
            @endif
        </div>
        @endif
    </div>
</div>

@endsection


@extends('layouts.app')

@section('title', 'Incidencias — ComunIpanema')

@section('content')
<div class="page-header">
    <h1 class="page-title"><i class="fas fa-exclamation-circle"></i> Incidencias</h1>
    <p class="page-subtitle">Gestiona todas las incidencias del sistema</p>
</div>

<div style="margin-bottom: 24px; display: flex; gap: 12px; flex-wrap: wrap;">
    <a href="{{ route('incidencias.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nueva Incidencia
    </a>
</div>

<form method="GET" action="{{ route('incidencias.index') }}" style="margin-bottom: 24px;">
    <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
        <select name="tipo" onchange="this.form.submit()">
            <option value="">Todos los tipos</option>
            <option value="Reparación" {{ request('tipo') == 'Reparación' ? 'selected' : '' }}>Reparación</option>
            <option value="Mantenimiento" {{ request('tipo') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
            <option value="Limpieza" {{ request('tipo') == 'Limpieza' ? 'selected' : '' }}>Limpieza</option>
        </select>
        <select name="estado" onchange="this.form.submit()">
            <option value="">Todos los estados</option>
            <option value="PENDIENTE" {{ request('estado') == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
            <option value="EN PROGRESO" {{ request('estado') == 'EN PROGRESO' ? 'selected' : '' }}>EN PROGRESO</option>
            <option value="RESUELTO" {{ request('estado') == 'RESUELTO' ? 'selected' : '' }}>RESUELTO</option>
        </select>
        <input type="date" name="fecha" value="{{ request('fecha') }}" onchange="this.form.submit()">
        @if(request('tipo') || request('estado') || request('fecha'))
            <a href="{{ route('incidencias.index') }}" class="btn btn-sm btn-outline">Limpiar filtros</a>
        @endif
    </div>
</form>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Incidencias</h3>
    </div>
    <div class="card-body">
        @if($incidencias->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Descripcion</th>
                        <th>Propiedad</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidencias as $incidencia)
                    <tr>
                        <td style="font-weight: 500;">{{ $incidencia->descripcion }}</td>
                        <td>{{ $incidencia->propiedad->direccion ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-secondary">{{ $incidencia->tipoIncidencia->nombre ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="badge badge-{{ strtolower($incidencia->estadoIncidencia->nombre ?? 'pendiente') }}">
                                {{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}
                            </span>
                        </td>
                        <td style="font-size: 13px; color: var(--text-muted);">{{ $incidencia->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('incidencias.show', $incidencia) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('incidencias.edit', $incidencia) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('incidencias.destroy', $incidencia) }}" method="POST" class="form-eliminar" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 16px; display: flex; justify-content: flex-end;">
                {{ $incidencias->links('vendor.pagination.custom') }}
            </div>
        @else
        <div style="text-align: center; padding: 48px 24px;">
            <div style="font-size: 48px; color: var(--primary); margin-bottom: 16px; opacity: 0.5;">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <p style="color: var(--text-muted); margin-bottom: 24px;">Necesitas propiedades registradas para crear incidencias.</p>
            </a>
        </div>
        @endif
    </div>
</div>

@endsection


@extends('layouts.app')

@section('title', 'Propiedad — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('propiedades.index') }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-home"></i> {{ $propiedad->direccion }}</h1>
    <p class="page-subtitle">Propiedad asignada a {{ $propiedad->usuario->nombre ?? 'N/A' }}</p>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <div class="card">
       
        <div class="card-body">
            <table class="table" style="border: none;">
                <tbody>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Dirección</td>
                        <td style="border: none; padding: 12px 0;">{{ $propiedad->direccion }}</td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Propietario</td>
                        <td style="border: none; padding: 12px 0;">{{ $propiedad->usuario->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Tipo</td>
                        <td style="border: none; padding: 12px 0;">
                            <span class="badge badge-primary">{{ $propiedad->tipoPropiedad->nombre ?? 'N/A' }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div style="margin-top: 24px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Incidencias Relacionadas</h3>
             <div style="display:flex; justify-content:flex-end;">
                <a href="{{ route('incidencias.create', ['propiedad_id' => $propiedad->id]) }}" class="btn btn-secondary" style="justify-content: center;">
                    <i class="fas fa-plus"></i> Crear Incidencia
                </a>
        </div>
        </div>
        <div class="card-body">
            @if($propiedad->incidencias->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($propiedad->incidencias as $incidencia)
                    <tr>

                        <td><span class="badge badge-secondary">{{ $incidencia->tipoIncidencia->nombre ?? 'N/A' }}</span></td>
                        <td><span class="badge badge-{{ strtolower($incidencia->estadoIncidencia->nombre ?? 'pendiente') }}">{{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}</span></td>
                        <td style="font-size: 13px; color: var(--text-muted);">{{ $incidencia->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('incidencias.show', $incidencia) }}" class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('incidencias.edit', $incidencia) }}" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('incidencias.destroy', $incidencia) }}" method="POST" class="form-eliminar" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div style="text-align: center; padding: 24px; color: var(--text-muted);">
                <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 8px; display: block; opacity: 0.5;"></i>
                No hay incidencias registradas para esta propiedad
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

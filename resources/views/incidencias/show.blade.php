@extends('layouts.app')

@section('title', 'Incidencia — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('incidencias.index') }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
   
    <p class="page-subtitle">Detalles de la incidencia</p>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información de la Incidencia</h3>
        </div>
        <div class="card-body">
            <table class="table" style="border: none;">
                <tbody>
                     <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Propiedad</td>
                        <td style="border: none; padding: 12px 0;">
                            <a href="{{ route('propiedades.show', $incidencia->propiedad) }}" style="color: var(--primary); text-decoration: none;">
                                {{ $incidencia->propiedad->direccion ?? 'N/A' }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Tipo</td>
                        <td style="border: none; padding: 12px 0;">
                            <span class="badge badge-secondary">{{ $incidencia->tipoIncidencia->nombre ?? 'N/A' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Estado</td>
                        <td style="border: none; padding: 12px 0;">
                            <span class="badge badge-{{ strtolower($incidencia->estadoIncidencia->nombre ?? 'pendiente') }}">{{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Prioridad</td>
                        <td style="border: none; padding: 12px 0;">
                            @if($incidencia->prioridad == 'alta')
                                <span class="badge badge-danger">{{ ucfirst($incidencia->prioridad ?? 'N/A') }}</span>
                            @elseif($incidencia->prioridad == 'media')
                                <span class="badge badge-warning">{{ ucfirst($incidencia->prioridad ?? 'N/A') }}</span>
                            @else
                                <span class="badge badge-primary">{{ ucfirst($incidencia->prioridad ?? 'Baja') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Fecha Creación</td>
                        <td style="border: none; padding: 12px 0; font-size: 13px; color: var(--text-muted);">{{ $incidencia->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @if($incidencia->descripcion)
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary); vertical-align: top;">Descripción</td>
                        <td style="border: none; padding: 12px 0;">{{ $incidencia->descripcion }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
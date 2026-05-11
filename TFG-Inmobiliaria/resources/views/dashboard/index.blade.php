
@extends('layouts.app')

@section('title', 'Dashboard — ComunIpanema')

@section('content')
<div class="page-header">
    <h1 class="page-title"><i class="fas fa-chart-line"></i> Dashboard</h1>
    <p class="page-subtitle">Bienvenido de nuevo, {{ auth()->user()->nombre }}</p>
</div>

<div class="grid grid-4">
    <div class="card">
        <div class="card-body">
            <div style="text-align: center;">
                <div style="font-size: 32px; color: var(--primary); margin-bottom: 8px;">
                    <i class="fas fa-home"></i>
                </div>
                <div style="font-size: 24px; font-weight: 700; margin-bottom: 4px;">
                    {{ $propiedades_count ?? 0 }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.3px;">
                    Propiedades
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="text-align: center;">
                <div style="font-size: 32px; color: #10b981; margin-bottom: 8px;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div style="font-size: 24px; font-weight: 700; margin-bottom: 4px;">
                    {{ $incidencias_resueltas ?? 0 }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.3px;">
                    Incidencias Resueltas
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="text-align: center;">
                <div style="font-size: 32px; color: #f59e0b; margin-bottom: 8px;">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div style="font-size: 24px; font-weight: 700; margin-bottom: 4px;">
                    {{ $incidencias_pendientes ?? 0 }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.3px;">
                    Incidencias Pendientes
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 32px; display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 24px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ request('show_all') ? 'Todas las Incidencias' : 'Últimas Incidencias' }}</h3>

        
            @if(!request('show_all'))
                <a href="{{ route('dashboard.index', ['show_all' => 1]) }}" class="btn btn-sm btn-outline">Ver todas</a>
            @else
                <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-outline">Ver últimas</a>
            @endif
        </div>
        <div class="card-body">
            @if($ultimas_incidencias->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Propiedad</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimas_incidencias as $incidencia)
                    <tr>
                        <td>{{ $incidencia->propiedad->direccion ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-{{ strtolower($incidencia->estadoIncidencia->nombre ?? 'pendiente') }}">
                                {{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}
                            </span>
                        </td>
                        <td>{{ $incidencia->descripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div style="text-align: center; padding: 24px; color: var(--text-muted);">
                <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 8px; display: block; opacity: 0.5;"></i>
                No hay incidencias registradas
            </div>
            @endif
        </div>
    </div>
</div>

@endsection


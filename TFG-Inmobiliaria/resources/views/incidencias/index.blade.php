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
                        <th>Tipo
                            <select id="typeFilter" class="filter-select">
                                <option value="">Todos</option>
                                <option value="Reparación">Reparación</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Limpieza">Limpieza</option>
                            </select>
                        </th>
                        <th>Estado
                            <select id="statusFilter" class="filter-select">
                                <option value="">Todos</option>
                                <option value="PENDIENTE">Pendiente</option>
                                <option value="EN PROGRESO">En progreso</option>
                                <option value="RESUELTA">Resuelta</option>
                            </select>
                        </th>
                        <th>Fecha
                            <input type="date" id="dateFilter" class="filter-input">
                        </th>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeFilter = document.getElementById('typeFilter');
        const statusFilter = document.getElementById('statusFilter');
        const dateFilter = document.getElementById('dateFilter');
        const tableRows = document.querySelectorAll('.card-body table tbody tr');

        function normalizeText(text) {
            return text.trim().replace(/\s+/g, ' ').toUpperCase();
        }

        function filterIncidencias() {
            const selectedType = normalizeText(typeFilter.value || '');
            const selectedStatus = normalizeText(statusFilter.value || '');
            const selectedDate = dateFilter.value;

            tableRows.forEach(row => {
                const columns = row.querySelectorAll('td');
                const typeText = normalizeText(columns[2]?.textContent || '');
                const statusText = normalizeText(columns[3]?.textContent || '');
                const dateText = (columns[4]?.textContent || '').trim();
                const formattedDate = dateText ? dateText.split(' ')[0].split('/').reverse().join('-') : '';

                const matchesType = !selectedType || typeText === selectedType;
                const matchesStatus = !selectedStatus || statusText === selectedStatus;
                const matchesDate = !selectedDate || formattedDate === selectedDate;

                row.style.display = (matchesType && matchesStatus && matchesDate) ? '' : 'none';
            });
        }

        typeFilter.addEventListener('change', filterIncidencias);
        statusFilter.addEventListener('change', filterIncidencias);
        dateFilter.addEventListener('change', filterIncidencias);
    });
</script>
@endsection
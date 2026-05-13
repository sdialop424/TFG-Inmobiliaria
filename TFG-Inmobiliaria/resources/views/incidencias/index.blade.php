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
        <div class="responsive-table-wrap">
            <table class="table responsive-incidencias">
                <thead>
                    <tr>
                        <th class="col-desc">Descripción</th>
                        <th class="col-prop">Propiedad</th>
                        <th class="optional-col col-tipo">Tipo</th>
                        <th class="optional-col col-estado">Estado</th>
                        <th class="optional-col col-fecha">Fecha</th>
                        <th class="col-actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidencias as $incidencia)
                    <tr class="inc-row">
                        <td class="col-desc">{{ $incidencia->descripcion }}</td>
                        <td class="col-prop">{{ $incidencia->propiedad->direccion ?? 'N/A' }}</td>
                        <td class="optional-col">
                            <span class="badge badge-secondary">{{ $incidencia->tipoIncidencia->nombre ?? 'N/A' }}</span>
                        </td>
                        <td class="optional-col">
                            <span class="badge badge-{{ strtolower($incidencia->estadoIncidencia->nombre ?? 'pendiente') }}">{{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}</span>
                        </td>
                        <td class="optional-col">{{ $incidencia->created_at->format('d/m/Y H:i') }}</td>
                        <td class="col-actions">
                            <button class="accordion-btn">▼</button>
                        </td>
                    </tr>
                    <tr class="accordion-content">
                        <td colspan="6">
                            <div class="accordion-box">
                                <div class="accordion-grid">
                                    <strong>Tipo:</strong>
                                    <span>{{ $incidencia->tipoIncidencia->nombre ?? 'N/A' }}</span>
                                    <strong>Estado:</strong>
                                    <span>{{ $incidencia->estadoIncidencia->nombre ?? 'N/A' }}</span>
                                    <strong>Fecha:</strong>
                                    <span>{{ $incidencia->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="accordion-actions">
                                    <a href="{{ route('incidencias.show', $incidencia) }}" class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('incidencias.edit', $incidencia) }}" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('incidencias.destroy', $incidencia) }}" method="POST" class="form-eliminar" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

        if (typeFilter) typeFilter.addEventListener('change', filterIncidencias);
        if (statusFilter) statusFilter.addEventListener('change', filterIncidencias);
        if (dateFilter) dateFilter.addEventListener('change', filterIncidencias);
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.inc-row');
    
    rows.forEach(row => {
        const button = row.querySelector('.accordion-btn');
        const accordion = row.nextElementSibling;
        
        const toggleAccordion = () => {
            accordion.classList.toggle('active');
            button.textContent = accordion.classList.contains('active') ? '▲' : '▼';
        };
        
        button.addEventListener('click', toggleAccordion);
        row.addEventListener('click', (e) => {
            if (e.target !== button) toggleAccordion();
        });
    });
});
</script>
@endsection
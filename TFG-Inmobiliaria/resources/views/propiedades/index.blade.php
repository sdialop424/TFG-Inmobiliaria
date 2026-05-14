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
        <div class="responsive-table-wrap">
            <table class="table responsive-incidencias">
                <thead>
                    <tr>
                        <th class="col-desc">Dirección</th>
                        <th class="col-prop">Propietario</th>
                        <th class="col-actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($propiedades as $propiedad)
                    <tr class="inc-row">
                        <td class="col-desc">{{ $propiedad->direccion }}</td>
                        <td class="col-prop">{{ $propiedad->usuario->nombre }}</td>
                        <td class="col-actions">
                            <div class="desktop-actions action-buttons">
                                <a href="{{ route('propiedades.show', $propiedad) }}" class="btn btn-sm btn-outline" title="Ver"><i class="fas fa-eye"></i></a>
                                @if($info['mostrarBotones'] ?? false)
                                    <a href="{{ route('propiedades.edit', $propiedad) }}" class="btn btn-sm btn-outline" title="Editar"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('propiedades.destroy', $propiedad) }}" method="POST" class="form-eliminar inline-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </div>
                            <button class="accordion-btn mobile-toggle">▼</button>
                        </td>
                    </tr>
                    <tr class="accordion-content" style="display:none;">
                        <td colspan="3">
                            <div class="accordion-box">
                                <div class="accordion-grid">
                                    <strong>Dirección:</strong>
                                    <span>{{ $propiedad->direccion }}</span>
                                    <strong>Propietario:</strong>
                                    <span>{{ $propiedad->usuario->nombre }}</span>
                                </div>
                                <div class="accordion-actions">
                                    <a href="{{ route('propiedades.show', $propiedad) }}" class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></a>
                                    @if($info['mostrarBotones'] ?? false)
                                        <a href="{{ route('propiedades.edit', $propiedad) }}" class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('propiedades.destroy', $propiedad) }}" method="POST" class="form-eliminar" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div style="margin-top: 16px; display: flex; justify-content: flex-end;">
                {{ $propiedades->links('vendor.pagination.custom') }}
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.inc-row');
    const mobileToggleButtons = document.querySelectorAll('.accordion-btn.mobile-toggle');
    const desktopActionGroups = document.querySelectorAll('.desktop-actions');

    const updateToggleVisibility = () => {
        const showMobileToggle = window.innerWidth <= 900;
        mobileToggleButtons.forEach(btn => {
            btn.style.display = showMobileToggle ? 'inline-block' : 'none';
        });
        desktopActionGroups.forEach(group => {
            group.style.display = showMobileToggle ? 'none' : 'flex';
        });
    };

    updateToggleVisibility();
    window.addEventListener('resize', updateToggleVisibility);
    
    rows.forEach(row => {
        const button = row.querySelector('.accordion-btn.mobile-toggle');
        const accordion = row.nextElementSibling;
        
        const toggleAccordion = () => {
            if (!button || window.innerWidth > 900) return;
            accordion.classList.toggle('active');
            button.textContent = accordion.classList.contains('active') ? '▲' : '▼';
        };
        
        if (button) {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                toggleAccordion();
            });
        }

        row.addEventListener('click', (e) => {
            if (window.innerWidth <= 900 && e.target !== button) toggleAccordion();
        });
    });
});
</script>
@endsection


@extends('layouts.app')

@section('title', 'Nueva Propiedad — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('propiedades.index') }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-plus-circle"></i> Nueva Propiedad</h1>
    <p class="page-subtitle">Completa los datos para registrar una nueva propiedad</p>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 24px; max-width: 800px;">
    <div class="card">
        <form action="{{ route('propiedades.store') }}" method="POST" novalidate>
            @csrf

            <div class="form-group">
                <label class="form-label" for="direccion">Dirección *</label>
                <input type="text" id="direccion" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" value="{{ old('direccion') }}" required>
                @error('direccion') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label class="form-label" for="tipo_propiedad_id">Tipo de Propiedad *</label>
                    <select id="tipo_propiedad_id" name="tipo_propiedad_id" class="form-select {{ $errors->has('tipo_propiedad_id') ? 'is-invalid' : '' }}" required>
                        <option value="">Selecciona un tipo</option>
                        @forelse($tiposPropiedad as $tipo)
                            <option value="{{ $tipo->id }}" {{ old('tipo_propiedad_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                        @empty
                            <option disabled>No hay tipos disponibles</option>
                        @endforelse
                    </select>
                    @error('tipo_propiedad_id') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="usuario_id">Propietario *</label>
                    <select id="usuario_id" name="usuario_id" class="form-select {{ $errors->has('usuario_id') ? 'is-invalid' : '' }}" required>
                        <option value="">Selecciona un usuario</option>
                        @forelse($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }} ({{ $usuario->email }})</option>
                        @empty
                            <option disabled>No hay usuarios disponibles</option>
                        @endforelse
                    </select>
                    @error('usuario_id') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Propiedad
                </button>
                <a href="{{ route('propiedades.index') }}" class="btn btn-outline">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection


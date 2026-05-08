@extends('layouts.app')

@section('title', 'Nueva Incidencia — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('incidencias.index') }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-plus-circle"></i> Nueva Incidencia</h1>
    <p class="page-subtitle">Registra una nueva incidencia en el sistema</p>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 24px; max-width: 800px;">
    <div class="card">
        <form action="{{ route('incidencias.store') }}" method="POST" novalidate>
            @csrf


           
           <div class="form-group">
    <label class="form-label" for="propiedad_id">Propiedad *</label>

    @if(auth()->user()->isAdmin())
        <select id="propiedad_id" name="propiedad_id"
            class="form-select {{ $errors->has('propiedad_id') ? 'is-invalid' : '' }}" required>

            <option value="">Selecciona una propiedad</option>

            @forelse($propiedades as $propiedad)
                <option value="{{ $propiedad->id }}"
                    {{ old('propiedad_id', $incidencia->propiedad_id ?? null) == $propiedad->id ? 'selected' : '' }}>
                    {{ $propiedad->direccion }}
                </option>
            @empty
                <option disabled>No hay propiedades disponibles</option>
            @endforelse
        </select>

    @elseif($propiedades->count() > 1)
        <select id="propiedad_id" name="propiedad_id"
            class="form-select {{ $errors->has('propiedad_id') ? 'is-invalid' : '' }}" required>

            <option value="">Selecciona una propiedad</option>

            @forelse($propiedades as $propiedad)
                <option value="{{ $propiedad->id }}"
                    {{ old('propiedad_id') == $propiedad->id ? 'selected' : '' }}>
                    {{ $propiedad->direccion }}
                </option>
            @empty
                <option disabled>No hay propiedades disponibles</option>
            @endforelse
        </select>

    @else
        @php
            $propiedad = $propiedades->first();
        @endphp

        <input type="hidden" name="propiedad_id" value="{{ $propiedad?->id }}">

        <input type="text" class="form-control"
               value="{{ $propiedad?->direccion ?? 'Sin propiedad asignada' }}"
               disabled>
    @endif

    @error('propiedad_id')
        <div class="form-error">
            <i class="fas fa-circle-exclamation"></i> {{ $message }}
        </div>
    @enderror
</div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label class="form-label" for="tipo_incidencia_id">Tipo *</label>
                    <select id="tipo_incidencia_id" name="tipo_incidencia_id" class="form-select {{ $errors->has('tipo_incidencia_id') ? 'is-invalid' : '' }}" required>
                        <option value="">Selecciona un tipo</option>
                        @forelse($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ old('tipo_incidencia_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                        @empty
                            <option disabled>No hay tipos disponibles</option>
                        @endforelse
                    </select>
                    @error('tipo_incidencia_id') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="estado_incidencia_id">Estado *</label>
                    <select id="estado_incidencia_id" name="estado_incidencia_id" class="form-select {{ $errors->has('estado_incidencia_id') ? 'is-invalid' : '' }}" required>
                        <option value="">Selecciona un estado</option>
                        @forelse($estados as $estado)
                            <option value="{{ $estado->id }}" {{ old('estado_incidencia_id') == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                        @empty
                            <option disabled>No hay estados disponibles</option>
                        @endforelse
                    </select>
                    @error('estado_incidencia_id') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-textarea">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label" for="prioridad">Prioridad</label>
                <select id="prioridad" name="prioridad" class="form-select">
                    <option value="baja" {{ old('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                    <option value="media" {{ old('prioridad') == 'media' ? 'selected' : '' }} selected>Media</option>
                    <option value="alta" {{ old('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Incidencia
                </button>
                <a href="{{ route('incidencias.index') }}" class="btn btn-outline">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection

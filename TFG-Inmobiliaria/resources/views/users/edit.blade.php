@extends('layouts.app')

@section('title', 'Editar Usuario — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('users.show', $user) }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-edit"></i> Editar Usuario</h1>
    <p class="page-subtitle">{{ $user->name }}</p>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 24px; max-width: 800px;">
    <div class="card">
        <form action="{{ route('users.update', $user) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label class="form-label" for="nombre">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', $user->nombre) }}" required>
                    @error('nombre') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                </div>
            </div>


            <div class="form-group">
                <label class="form-label" for="rol_id">Rol *</label>
                <select id="rol_id" name="rol_id" class="form-select {{ $errors->has('rol_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Selecciona un rol</option>
                    @forelse($roles as $role)
                        <option value="{{ $role->id }}" {{ old('rol_id', $user->rol_id) == $role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                    @empty
                        <option disabled>No hay roles disponibles</option>
                    @endforelse
                </select>
                @error('rol_id') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
            </div>

            <hr style="border: none; border-top: 1px solid var(--border); margin: 24px 0;">

            <div class="form-group">
                <label class="form-label" for="password">Nueva Contraseña</label>
                <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Dejar en blanco para no cambiar">
                @error('password') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
                <div class="form-help">Si no quieres cambiar la contraseña, deja este campo vacío</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirma tu nueva contraseña">
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
                <a href="{{ route('users.show', $user) }}" class="btn btn-outline">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
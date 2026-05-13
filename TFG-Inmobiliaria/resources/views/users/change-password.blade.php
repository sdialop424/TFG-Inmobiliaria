@extends('layouts.app')

@section('title', 'Cambiar Contraseña — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('users.show', auth()->user()) }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-lock"></i> Cambiar Contraseña</h1>
    <p class="page-subtitle">{{ auth()->user()->nombre }}</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div style="display: grid; grid-template-columns: 1fr; gap: 24px; max-width: 800px;">
    <div class="card">
        <form action="{{ route('users.changePassword') }}" method="POST" novalidate>
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label class="form-label" for="current_password">Contraseña Actual *</label>
                <input type="password" id="current_password" name="current_password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" required>
                @error('current_password') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Nueva Contraseña *</label>
                <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                @error('password') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirmar Nueva Contraseña *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" required>
                @error('password_confirmation') <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div> @enderror
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cambiar Contraseña
                </button>
                <a href="{{ route('users.show', auth()->user()) }}" class="btn btn-outline">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
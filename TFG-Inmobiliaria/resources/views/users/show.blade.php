@extends('layouts.app')

@section('title', 'Usuario — ComunIpanema')

@section('content')
<div class="page-header">
    <a href="{{ route('users.index') }}" style="color: var(--primary); text-decoration: none; margin-bottom: 12px; display: flex; align-items: center; gap: 6px; width: fit-content;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <h1 class="page-title"><i class="fas fa-user"></i> {{ $user->name }}</h1>
    <p class="page-subtitle">Detalles del usuario</p>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información del Usuario</h3>
            <div style="display: flex; gap: 8px;">
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Editar
                </a>
                @if(auth()->id() === $user->id)
                    <a href="{{ route('users.showChangePassword') }}" class="btn btn-sm btn-outline">
                        <i class="fas fa-lock"></i> Cambiar Contraseña
                    </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <table class="table" style="border: none;">
                <tbody>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary); width: 120px;">Nombre</td>
                        <td style="border: none; padding: 12px 0;">{{ $user->nombre }}</td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Email</td>
                        <td style="border: none; padding: 12px 0;"><a href="mailto:{{ $user->email }}" style="color: var(--primary); text-decoration: none;">{{ $user->email }}</a></td>
                    </tr>
                    
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Rol</td>
                        <td style="border: none; padding: 12px 0;">
                            <span class="badge badge-primary">{{ $user->rol->nombre ?? 'N/A' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none; padding: 12px 0; font-weight: 600; color: var(--text-secondary);">Fecha Registro</td>
                        <td style="border: none; padding: 12px 0; font-size: 13px; color: var(--text-muted);">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection
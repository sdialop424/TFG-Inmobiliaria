@extends('layouts.app')

@section('title', 'Usuarios — ComunIpanema')

@section('content')
<div class="page-header">
    <h1 class="page-title"><i class="fas fa-users"></i> Usuarios</h1>
    <p class="page-subtitle">Gestiona los usuarios del sistema</p>
</div>



<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Usuarios</h3>
    </div>
    <div class="card-body">
        @if($users->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        @if(auth()->user()->isAdmin())
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        
                        <td style="font-weight: 500;">{{ $user->nombre }}</td>
                        <td style="font-size: 13px; color: var(--text-muted);">{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-primary">{{ $user->rol->nombre ?? 'N/A' }}</span>
                        </td>
                        <td style="font-size: 13px; color: var(--text-muted);">{{ $user->created_at->format('d/m/Y') }}</td>
                        @if(auth()->user()->isAdmin())
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="form-eliminar" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div style="text-align: center; padding: 48px 24px;">
            <div style="font-size: 48px; color: var(--primary); margin-bottom: 16px; opacity: 0.5;">
                <i class="fas fa-users"></i>
            </div>
            <p style="color: var(--text-muted); margin-bottom: 24px;">No hay usuarios registrados</p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear el primer usuario
            </a>
        </div>
        @endif
    </div>
</div>

@endsection
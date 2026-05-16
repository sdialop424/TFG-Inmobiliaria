<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse — ComunIpanema</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/users-create.css') }}">
</head>
<body>
    

    <div class="login-wrapper">
        <div class="register-header">
            <h1 class="login-title">Nuevo usuario</h1>
        </div>
        

        <div class="register-card">
            @if(session('error'))
                <div class="alert-danger-box">
                    <i class="fas fa-circle-xmark"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->has('email') && !$errors->has('password'))
                <div class="alert-danger-box">
                    <i class="fas fa-circle-xmark"></i>
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-group" >
            <label class="form-label" for="nombre">Nombre</label>
            <div class="input-wrap">
                <i class="fas fa-user input-icon"></i>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                    value="{{ old('nombre') }}"
                    placeholder="Nombre"
                    required
                    autocomplete="name"
                >
            </div>
            @error('nombre')
                <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>

                <div class="form-group">
                    <label class="form-label" for="email">Correo electrónico</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope input-icon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="Correo electrónico"
                            required
                            autocomplete="email"
                            autofocus
                        >
                    </div>
                    @error('email')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <div class="input-wrap">
                        <i class="fas fa-lock input-icon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >
                    </div>
                    @error('password')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                   <button type="submit" class="btn-login">
                    <i class="fas fa-arrow-right-to-bracket"></i>
                    Registrar nuevo usuario
                </button>
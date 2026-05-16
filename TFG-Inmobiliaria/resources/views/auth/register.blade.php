<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse — ComunIpanema</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-register.css') }}">
</head>
<body>
    <div class="register-wrapper">
        <div class="register-header">
            <h1 class="register-title">Crear cuenta</h1>
            <p class="register-subtitle">Únete a ComunIpanema</p>
        </div>

        <div class="register-card">
            @if($errors->any())
                <div class="alert-danger-box">
                    <i class="fas fa-circle-xmark"></i>
                    Por favor revisa los errores en el formulario
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" validate>
                @csrf

                <div class="row-2">
                    <div class="form-group">
                        <label class="form-label" for="name">Nombre</label>
                        <div class="input-wrap">
                            <i class="fas fa-user input-icon"></i>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}"
                                placeholder="Tu nombre"
                                required
                            >
                        </div>
                        @error('name')
                            <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="last_name">Apellidos</label>
                        <div class="input-wrap">
                            <i class="fas fa-user input-icon"></i>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                value="{{ old('last_name') }}"
                                placeholder="Tus apellidos"
                                required
                            >
                        </div>
                        @error('last_name')
                            <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
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
                            placeholder="tu@email.com"
                            required
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>

               
                <div class="row-2">
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
                                autocomplete="new-password"
                            >
                        </div>
                        @error('password')
                            <div class="form-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Crear cuenta
                </button>
            </form>
        </div>

        <div class="register-footer">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
        </div>
    </div>
</body>
</html>

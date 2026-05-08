<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse — ComunIpanema</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --bg-base: #0d0f14; --bg-surface: #13161e; --bg-card: #1a1e2a;
            --border: #252a38; --border-light: #2e3447;
            --primary: #3b6ef8; --primary-glow: rgba(59,110,248,.25); --primary-dark: #2a57d4;
            --text-primary: #f0f2f8; --text-secondary: #8892aa; --text-muted: #4d576e;
            --danger: #ef4444;
            --font: 'Sora', sans-serif; --font-mono: 'JetBrains Mono', monospace;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: var(--font);
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }
        .register-wrapper {
            width: 100%; max-width: 500px;
            position: relative; z-index: 1;
        }
        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .register-title {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -.5px;
            margin-bottom: 8px;
        }
        .register-subtitle {
            font-size: 13.5px;
            color: var(--text-muted);
            font-family: var(--font-mono);
        }
        .register-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 8px 40px rgba(0,0,0,.5);
        }
        .form-group { margin-bottom: 20px; }
        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
            letter-spacing: .5px;
            text-transform: uppercase;
            margin-bottom: 8px;
            font-family: var(--font-mono);
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }
        .form-control {
            width: 100%;
            background: var(--bg-card);
            border: 1px solid var(--border-light);
            border-radius: 10px;
            padding: 12px 14px 12px 40px;
            color: var(--text-primary);
            font-family: var(--font);
            font-size: 14px;
            outline: none;
            transition: all .2s;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-glow);
        }
        .form-control::placeholder { color: var(--text-muted); }
        .form-control.is-invalid { border-color: var(--danger); }
        .form-error {
            font-size: 12px;
            color: var(--danger);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .btn-register {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: var(--font);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: .2px;
        }
        .btn-register:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(59,110,248,.35);
        }
        .btn-register:active { transform: translateY(0); }
        .alert-danger-box {
            background: rgba(239,68,68,.1);
            border: 1px solid rgba(239,68,68,.3);
            border-radius: 10px;
            padding: 12px 16px;
            color: #f87171;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .register-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: var(--text-muted);
        }
        .register-footer a { color: var(--primary); text-decoration: none; }
        .register-footer a:hover { text-decoration: underline; }
        .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 480px) {
            .row-2 { grid-template-columns: 1fr; }
            .register-title { font-size: 22px; }
            .register-card { padding: 24px; }
        }
    </style>
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

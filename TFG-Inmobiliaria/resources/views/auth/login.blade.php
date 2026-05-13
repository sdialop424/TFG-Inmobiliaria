<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — ComunIpanema</title>
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
            background-size: cover;
            background-position: center;
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }        

        .login-wrapper {
            width: 100%; max-width: 440px;
            position: relative; z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        

        .login-title {
        
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -.5px;
            margin-bottom: 8px;
        }

        .login-subtitle {
            font-size: 13.5px;
            color: var(--text-muted);
            font-family: var(--font-mono);
        }

        .login-card {
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

        .input-wrap {
            position: relative;
        }

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

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .checkbox-label input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 13px;
            color: var(--primary);
            text-decoration: none;
        }
        .forgot-link:hover { text-decoration: underline; }

        .btn-login {
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

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(59,110,248,.35);
        }

        .btn-login:active { transform: translateY(0); }

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

        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .login-footer a { color: var(--primary); text-decoration: none; }
        .login-footer a:hover { text-decoration: underline; }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
            color: var(--text-muted);
            font-size: 12px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* Floating particles */
        .particles { position: fixed; inset: 0; pointer-events: none; z-index: 0; overflow: hidden; }
        .particle {
            position: absolute;
            width: 2px; height: 2px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0;
            animation: float linear infinite;
        }
        @keyframes float {
            0%   { opacity: 0; transform: translateY(100vh) scale(0); }
            10%  { opacity: .6; }
            90%  { opacity: .6; }
            100% { opacity: 0; transform: translateY(-100px) scale(1); }
        }
    </style>
</head>
<body>
    

    <div class="login-wrapper">
        <div class="login-header">
            <h1 class="login-title">Bienvenido</h1>
           <p class="login-subtitle">Inicia sesión para continuar</p>
        </div>

        <div class="login-card">
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

            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

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
                    Iniciar sesión
                </button>
                 <div class="login-footer" style="padding-top: 16px; padding-bottom: 0; ">
            ¿No tienes cuenta? <a href="{{ route('users.create') }}">Regístrate aquí</a>
        </div>
            </form>
        </div>

       
        
    </div>
</body>
</html>
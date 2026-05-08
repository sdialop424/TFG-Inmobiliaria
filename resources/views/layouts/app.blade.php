<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ComunIpanema')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --bg-base: #0d0f14;
            --bg-surface: #13161e;
            --bg-card: #1a1e2a;
            --bg-hover: #22263a;
            --border: #252a38;
            --border-light: #2e3447;
            --primary: #3b6ef8;
            --primary-glow: rgba(59,110,248,.25);
            --primary-dark: #2a57d4;
            --secondary: #8338ec;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --text-primary: #f0f2f8;
            --text-secondary: #8892aa;
            --text-muted: #4d576e;
            --font: 'Sora', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        *,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--font); background: var(--bg-base); color: var(--text-primary); min-height: 100vh; position: relative; overflow-x: hidden; }
        html { scroll-behavior: smooth; }

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-card); }
        ::-webkit-scrollbar-thumb { background: var(--border-light); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary); }

        .navbar { background: var(--bg-surface); border-bottom: 1px solid var(--border); padding: 0 24px; position: sticky; top: 0; z-index: 100; backdrop-filter: blur(10px); }
        .navbar-container { max-width: 1400px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; height: 70px; }
        .navbar-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; font-size: 20px; font-weight: 700; color: var(--text-primary); letter-spacing: -0.5px; }
        .navbar-brand i { font-size: 24px; color: var(--primary); }
        .navbar-menu { display: flex; align-items: center; gap: 8px; list-style: none; }
        .navbar-item { position: relative; }
        .navbar-link { display: flex; align-items: center; gap: 8px; padding: 8px 16px; color: var(--text-secondary); text-decoration: none; font-size: 14px; font-weight: 500; border-radius: 8px; transition: all 0.2s; }
        .navbar-link:hover { color: var(--primary); background: var(--bg-hover); }
        .navbar-link.active { color: var(--primary); background: var(--primary-glow); }
        .user-menu { display: flex; align-items: center; gap: 16px; }
        .user-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--primary-glow); border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; cursor: pointer; transition: all 0.2s; }
        .user-avatar:hover { transform: scale(1.1); }
        .dropdown-menu { position: absolute; top: 100%; right: 0; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; min-width: 200px; margin-top: 8px; display: none; flex-direction: column; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); z-index: 200; }
        .dropdown-menu.show { display: flex; }
        .dropdown-item { padding: 12px 16px; color: var(--text-secondary); text-decoration: none; font-size: 13px; display: flex; align-items: center; gap: 10px; transition: all 0.2s; border-bottom: 1px solid var(--border); }
        .dropdown-item:last-child { border-bottom: none; }
        .dropdown-item:hover { background: var(--bg-hover); color: var(--primary); }
        .dropdown-item.danger:hover { color: var(--danger); }

        .layout-container { display: flex; min-height: calc(100vh - 70px); }
        .sidebar { width: 250px; background: var(--bg-surface); border-right: 1px solid var(--border); padding: 20px; overflow-y: auto; display: none; }
        .sidebar.show { display: block; }
        .sidebar-menu { list-style: none; }
        .sidebar-item { margin-bottom: 8px; }
        .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: var(--text-secondary); text-decoration: none; font-size: 14px; font-weight: 500; border-radius: 8px; transition: all 0.2s; }
        .sidebar-link:hover { color: var(--primary); background: var(--bg-hover); }
        .sidebar-link.active { color: var(--primary); background: var(--primary-glow); }
        .sidebar-link i { width: 20px; text-align: center; }
        .main-content { flex: 1; overflow-y: auto; padding: 24px; }

        .container { max-width: 1400px; margin: 0 auto; }
        .page-header { margin-bottom: 32px; }
        .page-title { font-size: 32px; font-weight: 700; letter-spacing: -0.5px; margin-bottom: 8px; display: flex; align-items: center; gap: 12px; }
        .page-title i { color: var(--primary); font-size: 32px; }
        .page-subtitle { color: var(--text-secondary); font-size: 14px; }

        .card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 16px; padding: 24px; box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3); transition: all 0.2s; }
        .card:hover { border-color: var(--primary); box-shadow: 0 12px 50px rgba(59, 110, 248, 0.15); }
        .card-header { margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-size: 18px; font-weight: 600; color: var(--text-primary); }
        .card-body { color: var(--text-secondary); }

        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 8px; font-family: var(--font-mono); }
        .form-control,.form-select,.form-textarea { width: 100%; background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 10px; padding: 12px 14px; color: var(--text-primary); font-family: var(--font); font-size: 14px; outline: none; transition: all 0.2s; }
        .form-control:focus,.form-select:focus,.form-textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-glow); }
        .form-control::placeholder,.form-textarea::placeholder { color: var(--text-muted); }
        .form-control.is-invalid,.form-select.is-invalid,.form-textarea.is-invalid { border-color: var(--danger); }
        .form-textarea { resize: vertical; min-height: 120px; font-family: var(--font); }
        .form-error { font-size: 12px; color: var(--danger); margin-top: 6px; display: flex; align-items: center; gap: 5px; }
        .form-help { font-size: 12px; color: var(--text-muted); margin-top: 6px; }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 20px; border: none; border-radius: 10px; font-family: var(--font); font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; text-decoration: none; white-space: nowrap; letter-spacing: 0.2px; }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(59, 110, 248, 0.35); }
        .btn-primary:active { transform: translateY(0); }
        .btn-secondary { background: var(--secondary); color: #fff; }
        .btn-secondary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(131, 56, 236, 0.35); }
        .btn-success { background: var(--success); color: #fff; }
        .btn-success:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(16, 185, 129, 0.35); }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(239, 68, 68, 0.35); }
        .btn-outline { background: transparent; border: 1px solid var(--border-light); color: var(--text-secondary); }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); background: var(--primary-glow); }
        .btn-link { background: transparent; color: var(--primary); padding: 0; text-decoration: none; }
        .btn-link:hover { text-decoration: underline; }
        .btn-sm { padding: 8px 12px; font-size: 12px; }
        .btn-lg { padding: 16px 32px; font-size: 16px; }
        .btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none !important; }

        .alert { padding: 14px 16px; border-radius: 10px; display: flex; align-items: center; gap: 12px; margin-bottom: 20px; font-size: 14px; }
        .alert-success { background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); color: #86efac; }
        .alert-danger { background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; }
        .alert-warning { background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; }
        .alert-info { background: rgba(59, 110, 248, 0.1); border: 1px solid rgba(59, 110, 248, 0.3); color: #7dd3fc; }

        .table { width: 100%; border-collapse: collapse; font-size: 14px; }
        .table thead { background: var(--bg-card); border-bottom: 2px solid var(--border); }
        .table th { padding: 12px 16px; text-align: left; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; font-size: 12px; letter-spacing: 0.5px; }
        .table td { padding: 14px 16px; border-bottom: 1px solid var(--border); color: var(--text-primary); }
        .table tbody tr:hover { background: var(--bg-card); }
        .table tbody tr:last-child td { border-bottom: none; }

        nav[aria-label="Pagination Navigation"] {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            width: 100%;
            margin-top: 16px;
        }
        nav[aria-label="Pagination Navigation"] p.text-sm.text-gray-700.leading-5.dark\:text-gray-600 {
            display: none;
        }
        nav[aria-label="Pagination Navigation"] .inline-flex {
            min-width: 46px;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            padding: 0 14px !important;
            border-radius: 12px !important;
            background: var(--bg-card) !important;
            border: 1px solid var(--border-light) !important;
            color: var(--text-secondary) !important;
        }
        nav[aria-label="Pagination Navigation"] .inline-flex:hover {
            background: var(--bg-hover) !important;
            border-color: var(--primary) !important;
            color: var(--text-primary) !important;
        }
        nav[aria-label="Pagination Navigation"] .inline-flex svg {
            width: 18px;
            height: 18px;
        }
        nav[aria-label="Pagination Navigation"] .rounded-l-md,
        nav[aria-label="Pagination Navigation"] .rounded-r-md {
            border-radius: 12px !important;
        }
        nav[aria-label="Pagination Navigation"] [aria-current] .inline-flex {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #fff !important;
        }
        nav[aria-label="Pagination Navigation"] .cursor-not-allowed {
            opacity: 0.4;
        }

        .filter-select,
        .filter-input { width: 100%; max-width: 180px; margin-top: 6px; background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 10px; color: var(--text-primary); padding: 8px 10px; font-family: var(--font); font-size: 13px; outline: none; }
        .filter-select:focus,
        .filter-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(59,110,248,.12); }

        .grid { display: grid; gap: 24px; }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
        .grid-3 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }
        .grid-4 { grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); }

        .badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 600; letter-spacing: 0.3px; text-transform: uppercase; }
        .badge-primary { background: var(--primary-glow); color: #93c5fd; }
        .badge-success { background: rgba(16, 185, 129, 0.2); color: #86efac; }
        .badge-danger { background: rgba(239, 68, 68, 0.2); color: #f87171; }
        .badge-warning { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }
        .badge-secondary { background: rgba(131, 56, 236, 0.2); color: #d8b4fe; }

        .action-buttons { display: flex; gap: 8px; }
        .action-buttons .btn { padding: 8px 12px; font-size: 12px; }

        @media (min-width: 768px) {
            .sidebar { display: block; }
            .hamburger { display: none; }
        }
        @media (max-width: 768px) {
            .main-content { padding: 16px; }
            .page-title { font-size: 24px; }
            .grid-2,.grid-3,.grid-4 { grid-template-columns: 1fr; }
            .navbar-menu { display: none; }
            .hamburger { background: none; border: none; color: var(--text-secondary); font-size: 20px; cursor: pointer; margin-left: auto; padding: 0 8px; }
            .hamburger:hover { color: var(--primary); }
            .table { font-size: 12px; }
            .table th,.table td { padding: 8px 12px; }
            .btn { padding: 10px 16px; font-size: 12px; }
        }

        @media (max-width: 500px) {
            .navbar { padding: 0 12px; }
            .navbar-container { height: 60px; }
            .navbar-brand { font-size: 16px; gap: 8px; }
            .navbar-brand i { font-size: 20px; }
            .user-avatar { width: 32px; height: 32px; font-size: 12px; }
            .layout-container { min-height: calc(100vh - 60px); }
            .sidebar { width: 200px; padding: 16px; }
            .main-content { padding: 12px; }
            .page-header { margin-bottom: 20px; }
            .page-title { font-size: 20px; gap: 8px; }
            .page-title i { font-size: 24px; }
            .page-subtitle { font-size: 12px; }
            .card { padding: 16px; border-radius: 12px; }
            .card-header { margin-bottom: 12px; padding-bottom: 12px; }
            .card-title { font-size: 16px; }
            .grid { gap: 16px; }
            .grid-4 { grid-template-columns: 1fr; }
            .form-group { margin-bottom: 16px; }
            .form-control, .form-select, .form-textarea { padding: 10px 12px; font-size: 13px; }
            .btn { padding: 10px 14px; font-size: 13px; }
            .btn-sm { padding: 6px 10px; font-size: 11px; }
            .alert { padding: 10px 12px; font-size: 12px; gap: 8px; }
            .table { font-size: 11px; overflow-x: auto; display: block; }
            .table th, .table td { padding: 6px 8px; white-space: nowrap; }
            .badge { padding: 3px 8px; font-size: 10px; }
            .action-buttons { flex-direction: column; gap: 4px; }
            .action-buttons .btn { width: 100%; }
            nav[aria-label="Pagination Navigation"] { gap: 4px; }
            nav[aria-label="Pagination Navigation"] .inline-flex { min-width: 36px; min-height: 36px; padding: 0 10px !important; font-size: 12px; }
            .filter-select, .filter-input { max-width: 100%; margin-top: 4px; }
        }
    </style>
    @yield('styles')
</head>

<body>
    @include('layouts.navbar')
    <div class="layout-container">
        @include('layouts.sidebar')
        <main class="main-content">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger"><i class="fas fa-circle-xmark"></i> {{ session('error') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.UX_TEXTS = {
            loading: 'Cargando...',
            dbError: 'Ha ocurrido un error al conectar con la base de datos. Por favor, inténtalo de nuevo.',
            retry: 'Reintentar',
            deleteTitle: 'Confirmar eliminación',
            deleteText: '¿Estás seguro de que quieres eliminar este elemento? Esta acción no se puede deshacer.',
            deleteConfirm: 'Eliminar',
            deleteCancel: 'Cancelar'
        };

        function showGlobalLoader() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.setAttribute('aria-busy', 'true');
                loader.classList.add('show');
            }
        }

        function hideGlobalLoader() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.setAttribute('aria-busy', 'false');
                loader.classList.remove('show');
            }
        }

        function showDatabaseError() {
            Swal.fire({
                title: 'Error de base de datos',
                text: window.UX_TEXTS.dbError,
                icon: 'error',
                confirmButtonText: window.UX_TEXTS.retry,
                background: '#1a1e2a',
                color: '#f0f2f8',
                confirmButtonColor: '#3b6ef8'
            });
        }

        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            if (!menu) return;
            menu.classList.toggle('show');
            document.addEventListener('click', function closeMenu(event) {
                if (!event.target.closest('.user-menu')) {
                    menu.classList.remove('show');
                    document.removeEventListener('click', closeMenu);
                }
            });
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (!sidebar) return;
            sidebar.classList.toggle('show');
        }

        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    const sidebar = document.getElementById('sidebar');
                    if (sidebar) sidebar.classList.remove('show');
                }
            });
        });

        document.querySelectorAll('.form-eliminar').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: window.UX_TEXTS.deleteTitle,
                    text: window.UX_TEXTS.deleteText,
                    icon: 'warning',
                    background: '#1a1e2a',
                    color: '#f0f2f8',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#3b6ef8',
                    confirmButtonText: window.UX_TEXTS.deleteConfirm,
                    cancelButtonText: window.UX_TEXTS.deleteCancel
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                showGlobalLoader();
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
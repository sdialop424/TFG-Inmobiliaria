<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ComunIpanema')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>

<body>
    <!-- Global Loader -->
    <div id="global-loader" aria-busy="false">
        <div class="loader-spinner"></div>
        <p class="loader-text">Cargando...</p>
    </div>

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
    <div id="sidebarOverlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

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

        // Mostrar loader cuando la página inicia la carga
        window.addEventListener('beforeunload', function() {
            showGlobalLoader();
        });

        // Ocultar loader cuando la página ha cargado completamente
        window.addEventListener('load', function() {
            hideGlobalLoader();
        });

        // También ocultar si la página está lista (para navegación desde cache)
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                hideGlobalLoader();
            });
        } else {
            hideGlobalLoader();
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

        function toggleSidebar(forceState) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (!sidebar || !overlay) return;
            const show = typeof forceState === 'boolean' ? forceState : !sidebar.classList.contains('show');
            sidebar.classList.toggle('show', show);
            const overlayVisible = show && window.innerWidth < 768;
            overlay.classList.toggle('show', overlayVisible);
        }

        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    toggleSidebar(false);
                }
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                toggleSidebar(true);
            }
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
            form.addEventListener('submit', function(event) {
                if (form.classList.contains('form-eliminar')) {
                    return;
                }
                showGlobalLoader();
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
<nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('dashboard.index') }}" class="navbar-brand">
                <i class="fas fa-building"></i> ComunIpanema
            </a>
            <div class="navbar-actions">
                <button class="hamburger" onclick="toggleSidebar()" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <div class="user-menu">
                    <div class="navbar-item">
                        <button class="user-avatar" onclick="toggleUserMenu()" aria-label="Abrir menú de usuario" style="color: #fff">
                            {{ strtoupper(substr(auth()->user()->nombre, 0, 1)) }}
                        </button>
                        <div class="dropdown-menu" id="userMenu">
                            <a href="{{ route('users.show', auth()->id()) }}" class="dropdown-item"><i class="fas fa-user"></i> Mi perfil</a>
                            <a href="{{ route('users.index') }}" class="dropdown-item"><i class="fas fa-users"></i> Gestión de Usuarios</a>
                            <a href="{{ route('logout') }}" class="dropdown-item danger"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<nav class="navbar">
        <div class="navbar-container">
           <a href="{{ route('dashboard.index') }}" 
                class="navbar-container" 
                style="color: var(--primary); font-weight: 700; display: flex; align-items: center; gap: 8px; text-decoration: none;">
                 <i class="fas fa-building"></i> ComunIpanema
            </a>
            <button class="hamburger" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
           
                
            </ul>
            <div class="user-menu">
                <div class="navbar-item" style="position: relative;">
                    <button class="user-avatar" onclick="toggleUserMenu()" style="background: var(--primary-glow); border: 2px solid var(--primary); color: #fff; font-weight: 700; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        {{ strtoupper(substr(auth()->user()->nombre, 0, 1)) }}
                    </button>
                    <div class="dropdown-menu" id="userMenu">
                        <a href="{{ route('users.show', auth()->id()) }}" class="dropdown-item"><i class="fas fa-user"></i> Mi perfil</a>
                        <a href="{{ route('users.edit', auth()->id()) }}" class="dropdown-item"><i class="fas fa-edit"></i> Editar perfil</a>
                        <a href="{{ route('users.index') }}" class="dropdown-item"><i class="fas fa-users"></i> Gestión de Usuarios</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>

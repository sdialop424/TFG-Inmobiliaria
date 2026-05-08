 <aside class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-item"><a href="{{ route('dashboard.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a></li>
                <li class="sidebar-item"><a href="{{ route('propiedades.index') }}" class="sidebar-link {{ request()->routeIs('propiedades.*') ? 'active' : '' }}"><i class="fas fa-home"></i> <span>Propiedades</span></a></li>
                <li class="sidebar-item"><a href="{{ route('incidencias.index') }}" class="sidebar-link {{ request()->routeIs('incidencias.*') ? 'active' : '' }}"><i class="fas fa-exclamation-circle"></i> <span>Incidencias</span></a></li>
           </ul>
        </aside>

{{-- Sidebar --}}
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/logoIHM.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
        </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                {{-- Dashboard --}}
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"
                        aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Berita --}}
                <li class="nav-item {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                    <a href="{{ route('admin.berita') }}"
                        aria-current="{{ request()->routeIs('admin.berita*') ? 'page' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>

                {{-- Sertifikat --}}
                <li class="nav-item {{ request()->routeIs('admin.sertifikat*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sertifikat') }}"
                        aria-current="{{ request()->routeIs('admin.sertifikat*') ? 'page' : '' }}">
                        <i class="fas fa-award"></i>
                        <p>Sertifikat</p>
                    </a>
                </li>

                {{-- Keberlanjutan (pakai route landing yg sudah ada) --}}
                <li class="nav-item {{ request()->routeIs('admin.keberlanjutan*') ? 'active' : '' }}">
                    <a href="{{ route('admin.keberlanjutan') }}"
                        aria-current="{{ request()->routeIs('admin.keberlanjutan*') ? 'page' : '' }}">
                        <i class="fas fa-seedling"></i>
                        <p>Keberlanjutan</p>
                    </a>
                </li>

                {{-- Fasilitas (pakai route landing yg sudah ada) --}}
                <li class="nav-item {{ request()->routeIs('admin.fasilitas*') ? 'active' : '' }}">
                    <a href="{{ route('admin.fasilitas') }}"
                        aria-current="{{ request()->routeIs('admin.fasilitas*') ? 'page' : '' }}">
                        <i class="fas fa-building"></i>
                        <p>Fasilitas</p>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</div>

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
    <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-home"></i>
      <p>Dashboard</p>
    </a>
  </li>

  {{-- Berita --}}
  <li class="nav-item {{ request()->routeIs('admin.berita') ? 'active' : '' }}">
    <a href="{{ route('admin.berita') }}">
      <i class="far fa-newspaper"></i>
      <p>Berita</p>
    </a>
  </li>

  {{-- Keberlanjutan (pakai route landing yg sudah ada) --}}
  <li class="nav-item {{ request()->routeIs('pages.keberlanjutan') ? 'active' : '' }}">
    <a href="{{ route('pages.keberlanjutan') }}">
      <i class="fas fa-leaf"></i>
      <p>Keberlanjutan</p>
    </a>
  </li>
</ul>

    </div>
  </div>
</div>


<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <div class="logo-header" data-background-color="dark">
      <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo">
        <img src="<?php echo e(asset('assets/img/logoIHM.png')); ?>" alt="navbar brand" class="navbar-brand" height="20" />
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
  
  <li class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.dashboard')); ?>">
      <i class="fas fa-home"></i>
      <p>Dashboard</p>
    </a>
  </li>

  
  <li class="nav-item <?php echo e(request()->routeIs('admin.berita') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.berita')); ?>">
      <i class="far fa-newspaper"></i>
      <p>Berita</p>
    </a>
  </li>

  
  <li class="nav-item <?php echo e(request()->routeIs('admin.sertifikat') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.sertifikat')); ?>">
      <i class="far fa-newspaper"></i>
      <p>Sertifikat</p>
    </a>
  </li>

  
  <li class="nav-item <?php echo e(request()->routeIs('admin.keberlanjutan') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.keberlanjutan')); ?>">
      <i class="fas fa-leaf"></i>
      <p>Keberlanjutan</p>
    </a>
  </li>
  
  
  <li class="nav-item <?php echo e(request()->routeIs('admin.fasilitas') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.fasilitas')); ?>">
      <i class="fas fa-leaf"></i>
      <p>Fasilitas</p>
    </a>
  </li>
</ul>

    </div>
  </div>
</div>
<?php /**PATH /Users/bona/Downloads/webihm1/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>
<header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@itcihutanimanunggal.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>(0542) 840428</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="<?php echo e(route('dashboard')); ?>" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="<?php echo e(asset('assets/img/logoIHM.png')); ?>" alt="">
          <h1 class="sitename">Itci Hutani Manunggal</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="<?php echo e(route('dashboard')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(route('pages.tentang')); ?>">Tentang</a></li>
            <li><a href="<?php echo e(route('pages.sertifikat')); ?>">Sertifikat</a></li>
            <li><a href="<?php echo e(route('pages.keberlanjutan')); ?>">Keberkelanjutan</a></li>
            <li><a href="<?php echo e(route('pages.fasilitas')); ?>">Fasilitas</a></li>
            <li><a href="https://career.itcihutanimanunggal.co.id/login">Karir</a></li>
            <li><a href="<?php echo e(route('berita')); ?>">Berita</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/layouts/header.blade.php ENDPATH**/ ?>
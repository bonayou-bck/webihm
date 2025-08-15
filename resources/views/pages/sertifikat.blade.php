{{-- resources/views/pages/sustainability-gallery.blade.php --}}
@extends('layouts.app')

@section('title', 'Sertifikat')
@section('body_class', 'sustainability-gallery-page')

@section('content')
<main class="main">

  {{-- HERO --}}
  <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
    <div class="container position-relative">
      <h1 class="mb-3">Sertifikat</h1>
      <p class="lead lead-muted">Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
    </div>
  </div>

  <section id="portfolio" class="portfolio section">

    <div class="container">

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <div class="row gy-4 portfolio-container isotope-container">

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-portrait-1.webp') }}" class="img-fluid" alt="Capturing Moments" loading="lazy">
              <div class="portfolio-info">
                <h4>Capturing Moments</h4>
                <p>Photography</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-portrait-1.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Capturing Moments"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('dashboard') }}" title="More Details"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-2.webp') }}" class="img-fluid" alt="Woodcraft Design" loading="lazy">
              <div class="portfolio-info">
                <h4>Woodcraft Design</h4>
                <p>Web Design</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-2.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Woodcraft Design"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-automotive">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-portrait-2.webp') }}" class="img-fluid" alt="Classic Beauty" loading="lazy">
              <div class="portfolio-info">
                <h4>Classic Beauty</h4>
                <p>Automotive</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-portrait-2.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Classic Beauty"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-nature">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-portrait-4.webp') }}" class="img-fluid" alt="Natural Growth" loading="lazy">
              <div class="portfolio-info">
                <h4>Natural Growth</h4>
                <p>Nature</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-portrait-4.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Natural Growth"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-5.webp') }}" class="img-fluid" alt="Urban Stories" loading="lazy">
              <div class="portfolio-info">
                <h4>Urban Stories</h4>
                <p>Photography</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-5.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Urban Stories"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/portfolio-6.webp') }}" class="img-fluid" alt="Digital Experience" loading="lazy">
              <div class="portfolio-info">
                <h4>Digital Experience</h4>
                <p>Web Design</p>
                <div class="portfolio-links">
                  <a href="{{ asset('assets/img/portfolio/portfolio-6.webp') }}"
                     class="glightbox"
                     data-gallery="sustainability-gallery"
                     title="Digital Experience"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

        </div><!-- End Portfolio Container -->

      </div>

    </div>

  </section><!-- /Portfolio Section -->

</main>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    if (typeof GLightbox !== 'undefined') {
      GLightbox({ selector: '.glightbox' });
    }
  });
</script>
@endpush

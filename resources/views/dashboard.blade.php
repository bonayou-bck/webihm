      {-- resources/views/pages/berita.blade.php --}
      @extends('layouts.app')
      @section('title', 'Berita Details - Itci Hutani Manunggal')
      @section('body_class', 'service-details-page')
      

@push('styles')
<style>
  /* Featured Services: no padding */
  #featured-services.section,
  .featured-services.section { padding: 0 !important; }

  /* Section setelah featured-services: abu-abu */
  .section-gray { background: #f2f4f7; }
</style>
@endpush

@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="hero-background">
        <img src="{{ asset('assets/img/bg/bg-14.JPG') }}" alt="" data-aos-duration="1000">
        <div class="overlay"></div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content">
              <h1>MEMASTIKAN</h1>
              <h1 class="hero-badge">KEBERLANJUTAN</h1>
              <h1>UNTUK MASA DEPAN</h1>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="content">
              <p class="lead">Tentang Kami</p>
              <h2>Perusahaan Yang Bergerak Dibidang Hutan Tanam Dengan Acacia Mangium Dan Eucalyptus Sp.</h2>
              <p>Perusahaan yang bergerak dibidang Hutan Tanam dengan Acacia Mangium dan Eucalyptus Sp. dengan luasan konsesi ±114,830 Ha terletak di Provinsi Kalimantan Timur yang telah mendapatkan izin berusaha pemanfaatan hutan dengan nomor SK.198/Menlhk/Setjen/HPL.2/3/2022 yang dikeluarkan oleh Menteri Lingkungan Hidup Dan Kehutanan pada tanggal 10 Maret 2022.</p>
              <div class="cta-wrapper">
                <a href="{{ route('pages.sertifikat') }}" class="btn btn-primary">Sertifikat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="image-wrapper">
              <img src="{{ asset('assets/img/about/nursery.jpg') }}" alt="About Us" class="img-fluid main-image">
              <div class="floating-card">
                <div class="card-content">
                  <i class="bi bi-award"></i>
                  <div class="text">
                    <h5>Excellence Award</h5>
                    <span>Digital Innovation 2023</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div>

        <div class="clients-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 6000,
              "autoplay": {
                "delay": 1,
                "disableOnInteraction": false
              },
              "centeredSlides": true,
              "slideToClickedSlide": true,
              "slidesPerView": "auto",
              "spaceBetween": 40,
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                },
                "640": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "992": {
                  "slidesPerView": 4,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 40
                }
              }
            }
          </script>

          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/aja.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/ifcc.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/iso14.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/iso45.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/pefc.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/ti.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/aja.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/ifcc.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/iso14.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/iso45.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/pefc.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

            <div class="swiper-slide">
              <div class="client-logo">
                <img src="{{ asset('assets/img/clients/ti.png') }}" class="img-fluid" alt="">
              </div>
            </div><!-- End Client Item -->

          </div>

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <!-- </div>End Section Title -->

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="services-content" data-aos-duration="900">
              <span class="subtitle">memberdayakan perempuan</span>
              <h2>Memelihara hutan dengan keberlanjutan dan ketulusan demi masa depan</h2>
              <p>Kami percaya pada kekuatan, ketulusan dan ketahanan dalam pengelolaan kehutanan. Di ITCI Hutani Manunggal, tim perempuan kami yang beragam memimpin upaya ini, mulai dari konservasi hingga pengelolaan dengan sentuhan ketulusan yang didasari oleh pelatihan, kompetensi, dukungan serta kerjasama seluruh insan ITCI Hutani Manunggal. Bersama-sama, kita membentuk praktik kehutanan berkelanjutan dengan melindungi ekosistem, dan mendorong inovasi. Dengan dedikasi dan persatuan, kami tidak hanya menanam pohon, namun juga memupuk budaya di mana perempuan bisa berkembang, sehingga memberikan dampak jangka panjang pada industri dan dunia. Bergabunglah bersama kami saat kami membuka jalan menuju masa depan yang lebih hijau dan inklusif.</p>
              <!-- <div class="mt-4" data-aos-duration="1100">
                <a href="#" class="btn-consultation"><span>Request a Consultation</span><i class="bi bi-arrow-right"></i></a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-image">
              <img src="{{ asset('assets/img/about/nobgJane.png') }}" alt="Business Services" class="img-fluid">
              <div class="shape-circle"></div>
              <div class="shape-accent"></div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Featured Services Section -->ß

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section section-gray">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>KEBERLANJUTAN</h2>
        <p>Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center mt-4">
              <ul class="portfolio-filters isotope-filters">
                <li data-filter="*" class="filter-active"></li>
                <li data-filter=".filter-photography">Fire Fighter</li>
                <li data-filter=".filter-design">Nursery</li>
                <li data-filter=".filter-automotive">Plantation</li>
                <li data-filter=".filter-nature">Harvesting</li>
                <li>
                    <a href="{{ route('pages.keberlanjutan') }}" style="text-decoration:none; color:inherit;">
                        Selengkapnya >>
                    </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="row gy-4 portfolio-container isotope-container">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-portrait-1.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Capturing Moments</h4>
                  <p>Photography</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-portrait-1.webp" class="glightbox" title="Capturing Moments"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-2.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Woodcraft Design</h4>
                  <p>Web Design</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-2.webp" class="glightbox" title="Woodcraft Design"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-automotive">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-portrait-2.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Classic Beauty</h4>
                  <p>Automotive</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-portrait-2.webp" class="glightbox" title="Classic Beauty"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-nature">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-portrait-4.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Natural Growth</h4>
                  <p>Nature</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-portrait-4.webp" class="glightbox" title="Natural Growth"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-5.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Urban Stories</h4>
                  <p>Photography</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-5.webp" class="glightbox" title="Urban Stories"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-6.webp" class="img-fluid" alt="Portfolio Image" loading="lazy">
                <div class="portfolio-info">
                  <h4>Digital Experience</h4>
                  <p>Web Design</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-6.webp" class="glightbox" title="Digital Experience"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Team Section -->
    <section id="team" class="team section">
      <!-- Section Title -->
      <div class="container section-title">
        <h2>Berita</h2>
        
      </div><!-- End Section Title -->

      <div class="container">

        <div class="team-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "breakpoints": {
                "576": {
                  "slidesPerView": 2
                },
                "992": {
                  "slidesPerView": 3
                },
                "1200": {
                  "slidesPerView": 4
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->
            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->
            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->
            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->
            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->
            <div class="swiper-slide">
              <div class="team-card">
                <div class="team-image">
                  <img src="{{ asset('assets/img/person/person-f-9.webp') }}" class="img-fluid" alt="" loading="lazy">
                  <div class="team-overlay">
                  </div>
                </div>
                <div class="team-content">
                  <a href="service-details.html">
                  <h3>Serba-serbi Pohon Jati : Sifat Ekologis, Sebaran dan manfaat edit</h3></a>
                  <span>Sifat Ekologis, Sebaran dan manfaat edit</span>
                  <p>11 September 2025</p>
                </div>
              </div><!-- End Team Card -->
            </div><!-- End slide item -->

            
            <!-- End slide item -->

          </div>
          
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          
        </div>
        <div class="row">
          <div class="col-12">
            <div class="container section-title">
              <div class="swiper-navigation">
                  <a href="{{ route('pages.berita') }}"><br>Selengkapnya</a>
                      <!-- <span><br>Selengkapnya</span> -->
                      <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        

      </div>

    </section><!-- /Team Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="services-content" data-aos-duration="900">
              <h2>Fasilitas</h2>
              <p>Fasilitas yang disediakan di lingkungan PT Itci Hutani Manunggal</p>
            </div>
          </div>
        </div>

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('assets/img/person/person-m-9.webp') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('assets/img/person/person-f-5.webp') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('assets/img/person/person-f-12.webp') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('assets/img/person/person-m-13.webp') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div>
            <!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>
    <!-- /Testimonials Section -->
  </main>

@endsection

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files --><!-- Main JS File -->
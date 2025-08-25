    {{-- resources/views/pages/berita.blade.php --}}
    @extends('layouts.app')
    @section('title', 'Beranda - Itci Hutani Manunggal')
    @section('body_class', 'service-details-page')


    @push('styles')
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
                                <h1>MEMASTIKAN <span class="hero-badge">KEBERLANJUTAN</span> UNTUK MASA DEPAN</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </section><!-- /Hero Section -->

            <!-- About Section -->
            <section id="about" class="about section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="content">
                            <p class="lead">Tentang Kami</p>
                            <h2>Perusahaan Yang Bergerak Dibidang Hutan Tanam Dengan Acacia Mangium Dan Eucalyptus Sp.
                            </h2>
                            <p>Perusahaan yang bergerak dibidang Hutan Tanam dengan Acacia Mangium dan Eucalyptus Sp.
                                dengan luasan konsesi ±114,830 Ha terletak di Provinsi Kalimantan Timur yang telah
                                mendapatkan izin berusaha pemanfaatan hutan dengan nomor
                                SK.198/Menlhk/Setjen/HPL.2/3/2022 yang dikeluarkan oleh Menteri Lingkungan Hidup Dan
                                Kehutanan pada tanggal 10 Maret 2022.</p>
                            <div class="cta-wrapper">
                                <a href="{{ route('pages.sertifikat') }}" class="btn btn-primary">Sertifikat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div id="aboutCarousel" class="carousel slide carousel-fade image-wrapper" data-bs-ride="carousel"
                            data-bs-interval="4000" data-bs-pause="false">

                            <div class="carousel-inner">

                                <!-- Slide 1 -->
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/img/about/nursery.jpg') }}"
                                        class="d-block w-100 carousel-img" alt="Nursery">
                                </div>

                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/bg/bg-14.JPG') }}" class="d-block w-100 carousel-img"
                                        alt="Hutan" loading="lazy">
                                </div>

                                <!-- Slide 3 -->
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/hrweb.jpg') }}" class="d-block w-100 carousel-img"
                                        alt="HR Web" loading="lazy">
                                </div>

                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="active"
                                    aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
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
                "speed": 5000,
                "autoplay": {
                    "delay": 1,
                    "disableOnInteraction": false
                },
                "centeredSlides": true,
                "slideToClickedSlide": true,
                "slidesPerView": "auto",
                "spaceBetween": 10,
                "breakpoints": {
                    "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 10
                    },
                    "640": {
                    "slidesPerView": 3,
                    "spaceBetween": 10
                    },
                    "992": {
                    "slidesPerView": 4,
                    "spaceBetween": 10
                    },
                    "1200": {
                    "slidesPerView": 6,
                    "spaceBetween": 10
                    }
                }
                }
            </script>

                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/1.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->
                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/2.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/3.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/4.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/5.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/6.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/1.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/2.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/3.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/4.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/5.png') }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Client Item -->

                            <div class="swiper-slide">
                                <div class="client-logo">
                                    <img src="{{ asset('assets/img/clients/6.png') }}" class="img-fluid" alt="">
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
                                <p>Kami percaya pada kekuatan, ketulusan dan ketahanan dalam pengelolaan kehutanan. Di
                                    ITCI Hutani Manunggal, tim perempuan kami yang beragam memimpin upaya ini, mulai dari
                                    konservasi hingga pengelolaan dengan sentuhan ketulusan yang didasari oleh pelatihan,
                                    kompetensi, dukungan serta kerjasama seluruh insan ITCI Hutani Manunggal.
                                    Bersama-sama, kita membentuk praktik kehutanan berkelanjutan dengan melindungi
                                    ekosistem, dan mendorong inovasi. Dengan dedikasi dan persatuan, kami tidak hanya
                                    menanam pohon, namun juga memupuk budaya di mana perempuan bisa berkembang, sehingga
                                    memberikan dampak jangka panjang pada industri dan dunia. Bergabunglah bersama kami
                                    saat kami membuka jalan menuju masa depan yang lebih hijau dan inkluswif.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-image">
                                <img src="{{ asset('assets/img/about/nobgJane.png') }}" alt="Business Services"
                                    class="img-fluid">
                                <div class="shape-circle"></div>
                                <div class="shape-accent"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section><!-- /Featured Services Section -->

            <!-- Portfolio Section -->
            <section id="portfolio" class="portfolio section section-gray">

                <!-- Section Title -->
                <div class="container section-title">
                    <h2>KEBERLANJUTAN</h2>
                    <p>Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan
                        Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                        data-sort="original-order">

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center mt-4">
                                <ul class="portfolio-filters isotope-filters">
                                    <li data-filter="*" class="filter-active">Semua</li>
                                    @foreach ($kebFilters as $f)
                                        <li data-filter=".{{ $f['class'] }}">{{ $f['title'] }}</li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('pages.keberlanjutan') }}" class="more-link"
                                            aria-label="Lihat semua fasilitas">
                                            Selengkapnya
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row gy-4 portfolio-container isotope-container">
                            @foreach ($kebItems as $it)
                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $it['filter_class'] }}">
                                    <div class="portfolio-wrap">
                                        <img src="{{ $it['img'] }}" class="img-fluid" alt="{{ $it['title'] }}"
                                            loading="lazy">
                                        <div class="portfolio-info">
                                            <h4>{{ $it['title'] }}</h4>
                                            <p>{{ $it['categoryText'] }}</p>
                                            <div class="portfolio-links">
                                                <a href="{{ $it['lightbox'] }}" class="glightbox"
                                                    title="{{ $it['title'] }}">
                                                    <i class="bi bi-zoom-in"></i>
                                                </a>
                                                <a href="{{ $it['details_url'] }}" title="More Details">
                                                    <i class="bi bi-link-45deg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </section>
            <!-- /Portfolio Section -->

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
                            @foreach ($past as $i)
                                <div class="swiper-slide">
                                    <a href="{{ route('pages.berita-detail', ['id' => $i->id]) }}"
                                        class="text-decoration-none">
                                        <div class="team-card">
                                            <div class="team-image">
                                                <img src="{{ asset($i->cover) }}" class="team-cover img-fluid"
                                                    alt="{{ $i->title_id ?? '' }}" loading="lazy">
                                                <div class="team-overlay"></div>
                                            </div>
                                            <div class="team-content">
                                                <h3>{{ $i->title_id }}</h3>
                                                <span>{{ \Illuminate\Support\Str::limit(strip_tags($i->content_id), 200) }}</span>
                                                <p>{{ $i->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container section-title">
                                <div class="swiper-navigation">
                                    <a href="{{ route('berita') }}"><br>Selengkapnya</a>
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Team Section -->

            <section id="features" class="features section">
                <div class="container section-title">
                    <h2>Fasilitas</h2>

                </div>
                <div class="container">
                    <div class="row g-4">

                        {{-- NAV KIRI --}}
                        <div class="col-lg-4">
                            <ul class="nav nav-tabs flex-column" role="tablist">
                                @foreach (($features ?? collect())->take(5) as $i => $f)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            data-bs-target="#features-tab-{{ $i + 1 }}" role="tab">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h4>{{ $f->title ?? 'Judul' }}</h4>
                                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($f->description ?? ''), 80) ?: 'Deskripsi singkat' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                <li class="mt-2">
                                    <a href="{{ route('pages.fasilitas') }}" class="more-link"
                                        aria-label="Lihat semua fasilitas">
                                        Selengkapnya
                                        <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        {{-- KONTEN TAB --}}
                        <div class="col-lg-8">
                            <div class="tab-content">
                                @php
                                    $fallbacks = [
                                        'assets/img/misc/misc-square-6.webp',
                                        'assets/img/misc/misc-square-13.webp',
                                        'assets/img/misc/misc-square-3.webp',
                                        'assets/img/misc/misc-square-5.webp',
                                        'assets/img/misc/misc-square-3.webp',
                                    ];
                                @endphp

                                @foreach (($features ?? collect())->take(5) as $i => $f)
                                    <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}"
                                        id="features-tab-{{ $i + 1 }}" role="tabpanel">
                                        <div class="content-box">
                                            <div class="row g-4">
                                                <div class="col-lg-6">
                                                    <h3>{{ $f->title ?? 'Judul' }}</h3>
                                                    <p class="highlight">
                                                        {{ \Illuminate\Support\Str::limit(strip_tags($f->content ?? ''), 140) }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="image-box">
                                                        <a href="{{ $f->cover ? asset($f->cover) : asset($fallbacks[$i] ?? 'assets/img/misc/misc-square-6.webp') }}"
                                                            class="glightbox" data-gallery="fasilitas">
                                                            <img src="{{ $f->cover ? asset($f->cover) : asset($fallbacks[$i] ?? 'assets/img/misc/misc-square-6.webp') }}"
                                                                alt="{{ $f->title ?? '' }}" class="img-fluid"
                                                                loading="lazy" decoding="async">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Vendor JS Files --><!-- Main JS File -->

    @endsection
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const root = document.querySelector('#features');
                if (!root) return;

                // Lightbox (opsional, kalau GLightbox tersedia)
                if (window.GLightbox) {
                    GLightbox({
                        selector: '#features .glightbox'
                    });
                }

                // Auto-rotate tab
                const links = Array.from(root.querySelectorAll('.nav-tabs .nav-link'));
                if (links.length > 1) {
                    let idx = links.findIndex(l => l.classList.contains('active'));
                    let playing = true,
                        timer = null;

                    const play = () => {
                        clearInterval(timer);
                        timer = setInterval(() => {
                            if (!playing) return;
                            idx = (idx + 1) % links.length;
                            const tab = new bootstrap.Tab(links[idx]);
                            tab.show();
                        }, 5000); // 5 detik per tab
                    };
                    const pause = () => {
                        playing = false;
                        clearInterval(timer);
                    };

                    root.addEventListener('mouseenter', pause);
                    root.addEventListener('mouseleave', () => {
                        playing = true;
                        play();
                    });
                    links.forEach(l => l.addEventListener('click', () => {
                        idx = links.indexOf(l);
                        pause();
                    }));

                    play();
                }
            });
        </script>
    @endpush

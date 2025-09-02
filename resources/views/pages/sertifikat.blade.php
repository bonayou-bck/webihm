{{-- resources/views/pages/sustainability-gallery.blade.php --}}
@extends('layouts.app')

@section('title', 'Sertifikat')
@section('body_class', 'sustainability-gallery-page')

@section('content')
    <main class="main">
        {{-- HERO --}}
        <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
            <div class="container position-relative">
                <h1>Sertifikat</h1>
                <h2>Komitmen kami terhadap standar internasional dan praktik terbaik industri kehutanan. Sertifikasi kami membuktikan dedikasi dalam mengelola hutan secara lestari, menjaga lingkungan, dan memastikan keselamatan kerja.</h2>
            </div>
        </div>

        <section id="portfolio" class="portfolio section">
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 portfolio-container isotope-container">
                        @foreach ($ser as $item)
                            @php $lbId = 'lb-sertif-' . $loop->index; @endphp

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                                <div class="portfolio-wrap shadow-sm js-card" data-src="{{ asset($item->showcase) }}">
                                    {{-- Thumbnail seragam --}}
                                    <img src="{{ asset($item->showcase) }}" class="img-fluid portfolio-thumb"
                                        alt="{{ e($item->name_id) }}" loading="lazy">
                                    <div class="portfolio-info">
                                        <h4 class="mb-1">{{ $item->name_id }}</h4>
                                        <p class="text-muted small mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($item->description_id ?? ''), 120) }}</p>
                                        <div class="portfolio-links">
                                            {{-- Open GLightbox dengan konten inline (side-by-side) --}}
                                            <a href="#{{ $lbId }}" class="glightbox"
                                                data-gallery="sustainability-gallery" data-width="95vw" data-height="90vh">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Konten inline untuk GLightbox: gambar kiri, teks kanan --}}
                            <div id="{{ $lbId }}" class="glightbox-inline" style="display:none;">
                                <div class="lb-wrap">
                                    <div class="lb-flex">
                                        <div class="lb-media">
                                            <img src="{{ asset($item->showcase) }}" alt="{{ e($item->name_id) }}">
                                        </div>
                                        <div class="lb-side">
                                            <h3 class="lb-title">{{ $item->name_id }}</h3>
                                            <div class="lb-desc prose-email">{!! $item->description_id !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> {{-- /.row --}}
                </div>
            </div>
        </section>
    </main>
@endsection

@push('styles')
    <style>
        /* --- Grid & kartu rapi --- */
        .portfolio .portfolio-item .portfolio-wrap {
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .portfolio .portfolio-item .portfolio-wrap:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
        }

        /* Thumbnail seragam, crop rapi */
        .portfolio .portfolio-item .portfolio-wrap > .portfolio-thumb {
            display: block;
            width: 100%;
            height: clamp(180px, 22vw, 260px);
            object-fit: cover;
            object-position: center;
            background: #f2f4f7;
        }
        .portfolio .portfolio-item .portfolio-info { padding: 12px 14px; }

        /* ====== GLightbox: pakai ruang lebih besar & layout samping ====== */

        /* Perkecil padding default GLightbox & lebarkan kontainer */
        .glightbox-clean .gslide-content { padding: 16px !important; }
        .glightbox-clean .ginner-container { max-width: 96vw !important; }

        /* --- Layout GLightbox inline: side-by-side --- */
        .lb-wrap { width: min(96vw, 1400px); margin: 0 auto; }

        /* Tinggi besar (90vh) supaya gambar tidak kecil */
        .lb-flex {
            display: flex;
            gap: 24px;
            align-items: stretch;   /* penting: kolom ikut setinggi container */
            height: 90vh;
            max-height: 90vh;
        }

        /* Rasio kolom: gambar 68% | teks 32% */
        .lb-media   { flex: 0 1 68%; min-width: 0; }
        .lb-side    { flex: 1;      min-width: 0; overflow: auto; padding-right: 4px; }

        .lb-title { margin: 0 0 8px; font-size: 1.25rem; font-weight: 700; }
        .lb-desc  { margin: 0; color: #5e6a7a; line-height: 1.6; }

        /* Gambar isi penuh tinggi kolom (proporsional, tanpa gepeng) */
        .lb-media img {
            display: block;
            width: 100%;
            height: 100%;             /* kunci: pakai seluruh tinggi kolom */
            object-fit: contain;      /* jaga proporsi; ubah ke 'cover' jika mau penuh dengan crop */
            object-position: center;
            background: #0b0b0b;
            border-radius: 12px;
        }

        /* Responsive: stack di layar kecil */
        @media (max-width: 768px) {
            .lb-flex {
                flex-direction: column;
                height: auto;
                max-height: unset;
            }
            .lb-media img {
                height: 60vh;          /* tetap besar di mobile */
                max-height: 70vh;
            }
        }

        /* Tipografi ala email: rapi dan mudah dibaca */
        .prose-email { color:#243143; line-height:1.7; font-size:1rem; }
        .prose-email p { margin: 0 0 .9rem; }
        .prose-email h1,.prose-email h2,.prose-email h3,.prose-email h4,.prose-email h5,.prose-email h6{ margin:1.2rem 0 .6rem; font-weight:700; }
        .prose-email ul,.prose-email ol{ margin:.4rem 0 1rem; padding-left:1.25rem; }
        .prose-email li+li{ margin-top:.35rem; }
        .prose-email blockquote{ margin:1rem 0; padding:.6rem 1rem; border-left:4px solid #d0d7de; background:#f8fafc; color:#475569; border-radius:6px; }
        .prose-email img{ max-width:100%; height:auto; border-radius:8px; }
        .prose-email a{ color:#0d6efd; text-decoration:underline; }
        .prose-email table{ width:100%; border-collapse:collapse; margin:1rem 0; }
        .prose-email th,.prose-email td{ border:1px solid #e5e7eb; padding:.5rem .75rem; }
    </style>
@endpush


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Init GLightbox (inline selector tetap sama)
            if (typeof GLightbox !== 'undefined') {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
@endpush

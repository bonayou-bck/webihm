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
                <p class="lead lead-muted">Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan
                    Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
            </div>
        </div>
        <section id="portfolio" class="portfolio section">
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 portfolio-container isotope-container">
                        @foreach ($ser as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                                <div class="portfolio-wrap">
                                    <img src="{{ asset($item->showcase) }}" class="img-fluid" alt="Capturing Moments"
                                        loading="lazy">
                                    <div class="portfolio-info">
                                        <h4>{{ $item->name_id }}</h4>
                                        <p>{{ $item->description_id }}</p>
                                        <div class="portfolio-links">
                                            <a href="{{ asset($item->showcase) }}" class="glightbox"
                                                data-gallery="sustainability-gallery"
                                                data-glightbox="title: {{ e($item->name_id) }}; description: {{ e($item->description_id) }}">
                                                <i class="bi bi-zoom-in"></i>
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

    </main>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof GLightbox !== 'undefined') {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
@endpush

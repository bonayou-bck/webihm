{{-- resources/views/pages/fasilitas.blade.php --}}
@extends('layouts.app')
@section('title', 'Fasilitas - Itci Hutani Manunggal')
@section('body_class', 'service-details-page')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
            <div class="container position-relative">
                <h1 class="mb-2">Fasilitas</h1>
                <nav class="breadcrumbs">
                    <ol></ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Fasilitas Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-12">

                        <div class="service-content">
                            <div class="row g-4">
                                @forelse($features as $item)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            @if (!empty($item->foto))
                                                <div class="thumb">
                                                    <a href="{{ asset(ltrim($item->foto, '/')) }}" class="glightbox"
                                                        data-gallery="fasilitas" data-title="{{ $item->title }}"
                                                        data-description="{{ \Illuminate\Support\Str::limit(strip_tags($item->description ?? ''), 160) }}">
                                                        <img src="{{ asset(ltrim($item->foto, '/')) }}"
                                                            alt="{{ $item->title }}" class="thumb-img" loading="lazy"
                                                            decoding="async">
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="card-body">
                                                <h5 class="card-title mb-2">{{ $item->title }}</h5>
                                                @if (!empty($item->description))
                                                    <div class="card-text text-muted">
                                                        {!! nl2br(e($item->description)) !!}
                                                    </div>
                                                @else
                                                    <div class="text-muted">—</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-muted">Belum ada data fasilitas.</div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Fasilitas Section -->

    </main>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.GLightbox) {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
@endpush
@push('styles')
<style>
  /* Rasio seragam untuk thumbnail (ubah 4/3 jika mau 1/1, 16/9, dll.) */
  .service-details .thumb{
    aspect-ratio: 4/3;  /* <- ubah di sini kalau perlu */
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    background: #f6f7f9;
  }
  .service-details .thumb-img{
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .35s ease;
  }
  .service-details .thumb:hover .thumb-img{ transform: scale(1.03); }

  /* Fallback untuk browser lama yang belum support aspect-ratio */
  @supports not (aspect-ratio: 1) {
    .service-details .thumb{ position: relative; }
    .service-details .thumb::before{
      content: ""; display: block; padding-top: calc(100% * 3 / 4); /* 4/3 */
    }
    .service-details .thumb > a,
    .service-details .thumb > a > img{
      position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    }
  }
</style>
@endpush


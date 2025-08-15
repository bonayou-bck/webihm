{{-- resources/views/pages/berita-detail.blade.php --}}
@extends('layouts.app')
@section('title','Berita Detail - Itci Hutani Manunggal')
@section('body_class','berita-detail-page')

@section('content')
<main class="main">
  {{-- Page Title --}}
  <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.webp') }}');">
    <div class="container position-relative">
      <h1>Berita</h1>
      <p>Kumpulan informasi dan kabar terbaru dari PT Itci Hutani Manunggal.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('dashboard') }}">Home</a></li>
          <li><a href="{{ route('pages.berita') }}">Berita</a></li>
          <li class="current">Judul Berita</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="blog section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-8">
          {{-- Content --}}
          <article>
            <div class="mb-3">
              <img class="img-fluid rounded" src="{{ asset('assets/img/placeholders/cover-16x9.jpg') }}" alt="cover">
            </div>
            <h2 class="h3">Judul Berita</h2>
            <div class="post-meta mb-3 text-muted">
              <span class="me-2"><i class="bi bi-person"></i> Admin</span>
              <span class="me-2"><i class="bi bi-calendar-event"></i> {{ now()->format('d M Y') }}</span>
              <span>
                <a href="#" class="badge bg-light text-dark border">Perusahaan</a>
                <a href="#" class="badge bg-light text-dark border">Kegiatan</a>
              </span>
            </div>
            <div class="content">
              <p>Isi konten berita ditampilkan di sini. Gunakan controller untuk mengisi data dinamis (judul, cover, konten, kategori, dan lainnya).</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <blockquote class="blockquote px-3 py-2 bg-light border-start border-4">
                <p class="mb-0">"Kutipan penting yang mendukung isi berita."</p>
              </blockquote>
              <p>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>
            </div>
          </article>

          {{-- Share --}}
          <div class="mt-4 d-flex align-items-center">
            <div class="me-3">Bagikan:</div>
            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"><i class="bi bi-facebook"></i></a>
            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Judul Berita') }}"><i class="bi bi-twitter-x"></i></a>
            <a class="btn btn-sm btn-outline-secondary" target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode('Judul Berita - '.request()->fullUrl()) }}"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
          <div class="sidebar sidebar-sticky">
            <div class="widget mb-4">
              <h4 class="widget-title">Terbaru</h4>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><a class="text-decoration-none" href="{{ route('pages.berita-detail') }}">Judul Berita Satu</a><div class="small text-muted">{{ now()->format('d M Y') }}</div></li>
                <li class="mb-2"><a class="text-decoration-none" href="{{ route('pages.berita-detail') }}">Judul Berita Dua</a><div class="small text-muted">{{ now()->format('d M Y') }}</div></li>
              </ul>
            </div>

            <div class="widget">
              <h4 class="widget-title">Kategori</h4>
              <div>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">Perusahaan</a>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">Kegiatan</a>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">CSR</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

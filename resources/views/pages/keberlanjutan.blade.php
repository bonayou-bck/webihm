{{-- resources/views/pages/keberlanjutan.blade.php --}}
@extends('layouts.app')

@section('title', 'Keberlanjutan')
@section('body_class', 'keberlanjutan-page')

@push('styles')
  {{-- gunakan CSS-mu yang ada; tidak diubah --}}
@endpush

@section('content')
<main class="main">

  {{-- HERO --}}
  <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
    <div class="container position-relative">
      <h1 class="mb-3">Keberlanjutan</h1>
      <p>Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
    </div>
  </div>

  @forelse($kebs as $k)
    @php
      $desc = trim(preg_replace('/\s+/', ' ', strip_tags($k->content ?? '')));
      $imgs = $k->Keberlanjutan_img ?? collect();
    @endphp

    <section class="section">
      <div class="container">

        {{-- Judul + Deskripsi --}}
        <div class="row g-4 align-items-start mb-4">
          <div class="col-lg-6">
            <h2 class="title-xl">{{ $k->title }}</h2>
          </div>
          <div class="col-lg-6 desc">
            {!! $k->content !!}
          </div>
        </div>

        {{-- Cover (opsional) --}}
        @if(!empty($k->cover))
          <div class="row mb-4">
            <div class="col-12">
              <figure class="hero-image">
                <a href="{{ asset($k->cover) }}"
                   class="glightbox"
                   data-gallery="k{{ $k->id }}"
                   data-title="{{ e($k->title) }}"
                   data-description="{{ $desc }}">
                  <img src="{{ asset($k->cover) }}" alt="{{ $k->title }}" class="img-fluid" loading="lazy" decoding="async">
                </a>
              </figure>
            </div>
          </div>
        @endif

        {{-- Galeri gambar (opsional) --}}
@if($imgs->count())
  <div class="row g-3">
    @foreach($imgs as $img)
      <div class="col-6 col-md-4 col-lg-3">
        <a class="glightbox keb-thumb"
           href="{{ asset($img->src) }}"
           data-gallery="k{{ $k->id }}"
           data-title="{{ e($k->title) }}"
           data-description="{{ $desc }}">
          <img src="{{ asset($img->src) }}" alt="{{ $k->title }}" class="keb-thumb-img" loading="lazy" decoding="async">
        </a>
      </div>
    @endforeach
  </div>
@endif


      </div>
    </section>
  @empty
    <section class="section"><div class="container">
      <div class="text-muted">Belum ada data keberlanjutan.</div>
    </div></section>
  @endforelse

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
  if (window.GLightbox) { GLightbox({ selector: '.glightbox' }); }
});
</script>
@endpush
@push('styles')
<style>
  /* Ubah rasio di sini: 1/1 (persegi), 4/3, 3/2, 16/9, dll. */
  .keb-thumb{
    display:block;
    width:100%;
    aspect-ratio: 4 / 3;         /* <-- ganti ke 1 / 1 kalau mau kotak */
    border-radius: 12px;
    overflow:hidden;
    background:#f6f7f9;
  }
  .keb-thumb-img{
    width:100%; height:100%;
    object-fit:cover; display:block;
    transition: transform .35s ease;
  }
  .keb-thumb:hover .keb-thumb-img{ transform: scale(1.03); }

  /* Fallback untuk browser lama yang belum support aspect-ratio */
  @supports not (aspect-ratio: 1) {
    .keb-thumb{ position:relative; padding-top: calc(100% * 3 / 4); } /* 4/3 */
    .keb-thumb-img{ position:absolute; inset:0; width:100%; height:100%; object-fit:cover; }
  }
</style>
@endpush


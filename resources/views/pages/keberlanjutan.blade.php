{{-- resources/views/pages/keberlanjutan.blade.php --}}
@extends('layouts.app')

@section('title', 'Keberlanjutan')
@section('body_class', 'keberlanjutan-page')

@push('styles')
<style>
  /* HERO */
  .page-title{position:relative;padding:84px 0;color:#fff}
  .page-title::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.45),rgba(0,0,0,.25))}
  .page-title .container{position:relative;z-index:2}
  .lead-muted{opacity:.95;max-width:920px}

  /* Section */
  .section{padding:56px 0}
  .section + .section{border-top:1px solid rgba(0,0,0,.06)}

  /* Row 1 */
  .title-xl{font-size:1.6rem;margin:0 0 .5rem}
  .desc p{line-height:1.75;margin-bottom:1rem;color:#2b2f33}
  .desc p:last-child{margin-bottom:0}

  /* Row 2 large image */
  .hero-image{border-radius:14px;overflow:hidden;box-shadow:0 12px 28px rgba(0,0,0,.08)}
  .hero-image img{width:100%;height:auto;display:block;object-fit:cover}

  /* Row 3: auto-scrolling gallery */
.auto-scroll{
  --gap: 16px;
  position: relative;
  overflow: hidden;
  border-radius: 12px;
}
.auto-track{
  display: flex;
  gap: var(--gap);
  align-items: center; /* sebelumnya stretch, jadi center biar pas */
  will-change: transform;
}
.tile{
  position: relative;
  flex: 0 0 auto; /* biar ukurannya sesuai width/height */
  width: 400px;  /* ukuran fix */
  height: 400px; /* ukuran fix */
  border-radius: 12px;
  overflow: hidden;
  background:#000;
  box-shadow:0 10px 24px rgba(0,0,0,.06);
}
.tile img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  transition:transform .4s ease;
}
.tile:hover img{ transform: scale(1.04) }

  /* hover caption */
  .cap{
    position:absolute;inset:0;display:flex;align-items:flex-end;
    padding:.6rem;background:linear-gradient(180deg,rgba(0,0,0,0) 40%,rgba(0,0,0,.7) 100%);
    color:#fff;opacity:0;transition:opacity .25s ease
  }
  .tile:hover .cap{opacity:1}
  .cap h3{font-size:.95rem;margin:0;line-height:1.25}

  /* Responsive: 2 kolom di tablet, 1.25 di mobile (biar mudah swipe) */
  @media (max-width: 991.98px){
    .tile{ flex-basis: calc((100% - var(--gap)) / 2); }
  }
  @media (max-width: 575.98px){
    .tile{ flex-basis: 80%; }
  }

  /* Helpers */
  .mb-32{margin-bottom:32px}
</style>
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
  </div>

  {{-- ================= SECTION 1 ================= --}}
  <section class="section">
    <div class="container">

      {{-- Row 1: Judul (col-1) + Deskripsi (col-2) --}}
      <div class="row g-4 align-items-start mb-32">
        <div class="col-lg-6">
          <h2 class="title-xl">Perencanaan Berkelanjutan</h2>
        </div>
        <div class="col-lg-6 desc">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lacus ac nunc luctus sollicitudin. Integer ut diam vitae lacus ultrices commodo. Phasellus eu leo eget nulla tristique imperdiet non sit amet risus.</p>
          <p>Vestibulum hendrerit tincidunt erat, ac iaculis ante aliquet id. Phasellus elementum, augue ac cursus ornare, arcu neque finibus nibh, sed dignissim dolor lacus sed metus. Cras eu mattis mauris.</p>
        </div>
      </div>

      {{-- Row 2: Gambar besar (1 buah) --}}
      <div class="row mb-4">
        <div class="col-12">
          <figure class="hero-image">
            <a href="{{ asset('assets/img/keberlanjutan/lnd.png') }}"
               class="glightbox"
               data-gallery="s1"
               data-title="Pengelolaan Lahan"
               data-description="Konservasi area bernilai ekologi tinggi & perencanaan lanskap berkelanjutan.">
              <img src="{{ asset('assets/img/keberlanjutan/lnd.png') }}" alt="Pengelolaan Lahan" loading="lazy" decoding="async">
            </a>
          </figure>
        </div>
      </div>

      {{-- Row 3: 3 gambar bergulir --}}
      <div class="row">
        <div class="col-12">
          <div class="auto-scroll" data-speed="0.35" id="scroll-s1">
            <div class="auto-track">
              {{-- tiga item utama --}}
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/nursery.png') }}" data-gallery="s1" data-title="Nursery & Persemaian" data-description="Produksi bibit untuk rehabilitasi & reforestasi.">
                <img src="{{ asset('assets/img/keberlanjutan/nursery.png') }}" alt="Nursery & Persemaian" loading="lazy">
                <div class="cap"><h3>Nursery & Persemaian</h3></div>
              </a>
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/ehs.png') }}" data-gallery="s1" data-title="EHS" data-description="Keselamatan kerja, kesehatan, dan pengelolaan dampak lingkungan.">
                <img src="{{ asset('assets/img/keberlanjutan/ehs.png') }}" alt="EHS" loading="lazy">
                <div class="cap"><h3>EHS</h3></div>
              </a>
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/qa.png') }}" data-gallery="s1" data-title="Quality Assurance" data-description="Kontrol mutu & audit internal untuk praktik berkelanjutan.">
                <img src="{{ asset('assets/img/keberlanjutan/qa.png') }}" alt="Quality Assurance" loading="lazy">
                <div class="cap"><h3>Quality Assurance</h3></div>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  {{-- ================= SECTION 2 ================= --}}
  <section class="section">
    <div class="container">

      {{-- Row 1: Judul + Deskripsi --}}
      <div class="row g-4 align-items-start mb-32">
        <div class="col-lg-6">
          <h2 class="title-xl">Implementasi di Lapangan</h2>
        </div>
        <div class="col-lg-6 desc">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer laoreet risus a mi pulvinar tincidunt. Vivamus sed nisl nec velit tincidunt vestibulum sed nec velit. Aliquam at nibh a massa porttitor congue.</p>
          <p>Praesent semper, enim id venenatis laoreet, felis enim aliquam ligula, id finibus mauris urna quis felis. Suspendisse vitae augue ut nunc ultrices finibus. Mauris non feugiat lorem, eget iaculis mauris.</p>
        </div>
      </div>

      {{-- Row 2: Gambar besar (1 buah) --}}
      <div class="row mb-4">
        <div class="col-12">
          <figure class="hero-image">
            <a href="{{ asset('assets/img/keberlanjutan/ehs.png') }}"
               class="glightbox"
               data-gallery="s2"
               data-title="EHS (Environment, Health & Safety)"
               data-description="Kerangka EHS memastikan implementasi berjalan aman dan patuh.">
              <img src="{{ asset('assets/img/keberlanjutan/ehs.png') }}" alt="EHS (Environment, Health & Safety)" loading="lazy" decoding="async">
            </a>
          </figure>
        </div>
      </div>

      {{-- Row 3: 3 gambar bergulir --}}
      <div class="row">
        <div class="col-12">
          <div class="auto-scroll" data-speed="0.35" data-direction="reverse" id="scroll-s2">
            <div class="auto-track">
              {{-- tiga item utama --}}
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/qa.png') }}" data-gallery="s2" data-title="Quality Assurance" data-description="Audit & kontrol mutu sebagai fondasi tata kelola.">
                <img src="{{ asset('assets/img/keberlanjutan/qa.png') }}" alt="Quality Assurance" loading="lazy">
                <div class="cap"><h3>Quality Assurance</h3></div>
              </a>
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/pesawat.png') }}" data-gallery="s2" data-title="Efisiensi Logistik" data-description="Optimasi rute & moda untuk menekan emisi dan biaya.">
                <img src="{{ asset('assets/img/keberlanjutan/pesawat.png') }}" alt="Efisiensi Logistik" loading="lazy">
                <div class="cap"><h3>Efisiensi Logistik</h3></div>
              </a>
              <a class="tile glightbox" href="{{ asset('assets/img/keberlanjutan/jen.png') }}" data-gallery="s2" data-title="Pemberdayaan Komunitas" data-description="Keterlibatan & edukasi masyarakat sekitar operasional.">
                <img src="{{ asset('assets/img/keberlanjutan/jen.png') }}" alt="Pemberdayaan Komunitas" loading="lazy">
                <div class="cap"><h3>Pemberdayaan Komunitas</h3></div>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

</main>
@endsection

@push('scripts')
<script>
  // Inisialisasi GLightbox (pastikan vendor glightbox sudah di-load di layout)
  document.addEventListener('DOMContentLoaded', function(){
    if (typeof GLightbox !== 'undefined') {
      GLightbox({ selector: '.glightbox' });
    }

    // Auto-scrolling gallery untuk row ke-3 (infinite marquee yang bisa di-pause saat hover)
    function initAutoScroll(container){
      const speed = parseFloat(container.dataset.speed || '0.35'); // px per frame
      const reverse = container.dataset.direction === 'reverse';
      const track = container.querySelector('.auto-track');
      if (!track) return;

      // Duplikasi anak-anak agar loop mulus
      const items = Array.from(track.children);
      items.forEach(node => track.appendChild(node.cloneNode(true)));

      let rafId = null;
      let pos = 0;
      const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || '16');

      function step(){
        pos += reverse ? -speed : speed;
        // Reset posisi ketika geser melebihi lebar kumpulan item asli
        const firstWidth = items.reduce((w, el) => w + el.getBoundingClientRect().width + gap, -gap);
        if (!reverse && pos >= firstWidth) pos = 0;
        if (reverse && -pos >= firstWidth) pos = 0;
        track.style.transform = `translate3d(${reverse ? pos : -pos}px,0,0)`;
        rafId = requestAnimationFrame(step);
      }

      // Pause on hover/touch
      function pause(){ if (rafId) cancelAnimationFrame(rafId); rafId = null; }
      function play(){ if (!rafId) rafId = requestAnimationFrame(step); }

      container.addEventListener('mouseenter', pause);
      container.addEventListener('mouseleave', play);
      container.addEventListener('touchstart', pause, {passive:true});
      container.addEventListener('touchend', play, {passive:true});

      // Mulai
      play();

      // Recalculate on resize (agar lebar item akurat)
      let resizeTimer;
      window.addEventListener('resize', ()=>{
        pause();
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(()=>{
          pos = 0;
          track.style.transform = 'translate3d(0,0,0)';
          play();
        }, 150);
      });
    }

    document.querySelectorAll('.auto-scroll').forEach(initAutoScroll);
  });
</script>
@endpush

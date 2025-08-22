      {-- resources/views/pages/berita.blade.php --}
      @extends('layouts.app')
      @section('title', 'Tentang - Itci Hutani Manunggal')
      @section('body_class', 'service-details-page')
      @section('content')
      <main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
    <div class="container position-relative">
      <!-- <h1>Tentang</h1> -->
      <h2>Perusahaan yang bergerak dibidang Hutan Tanam dengan Acacia Mangium dan Eucalyptus Sp. dengan luasan konsesi ±114,830 Ha terletak di Provinsi Kalimantan Timur yang telah mendapatkan izin berusaha pemanfaatan hutan dengan nomor SK.198/Menlhk/Setjen/HPL.2/3/2022 yang dikeluarkan oleh Menteri Lingkungan Hidup Dan Kehutanan pada tanggal 10 Maret 2022.</h2>
      <nav class="breadcrumbs">
        <ol>
          <!-- <li><a href="{{ route('dashboard') }}">Home</a></li> -->
          <!-- <li class="current">Service Details</li> -->
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Service Details Section -->

<section id="service-details" class="service-details section">
  <div class="container">
    <div class="row gy-5">
      <div class="col-lg-12">

        {{-- Badge --}}
        <div class="service-hero mb-3">
          <div class="service-badge"><span>Premium Service</span></div>
        </div>

        {{-- Sertifikat: teks kiri, logo kanan --}}
        <div class="service-gallery mb-4">
          <div class="cert-row">
            <h4>Sertifikat Kami</h4>
            <div class="cert-logos">
              <img src="{{ asset('assets/img/clients/aja.png') }}"   alt="AJA"   class="cert-logo">
              <img src="{{ asset('assets/img/clients/ifcc.png') }}"  alt="IFCC"  class="cert-logo">
              <img src="{{ asset('assets/img/clients/iso14.png') }}" alt="ISO 14001" class="cert-logo">
              <img src="{{ asset('assets/img/clients/iso45.png') }}" alt="ISO 45001" class="cert-logo">
              <img src="{{ asset('assets/img/clients/pefc.png') }}"  alt="PEFC"  class="cert-logo">
              <img src="{{ asset('assets/img/clients/ti.png') }}"    alt="TI"    class="cert-logo">
            </div>
          </div>
        </div>

        <div class="service-content">

          {{-- VISI --}}
          <div class="service-features">
            <div class="feature-item">
              <div class="feature-content visi-text">
                <h2>Visi</h2>
                <h5>
                  Menjadi penghasil serat kayu tanaman terbaik di dunia dan menyediakan serat berkualitas tinggi kepada para pelanggan
                  dengan memperhatikan kontribusi kepada masyarakat luas serta pelaksanaan standar-standar lingkungan dan keselamatan kerja.
                </h5>
              </div>
            </div>
          </div>

          {{-- MISI --}}
          <div class="service-features">
            <div class="feature-item">
              <div class="feature-content">
                <h2>Misi</h2>
                <ul>
                  <li>Melaksanakan pembangunan hutan tanaman lestari di lokasi operasional dengan menerapkan Kebijakan Pengelolaan Hutan Lestari (aspek lingkungan, produksi, sosial).</li>
                  <li>Mewujudkan kemakmuran masyarakat dan penyediaan bahan baku yang lestari pada lahan konsesi sesuai penetapan Pemerintah.</li>
                  <li>Mendukung tujuan pemerintah terkait perubahan iklim dan pengelolaan konservasi untuk mencapai/ mempertahankan status konservasi di wilayah operasi.</li>
                  <li>Menjamin hanya kayu serat legal yang dikirimkan/masuk ke jalur produksi; mendukung Pemerintah memerangi pembalakan liar.</li>
                  <li>Mengelola konsesi secara lestari dengan konsep mosaik hutan tanaman demi kelestarian & peningkatan keanekaragaman hayati (pendekatan NKT).</li>
                  <li>Memastikan K3 serta kesejahteraan karyawan/kontraktor/masyarakat; meningkatkan kinerja LHK & K3 secara berkelanjutan.</li>
                  <li>Melindungi lingkungan dan mencegah dampak negatif melalui pencegahan pencemaran.</li>
                  <li>Meminimalkan potensi konflik kerja dan meningkatkan produktivitas melalui efisiensi waktu & biaya.</li>
                  <li>Mendorong eko-efisiensi lewat penggunaan sumber daya alam yang bijak.</li>
                  <li>Menjaga citra industri dengan praktik yang tidak mencemari lingkungan.</li>
                </ul>
              </div>
            </div>
          </div>

          {{-- OBJECTIF --}}
          <div class="service-features">
            <div class="feature-item">
              <div class="feature-content">
                <h2>Objectif</h2>
                <h6>Dalam pelaksanaan bisnisnya, PT. ITCI HUTANI MANUNGGAL berkomitmen :</h6><br>
                <ul>
                  <li>Mematuhi peraturan perundang-undangan terkait pengelolaan hutan & lingkungan serta persyaratan lain yang diikuti perusahaan.</li>
                  <li>Melaksanakan & memelihara sistem manajemen lingkungan, kesehatan, dan keselamatan kerja di seluruh operasi.</li>
                  <li>Menerapkan praktik pengelolaan hutan terbaik untuk melindungi dan mencegah pencemaran air, tanah, dan udara.</li>
                  <li>Menetapkan tujuan & sasaran terukur; mencegah pencemaran, kecelakaan, dan penyakit akibat kerja; meninjau berkala untuk perbaikan berkelanjutan.</li>
                  <li>Mengintegrasikan isu sosial, lingkungan, kesehatan & keselamatan dalam perencanaan; menyesuaikan praktik dengan standar nasional/internasional tersertifikasi.</li>
                  <li>Menerapkan kebijakan tanpa membakar untuk persiapan lahan; mencegah & mengendalikan kebakaran hutan/asap.</li>
                  <li>Mengelola kawasan keanekaragaman hayati di konsesi untuk memaksimalkan nilai konservasi dan manfaat ekologi-sosial.</li>
                  <li>Melindungi kawasan lindung dari pembalakan liar serta berkolaborasi melindungi kawasan konservasi di luar konsesi.</li>
                  <li>Menerapkan program 3R (Reuse, Reduce, Recycle) dalam pengendalian pencemaran & pengelolaan SDA.</li>
                  <li>Menyediakan informasi yang akurat & dapat dipahami terkait sistem dan kinerja LHK & K3 perusahaan.</li>
                  <li>Memastikan kontraktor & karyawan memahami dampak lingkungan serta risiko K3, dan mematuhi prosedur perusahaan.</li>
                  <li>Meninjau berkala kebijakan LHK & K3 agar tetap relevan dengan perkembangan perusahaan.</li>
                  <li>Menyediakan kebijakan ini bagi pihak berkepentingan dan memastikan mitra menerima & melaksanakannya.</li>
                  <li>Melakukan perbaikan berkelanjutan pada sistem pengelolaan & kinerja LHK & K3 di seluruh operasi.</li>
                </ul>
              </div>
            </div>
          </div>

        </div> {{-- /service-content --}}

      </div>
    </div>
  </div>
</section>



</main>
      @endsection

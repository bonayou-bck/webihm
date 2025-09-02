@extends('layouts.app')
@section('title', 'Tentang - Itci Hutani Manunggal')
@section('body_class', 'service-details-page')
@section('content')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
    <div class="container position-relative">
      <h1>Tentang Kami</h1>
      <h2>Perusahaan Yang Bergerak Dibidang Hutan Tanam Dengan Acacia Mangium Dan Eucalyptus Sp. Pengelolaan Hutan Tanaman Industri secara lestari untuk masa depan yang berkelanjutan.</h2>
    </div>
  </div><!-- End Page Title -->

  <!-- Service Details Section -->

<section id="service-details" class="service-details section">
  <div class="container">
    <div class="row gy-5">
      <div class="col-lg-12">

        {{-- Sertifikat: teks kiri, logo kanan --}}
        {{-- <div class="service-gallery mb-4">
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
        </div> --}}

        <div class="service-content">
          {{-- VISI --}}
          <div class="row gy-4 mb-4">
            <div class="col-12">
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
            </div>
          </div>

          {{-- MISI --}}
          <div class="row gy-4">
            <div class="col-12">
              <div class="service-features mb-4">
                <div class="feature-item">
                  <div class="feature-content">
                    <h2>Misi</h2>
                    <ul>
                      <li>Melaksanakan pembangunan hutan tanaman lestari di lokasi operasional dengan menerapkan Kebijakan Pengelolaan Hutan Lestari (aspek lingkungan, produksi, sosial).</li>
                      <li>Mewujudkan kemakmuran masyarakat dan penyediaan bahan baku yang lestari pada lahan konsesi sesuai penetapan Pemerintah.</li>
                      <li>Mendukung tujuan pemerintah terkait perubahan iklim dan pengelolaan konservasi untuk mencapai/ mempertahankan status konservasi di wilayah operasi.</li>
                      <li>Menjamin hanya kayu serat legal yang dikirimkan/masuk ke jalur produksi; mendukung Pemerintah memerangi pembalakan liar.</li>
                      <li>Mengelola konsesi secara lestari dengan menerapkan konsep mosaik hutan tanaman untuk menghasilkan kayu serat untuk melestarikan dan meningkatkan keanekaragaman hayati serta ekosistem alami yang representatif sesuai dengan kerangka pendekatan Nilai Konservasi tinggi.</li>
                      <li>Mempromosikan dan melindungi kesehatan, keselamatan dan kesejahteraan karyawan, tenaga kerja kontraktor dan masyarakat sekitar wilayah operasi PT. ITCI HUTANI MANUNGGAL; meningkatkan kinerja Lingkungan, Sosial, Kesehatan dan Keselamatan secara berkelanjutan, dan Pengelolaan Hutan Tanaman Lestari.</li>
                      <li>Melindungi lingkungan untuk mencegah dampak negatif yang merugikan melalui pencegahan pencemaran lingkungan.</li>
                      <li>Meminimalisir potensi konflik antara pekerja dan pengusaha dalam penyediaan lingkungan kerja yang layak dan sehat dan meningkatkan produkstifitas pekerja melalui efisiensi waktu dan biaya.</li>
                      <li>Penggunaan sumberdaya alam yang lebih bijaksana menuju terciptanya eko-efisiensi.</li>
                      <li>Menjaga citra bisnis industri yang selama ini sering dikaitkan secara negatif dengan pencemaran lingkungan.</li>
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
                      <li>Menetapkan tujuan dan sasaran yang terukur, serta melakukan upaya strategis untuk mencegah pencemaran lingkungan, kecelakaan dan sakit akibat kerja terhadap karyawan dan pihak-pihak yang berkepentingan, dan melakukan pengkajian tujuan dan sasaran secara berkala untuk memperoleh perbaikan kinerja secara berkelanjutan;</li>
                      <li>Mengintegrasikan isu sosial, lingkungan, kesehatan dan keselamatan kerja dalam kegiatan perencanaan operasional; dan menyesuaikan praktek pengelolaan hutan tanaman dengan standar nasional dan internasional yang bertanggung jawab dan tersertifikasi.</li>
                      <li>Mempraktikkan secara ketat kebijakan 'tanpa membakar', dalam hubungannya dengan persiapan lokasi penanaman dan mendukung upaya aktif untuk mencegah dan menguasai kebakaran hutan dan asap;</li>
                      <li>Mengelola kawasan keanekaragaman hayati di dalam wilayah konsesi dengan tujuan memaksimalkan nilai konservasi dan nilai keanekaragaman hayatinya serta memaksimalkan manfaat ekologi dan sosialnya.</li>
                      <li>Melindungi kawasan keanekaragaman hayati dan kawasan lindung lainnya dari pembalakan liar dan bekerjasama dengan pihak-pihak yang berkepentingan lainnya untuk melindungi daerah konservasi lain diluar konsesi;</li>
                      <li>Melaksanakan progran Reuse, Reduce dan Recycle (3R) sebagai upaya pengendalian pencemaran dan pengelolaan Sumber Daya Alam.</li>
                      <li>Menyediakan kepada pihak-pihak yang berkepentingan informasi yang dapat dipahami, sesuai dengan isunya, dan menyajikan sistem pengelolaan dan kinerja lingkungan, kesehatan dan keselamatan kerja di Perusahaan secara akurat dan dapat dibuktikan;</li>
                      <li>Memastikan bahwa kontraktor-kontraktor dan karyawan di semua tingkatan dan fungsi organisasi menyadari tentang dampak lingkungan dan resiko kesehatan dan keselamatan akibat kegiatan mereka dan tiap individu wajib untuk melaksanakan Prosedur PT. ITCI HUTANI MANUNGGAL sesuai dengan kegiatannya;</li>
                      <li>Secara berkala meninjau kebijakan lingkungan, sosial, kesehatan dan keselamatan kerja ini untuk memastikan bahwa kebijakan tersebut tetap relevan dengan perkembangan perusahaan.</li>
                      <li>Memastikan bahwa kebijakan ini tersedia bagi pihak-pihak yang berkepentingan</li>
                      <li>Mendukung dan memastikan mitra-mitra usaha menerima dan melaksanakan prinsip-prinsip kebijakan ini; dan</li>
                      <li>Melakukan upaya-upaya terbaik untuk memperoleh peningkatan secara terus menerus dalam sistim pengelolaan dan kinerja Lingkungan, Sosial, Kesehatan dan Keselamatan kerja di seluruh operasional perusahaan</li>
                    </ul>
                  </div>
                </div>
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

{{-- resources/views/admin/berita-create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Berita')

@push('styles')
<style>
  .thumb-cover { width: 140px; height: 100px; object-fit: cover; border-radius: .5rem; border: 1px solid #eaeaea; }
  .form-text-counter { font-size: .8rem; opacity: .7; }
  .required:after { content:" *"; color:#dc3545; }
</style>
@endpush

@section('content')
  <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
      <h3 class="fw-bold mb-1">Tambah Berita</h3>
      <h6 class="op-7 mb-2">Isi detail berita di bawah ini</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
      <a href="{{ route('admin.berita') }}" class="btn btn-label-light btn-round me-2">
        <i class="fa fa-arrow-left me-1"></i> Kembali
      </a>
    </div>
  </div>

  <form action="#" method="post" enctype="multipart/form-data" id="formBerita">
    @csrf

    <div class="row">
      {{-- Kolom kiri: konten utama --}}
      <div class="col-lg-8">
        <div class="card card-round mb-4">
          <div class="card-header">
            <div class="card-title">Konten Berita</div>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required" for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul berita" required>
              <div class="form-text">Judul maksimal 120 karakter.</div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="slug">Slug (otomatis dari judul, bisa diubah)</label>
              <input type="text" class="form-control" id="slug" name="slug" placeholder="contoh: penanaman-pohon-di-kawasan-a">
            </div>

            <div class="mb-3">
              <label class="form-label required" for="excerpt">Ringkasan</label>
              <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Paragraf ringkas pembuka..." maxlength="300" required></textarea>
              <div class="form-text-counter"><span id="excerptCount">0</span>/300</div>
            </div>

            <div class="mb-0">
              <label class="form-label required" for="konten">Konten</label>
              <textarea class="form-control" id="konten" name="konten" rows="10" placeholder="Isi berita..." required></textarea>
              <div class="form-text">Tip: Anda bisa menempelkan HTML sederhana (bold, italic, link) atau teks biasa.</div>
            </div>
          </div>
        </div>

        <div class="card card-round">
          <div class="card-header">
            <div class="card-title">SEO (Opsional)</div>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label" for="meta_title">Meta Title</label>
              <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="60" placeholder="Judul SEO (≤ 60 karakter)">
              <div class="form-text-counter"><span id="metaTitleCount">0</span>/60</div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="meta_description">Meta Description</label>
              <textarea class="form-control" id="meta_description" name="meta_description" rows="2" maxlength="160" placeholder="Deskripsi SEO (≤ 160 karakter)"></textarea>
              <div class="form-text-counter"><span id="metaDescCount">0</span>/160</div>
            </div>
            <div class="mb-0">
              <label class="form-label" for="meta_keywords">Meta Keywords (pisahkan dengan koma)</label>
              <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="hutan lestari, reboisasi, lingkungan">
            </div>
          </div>
        </div>
      </div>

      {{-- Kolom kanan: metadata --}}
      <div class="col-lg-4">
        <div class="card card-round mb-4">
          <div class="card-header">
            <div class="card-title">Pengaturan</div>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required" for="kategori">Kategori</label>
              <select class="form-select" id="kategori" name="kategori" required>
                <option value="" selected disabled>Pilih kategori</option>
                <option value="Perusahaan">Perusahaan</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="CSR">CSR</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label required" for="status">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="Publish" selected>Publish</option>
                <option value="Draft">Draft</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label required" for="tanggal">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-3">
              <label class="form-label" for="penulis">Penulis</label>
              <input type="text" class="form-control" id="penulis" name="penulis" value="Admin">
            </div>

            <div class="mb-0">
              <label class="form-label required d-block">Cover</label>
              <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('assets/admin/img/profile.jpg') }}" class="thumb-cover" id="previewCover" alt="preview">
                <div class="flex-grow-1">
                  <input class="form-control" type="file" id="cover" name="cover" accept="image/*" required>
                  <div class="form-text">Rasio disarankan 16:9 • Maks. 2MB</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-round">
          <div class="card-body d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-round">
              <i class="fa fa-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.berita') }}" class="btn btn-secondary btn-round">
              Batal
            </a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@push('scripts')
<script>
(function () {
  if (!window.jQuery) return;

  // Auto-slug dari judul
  const $judul = $('#judul'), $slug = $('#slug');
  $judul.on('input', function () {
    const s = $(this).val()
      .toString()
      .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
      .toLowerCase()
      .replace(/[^a-z0-9\s-]/g, '')
      .trim()
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-');
    if (!$slug.is(':focus')) $slug.val(s);
  });

  // Counter ringkasan & SEO
  const $excerpt = $('#excerpt'), $metaTitle = $('#meta_title'), $metaDesc = $('#meta_description');
  const upd = () => {
    $('#excerptCount').text(($excerpt.val() || '').length);
    $('#metaTitleCount').text(($metaTitle.val() || '').length);
    $('#metaDescCount').text(($metaDesc.val() || '').length);
  };
  $excerpt.on('input', upd); $metaTitle.on('input', upd); $metaDesc.on('input', upd); upd();

  // Preview cover
  $('#cover').on('change', function (e) {
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => $('#previewCover').attr('src', ev.target.result);
    reader.readAsDataURL(file);
  });

  // Submit demo (karena action="#" )
  $('#formBerita').on('submit', function (e) {
    e.preventDefault();
    if (typeof $.notify === 'function') {
      $.notify({ message: 'Berita disimpan (demo)' }, { type: 'success', delay: 1200 });
    } else {
      alert('Berita disimpan (demo)');
    }
  });
})();
</script>
@endpush

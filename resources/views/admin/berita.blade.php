{{-- resources/views/admin/berita.blade.php --}}
@extends('layouts.admin')
@section('title','Berita')
@section('scripts','Berita')
@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
  <div>
    <h3 class="fw-bold mb-1">Berita</h3>
    <div class="text-muted">Kelola artikel berita & pembaruan.</div>
  </div>
  <div class="ms-md-auto py-2 py-md-0">
    <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modalCreate">
      <i class="bi bi-plus-circle"></i> Tambah Berita
    </button>
  </div>
</div>

<div class="tab-content pt-3">
  {{-- PUBLISHED TABLE --}}
  <div class="tab-pane fade show active" id="tab-pub" role="tabpanel">
    <div class="table-responsive">
     <table id="tblBerita" class="table table-striped table-bordered align-middle w-100">
  <thead>
  <tr>
    <th style="width:36px">#</th>
    <th>Judul</th>
    <th>slug</th>
    <th>Status</th>
    <th>Updated</th>
    <th style="width:140px">Aksi</th>
  </tr>
</thead>
<tbody>
  @foreach($blog as $i => $row)
  <tr>
    <td>{{ $i+1 }}</td>
    <td>
      <div class="fw-semibold">{{ $row->title_id }}</div>
      <div class="text-muted small">{{ $row->title_en }}</div>
    </td>
    <td>
      <div class="fw-semibold">{{ $row->slug_id }}</div>
      <div class="text-muted small">{{ $row->slug_en }}</div>
    </td>
    <td><span class="badge badge-status bg-success">Published</span></td>
    <td class="small text-muted">{{ $row->updated_at?->format('d M Y H:i') }}</td>
    <td>
      <div class="form-button-action">
      <button type="button" data-id="{{ $row->id }}" data-bs-toggle="tooltip" title=""
        class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
        <i class="fa fa-edit"></i>
      </button>
      <form action="{{ route('admin.berita-delete', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" data-bs-toggle="tooltip" title="Hapus" class="btn btn-link btn-danger">
            <i class="fa fa-times"></i>
        </button>
    </form>

      <!-- <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
      <i class="fa fa-times"></i>
      </button> -->
      </div>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
    </div>
  </div>
</div>
{{-- Modal: Tambah Berita --}}
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <form class="modal-content" method="POST" action="{{ url('admin/berita-create') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Tambah Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Judul (Indonesia)</label>
          <input type="text" name="title_id" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Title (English)</label>
          <input type="text" name="title_en" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Konten (Indonesia)</label>
          <textarea name="content_id" rows="6" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Content (English)</label>
          <textarea name="content_en" rows="6" class="form-control"></textarea>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="published">Published</option>
              <option value="draft">Draft</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Cover</label>
            <input type="file" name="cover" class="form-control" accept="image/*">
            <div class="form-text">File akan disimpan ke <code>public/upload/berita</code></div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>

{{-- Modal: Detail/Edit Berita --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <form class="modal-content" id="formEdit" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="modal-header">
        <h5 class="modal-title">Detail Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" id="edit_id">

        <div class="mb-3">
          <label class="form-label">Judul (Indonesia)</label>
          <input type="text" name="title_id" id="edit_title_id" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Title (English)</label>
          <input type="text" name="title_en" id="edit_title_en" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Konten (Indonesia)</label>
          <textarea name="content_id" id="edit_content_id" rows="6" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Content (English)</label>
          <textarea name="content_en" id="edit_content_en" rows="6" class="form-control"></textarea>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" id="edit_status" class="form-select">
              <option value="published">Published</option>
              <option value="draft">Draft</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Ganti Cover (opsional)</label>
            <input type="file" name="cover" class="form-control" accept="image/*">
            <div class="small text-muted mt-1" id="edit_cover_info"></div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Tutup</button>
        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Aktifkan tooltip Bootstrap
  const ttEls = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  ttEls.map(el => new bootstrap.Tooltip(el));

  // Handler tombol Edit (pakai data-id pada tombol)
  document.querySelectorAll('.form-button-action .btn-link.btn-primary').forEach(function(btn){
    btn.addEventListener('click', async function(){
      const id = this.getAttribute('data-id');
      if (!id) return;

      try {
        // Ambil data detail (JSON)
        const res = await fetch(`{{ url('admin/berita') }}/${id}`);
        if (!res.ok) throw new Error('Gagal mengambil data');
        const row = await res.json();

        // Isi field modal
        document.getElementById('edit_id').value = row.id ?? '';
        document.getElementById('edit_title_id').value = row.title_id ?? '';
        document.getElementById('edit_title_en').value = row.title_en ?? '';
        document.getElementById('edit_content_id').value = row.content_id ?? '';
        document.getElementById('edit_content_en').value = row.content_en ?? '';
        document.getElementById('edit_status').value = row.status ?? 'published';
        document.getElementById('edit_cover_info').innerHTML = row.cover
          ? 'Cover saat ini: <code>' + row.cover + '</code>'
          : 'Belum ada cover.';

        // Set action form PUT /admin/berita/{id}
        document.getElementById('formEdit').action = `{{ url('admin/berita') }}/${id}`;

        // Tampilkan modal
        new bootstrap.Modal(document.getElementById('modalEdit')).show();

      } catch (e) {
        console.error(e);
        alert('Tidak dapat memuat data berita.');
      }
    });
  });
});
</script>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    if (! $.fn.DataTable.isDataTable('#tblBerita')) {
        $('#tblBerita').DataTable({
            pageLength: 5,
            autoWidth: false,
            order: [],
            columnDefs: [
                { orderable: false, targets: -1 }
            ]
        });
    }
});

</script>
@endpush

@endsection
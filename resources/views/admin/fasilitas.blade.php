{{-- resources/views/admin/fasilitas.blade.php --}}
@extends('layouts.admin')
@section('title', 'Fasilitas')
@section('scripts', 'Fasilitas')
@section('content')

  <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
    <div>
      <h3 class="fw-bold mb-1">Fasilitas</h3>
      <div class="text-muted">Kelola data fasilitas (judul, deskripsi, foto).</div>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
      <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modalCreate">
        <i class="bi bi-plus-circle"></i> Tambah Fasilitas
      </button>
    </div>
  </div>

  <div class="tab-content pt-3">
    <div class="tab-pane fade show active">
      <div class="table-responsive">
        <table id="tblFasilitas" class="table table-striped table-bordered align-middle w-100">
          <thead>
          <tr>
            <th style="width:36px">#</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Updated</th>
            <th style="width:140px">Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($fasilitas as $i => $row)
            <tr data-id="{{ $row->id }}">
              <td>{{ $i + 1 }}</td>
              <td class="fw-semibold">{{ $row->title }}</td>
              <td class="text-muted small">
                {{ \Illuminate\Support\Str::limit(strip_tags($row->description), 90) }}
              </td>
              <td>
                @if(!empty($row->foto))
                  <img src="{{ url('/' . ltrim($row->foto, '/')) }}"
                       alt="Foto"
                       style="max-width:60px;max-height:60px;border-radius:6px;">
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td class="small text-muted">{{ $row->updated_at?->format('d M Y H:i') }}</td>
              <td>
                <div class="form-button-action d-flex align-items-center gap-1">
                  {{-- Edit (AJAX) --}}
                  <button type="button"
                          data-id="{{ $row->id }}"
                          data-bs-toggle="tooltip" title="Edit"
                          class="btn btn-link btn-primary btn-lg">
                    <i class="fa fa-edit"></i>
                  </button>

                  {{-- Delete (form di dalam tabel + confirm) --}}
                  <form action="{{ url('admin/fasilitas/'.$row->id) }}"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus fasilitas ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            data-bs-toggle="tooltip" title="Remove"
                            class="btn btn-link btn-danger">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal: Tambah Fasilitas --}}
  <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <form class="modal-content" method="POST" action="{{ url('admin/fasilitas-create') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="6" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <div class="form-text">File akan disimpan ke <code>public/upload/fasilitas</code></div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal: Detail/Edit Fasilitas --}}
  <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      {{-- action di-set via JS: /admin/fasilitas/{id} --}}
      <form class="modal-content" id="formEdit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title">Detail Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">

          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" id="edit_title" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" id="edit_description" rows="6" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Ganti Foto (opsional)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <div class="small text-muted mt-2" id="edit_foto_info">Belum ada foto.</div>
            <div class="mt-2" id="edit_foto_wrap" style="display:none;">
              <img id="edit_foto_preview" src="" alt="Foto saat ini" class="img-fluid rounded border">
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // DataTables
  if (!$.fn.DataTable.isDataTable('#tblFasilitas')) {
    $('#tblFasilitas').DataTable({
      pageLength: 5,
      autoWidth: false,
      order: [],
      columnDefs: [{ orderable: false, targets: -1 }]
    });
  }

  // Tooltip
  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));

  // Delegasi klik tombol Edit (tetap jalan setelah redraw DataTables)
  document.addEventListener('click', async function(ev) {
    const btn = ev.target.closest('.form-button-action .btn-link.btn-primary');
    if (!btn) return;

    let id = btn.getAttribute('data-id');
    if (!id) {
      const tr = btn.closest('tr');
      id = tr?.getAttribute('data-id');
    }
    if (!id) return;

    try {
      const res = await fetch(`{{ url('admin/fasilitas') }}/${id}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      if (!res.ok) throw new Error('Gagal mengambil data (HTTP ' + res.status + ')');
      const row = await res.json();

      // Set action form PUT /admin/fasilitas/{id}
      const form = document.getElementById('formEdit');
      form.action = `{{ url('admin/fasilitas') }}/${id}`;

      // Isi field
      document.getElementById('edit_id').value = row.id ?? '';
      document.getElementById('edit_title').value = row.title ?? '';
      document.getElementById('edit_description').value = row.description ?? '';

      // Info + preview foto
      const info = document.getElementById('edit_foto_info');
      const wrap = document.getElementById('edit_foto_wrap');
      const img  = document.getElementById('edit_foto_preview');

      if (row.foto) {
        info.innerHTML = 'Foto saat ini: <code>' + row.foto + '</code>';
        img.src = `{{ url('/') }}/${row.foto}`; // row.foto = 'upload/fasilitas/xxx.jpg'
        wrap.style.display = '';
      } else {
        info.textContent = 'Belum ada foto.';
        img.removeAttribute('src');
        wrap.style.display = 'none';
      }

      // Tampilkan modal
      const modalEditEl = document.getElementById('modalEdit');
      let modalEdit = bootstrap.Modal.getInstance(modalEditEl);
      if (!modalEdit) modalEdit = new bootstrap.Modal(modalEditEl);
      modalEdit.show();

    } catch (err) {
      console.error(err);
      alert('Tidak dapat memuat data fasilitas.');
    }
  });
});
</script>
@endpush

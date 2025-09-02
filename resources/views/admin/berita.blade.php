{{-- resources/views/admin/berita.blade.php --}}
@extends('layouts.admin')
@section('title', 'Berita')
@section('scripts', 'Berita')
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
                            <th>Updated</th>
                            <th style="width:140px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $i => $row)
                            <tr data-id="{{ $row->id }}">
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $row->title_id }}</div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $row->slug_id }}</div>
                                </td>
                                <td class="small text-muted">{{ $row->updated_at?->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-id="{{ $row->id }}" data-bs-toggle="tooltip"
                                            title="Edit" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-id="{{ $row->id }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmationModal" title="Remove"
                                            data-url="{{ url('admin/berita') }}/{{ $row->id }}"
                                            class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Hapus hidden delete form: gunakan modal konfirmasi global di layouts.admin --}}

    {{-- Modal: Tambah Berita (tetap) --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" method="POST" action="{{ url('admin/berita-create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title_id" class="form-control">
                    </div>
                    {{-- slug disediakan manual sesuai permintaan (tidak otomatis) --}}
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten</label>
                        <textarea name="content_id" rows="6" class="form-control js-wysiwyg"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12">
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

    {{-- Modal: Detail/Edit Berita (ditambahkan field slug + preview cover) --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            {{-- action akan diisi via JS ke /admin/berita/{id} --}}
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
                        <label class="form-label">Judul</label>
                        <input type="text" name="title_id" id="edit_title_id" class="form-control">
                    </div>
                    {{-- FIELD SLUG DITAMBAHKAN --}}
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug_id" id="edit_slug_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten</label>
                        <textarea name="content_id" id="edit_content_id" rows="6" class="form-control js-wysiwyg"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Ganti Cover (opsional)</label>
                            <input type="file" name="cover" class="form-control" accept="image/*">
                            <div class="small text-muted mt-2" id="edit_cover_info">Belum ada cover.</div>
                            <div class="mt-2" id="edit_cover_wrap" style="display:none;">
                                <img id="edit_cover_preview" src="" alt="Cover saat ini"
                                    class="img-fluid rounded border">
                            </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // DataTables init (aman dari re-init)
            if (!$.fn.DataTable.isDataTable('#tblBerita')) {
                $('#tblBerita').DataTable({
                    pageLength: 5,
                    autoWidth: false,
                    order: [],
                    columnDefs: [{
                        orderable: false,
                        targets: -1
                    }]
                });
            }

            // Tooltip
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));

            // WYSIWYG init
            if ($.fn.summernote) {
                $('.js-wysiwyg').summernote({
                    height: 260,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture', 'table', 'hr']],
                        ['view', ['codeview']]
                    ],
                    styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
                });
            }

            // Delegasi klik tombol Edit (tetap jalan setelah redraw)
            document.addEventListener('click', async function(ev) {
                const btn = ev.target.closest('.btn-link.btn-primary');
                if (!btn) return;

                let id = btn.getAttribute('data-id');
                if (!id) {
                    const tr = btn.closest('tr');
                    id = tr?.getAttribute('data-id');
                }
                if (!id) return;

                try {
                    const res = await fetch(`{{ url('admin/berita') }}/${id}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    // if (!res.ok) throw new Error('Gagal mengambil data (HTTP ' + res.status + ')');
                    const row = await res.json();

                    // Set action form PUT /admin/berita/{id}
                    const form = document.getElementById('formEdit');
                    form.action = `{{ url('admin/berita') }}/${id}`;

                    // Isi field termasuk SLUG (gunakan field yang ada)
                    const setVal = (id, val) => { const el = document.getElementById(id); if (el) el.value = val ?? ''; };
                    setVal('edit_id', row.id);
                    setVal('edit_title_id', row.title_id);
                    setVal('edit_slug_id', row.slug_id);
                    // Set konten ke Summernote bila tersedia agar editor tidak kosong
                    const $editContent = $('#edit_content_id');
                    if ($.fn.summernote && $editContent.length) {
                        $editContent.summernote('code', row.content_id || '');
                    } else {
                        setVal('edit_content_id', row.content_id);
                    }
                    // document.getElementById('edit_status').value = row.status ?? 'published';

                    // Info + preview cover
                    const info = document.getElementById('edit_cover_info');
                    const wrap = document.getElementById('edit_cover_wrap');
                    const img = document.getElementById('edit_cover_preview');

                    if (row.cover) {
                        info.innerHTML = 'Cover saat ini: <code>' + row.cover + '</code>';
                        img.src =
                        `{{ url('/') }}/${row.cover}`; // row.cover = 'upload/berita/xxx.jpg'
                        wrap.style.display = '';
                    } else {
                        info.textContent = 'Belum ada cover.';
                        img.removeAttribute('src');
                        wrap.style.display = 'none';
                    }

                    const modalEditEl = document.getElementById('modalEdit');
                    let modalEdit = bootstrap.Modal.getInstance(modalEditEl);
                    if (!modalEdit) {
                        modalEdit = new bootstrap.Modal(modalEditEl);
                    }
                    modalEdit.show();
                } catch (err) {
                    console.error(err);
                    alert('Tidak dapat memuat data berita.');
                }
            });

            // Hapus handler delete lama: kini pakai modal konfirmasi global
            // RESET Modal Create saat ditutup
            document.getElementById('modalCreate')?.addEventListener('hidden.bs.modal', function() {
                const f = this.querySelector('form');
                if (f) {
                    f.reset(); // kosongkan input termasuk file
                    f.classList.remove('was-validated');
                }
                // reset editor WYSIWYG
                if ($.fn.summernote) {
                    $(this).find('.js-wysiwyg').each(function(){ $(this).summernote('code', ''); });
                }
                // bersihkan preview
                const cover = document.getElementById('createCoverPreview');
                const gal = document.getElementById('createPreview');
                if (cover) cover.innerHTML = '';
                if (gal) gal.innerHTML = '';
            });

            // RESET Modal Edit saat ditutup
            document.getElementById('modalEdit')?.addEventListener('hidden.bs.modal', function() {
                const f = document.getElementById('formEdit');
                if (f) {
                    f.reset();
                    f.classList.remove('was-validated');
                    // kosongkan action kalau mau aman
                    // f.action = '';
                }
                // reset editor WYSIWYG
                if ($.fn.summernote) {
                    $(this).find('.js-wysiwyg').each(function(){ $(this).summernote('code', ''); });
                }
                // bersihkan preview & state hapus
                const cover = document.getElementById('editCoverPreview');
                const galNew = document.getElementById('editPreview');
                const galOld = document.getElementById('existingWrap');
                if (cover) cover.innerHTML = '';
                if (galNew) galNew.innerHTML = '';
                if (galOld) galOld.innerHTML = '';
                const delIds = document.getElementById('delete_ids');
                if (delIds) delIds.value = '';
                window.fasilitasDelSet = new Set();
            });
        });
    </script>
@endpush

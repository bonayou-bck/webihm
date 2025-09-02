{{-- resources/views/admin/berita.blade.php --}}
@extends('layouts.admin')
@section('title', 'Sertifikat')
@section('scripts', 'Sertifikat')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
        <div>
            <h3 class="fw-bold mb-1">Sertifikat</h3>
            {{-- <div class="text-muted">Kelola artikel berita & pembaruan.</div> --}}
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class="bi bi-plus-circle"></i> Tambah Sertifikat
            </button>
        </div>
    </div>

    <div class="tab-content pt-3">
        {{-- PUBLISHED TABLE --}}
        <div class="tab-pane fade show active" id="tab-pub" role="tabpanel">
            <div class="table-responsive">
                <table id="tblSertifikat" class="table table-striped table-bordered align-middle w-100">
                    <thead>
                        <tr>
                            <th style="width:36px">#</th>
                            <th>Nama</th>
                            <th>Deskripsi (ID)</th>
                            <th>Logo</th>
                            <th>Showcase</th>
                            <th>Updated</th>
                            <th style="width:140px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cf as $i => $row)
                            <tr data-id="{{ $row->id }}">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $row->name_id }}</td>
                                <td>{{ $row->description_id }}</td>
                                <td>
                                    @if ($row->logo)
                                        <img src="/{{ $row->logo }}" alt="Logo"
                                            style="max-width:60px;max-height:60px;">
                                    @endif
                                </td>
                                <td>
                                    @if ($row->showcase)
                                        <img src="/{{ $row->showcase }}" alt="Showcase"
                                            style="max-width:60px;max-height:60px;">
                                    @endif
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
                                            data-url="{{ url('admin/sertifikat') }}/{{ $row->id }}"
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

    {{-- Modal: Tambah Berita (tetap) --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" method="POST" action="{{ url('admin/sertifikat-create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description_id" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <div class="form-text">File akan disimpan ke <code>public/upload/sertifikat</code></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Showcase</label>
                            <input type="file" name="showcase" class="form-control" accept="image/*">
                            <div class="form-text">File akan disimpan ke <code>public/upload/sertifikat</code></div>
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

    {{-- Modal: Detail/Edit Sertifikat --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            {{-- action akan diisi via JS ke /admin/sertifikat/{id} --}}
            <form class="modal-content" id="formEdit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Detail Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name_id" id="edit_name_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description_id" id="edit_description_id" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Ganti Logo (opsional)</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <div class="small text-muted mt-2" id="edit_logo_info">Belum ada logo.</div>
                            <div class="mt-2" id="edit_logo_wrap" style="display:none;">
                                <img id="edit_logo_preview" src="" alt="Logo saat ini"
                                    class="img-fluid rounded border">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ganti Showcase (opsional)</label>
                            <input type="file" name="showcase" class="form-control" accept="image/*">
                            <div class="small text-muted mt-2" id="edit_showcase_info">Belum ada showcase.</div>
                            <div class="mt-2" id="edit_showcase_wrap" style="display:none;">
                                <img id="edit_showcase_preview" src="" alt="Showcase saat ini"
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
            if (!$.fn.DataTable.isDataTable('#tblSertifikat')) {
                $('#tblSertifikat').DataTable({
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
                    const res = await fetch(`{{ url('admin/sertifikat') }}/${id}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    if (!res.ok) throw new Error('Gagal mengambil data (HTTP ' + res.status + ')');
                    const row = await res.json();

                    // Set action form PUT /admin/berita/{id}
                    const form = document.getElementById('formEdit');
                    form.action = `{{ url('admin/sertifikat') }}/${id}`;

                    // Isi field termasuk SLUG
                    document.getElementById('edit_id').value = row.id ?? '';
                    document.getElementById('edit_name_id').value = row.name_id ?? '';
                    document.getElementById('edit_description_id').value = row.description_id ?? '';

                    // Info + preview logo
                    const logoInfo = document.getElementById('edit_logo_info');
                    const logoWrap = document.getElementById('edit_logo_wrap');
                    const logoImg = document.getElementById('edit_logo_preview');
                    if (row.logo) {
                        logoInfo.innerHTML = 'Logo saat ini: <code>' + row.logo + '</code>';
                        logoImg.src = `{{ url('/') }}/${row.logo}`;
                        logoWrap.style.display = '';
                    } else {
                        logoInfo.textContent = 'Belum ada logo.';
                        logoImg.removeAttribute('src');
                        logoWrap.style.display = 'none';
                    }
                    // Info + preview showcase
                    const showcaseInfo = document.getElementById('edit_showcase_info');
                    const showcaseWrap = document.getElementById('edit_showcase_wrap');
                    const showcaseImg = document.getElementById('edit_showcase_preview');
                    if (row.showcase) {
                        showcaseInfo.innerHTML = 'Showcase saat ini: <code>' + row.showcase + '</code>';
                        showcaseImg.src = `{{ url('/') }}/${row.showcase}`;
                        showcaseWrap.style.display = '';
                    } else {
                        showcaseInfo.textContent = 'Belum ada showcase.';
                        showcaseImg.removeAttribute('src');
                        showcaseWrap.style.display = 'none';
                    }

                    const modalEditEl = document.getElementById('modalEdit');
                    let modalEdit = bootstrap.Modal.getInstance(modalEditEl);
                    if (!modalEdit) {
                        modalEdit = new bootstrap.Modal(modalEditEl);
                    }
                    modalEdit.show();
                } catch (err) {
                    console.error(err);
                    alert('Tidak dapat memuat data sertifikat.');
                }
            });
            // RESET Modal Create saat ditutup
            document.getElementById('modalCreate')?.addEventListener('hidden.bs.modal', function() {
                const f = this.querySelector('form');
                if (f) {
                    f.reset(); // kosongkan input termasuk file
                    f.classList.remove('was-validated');
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

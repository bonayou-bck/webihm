{{-- resources/views/admin/keberlanjutan.blade.php --}}
@extends('layouts.admin')
@section('title', 'Keberlanjutan')
@section('scripts', 'Keberlanjutan')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
        <div>
            <h3 class="fw-bold mb-1">Keberlanjutan</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class="bi bi-plus-circle"></i> Tambah Keberlanjutan
            </button>
        </div>
    </div>

    <div class="tab-content pt-3">
        {{-- PUBLISHED TABLE --}}
        <div class="tab-pane fade show active" id="tab-pub" role="tabpanel">
            <div class="table-responsive">
                <table id="tblKeberlanjutan" class="table table-striped table-bordered align-middle w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Konten</th>
                            <th>Cover</th>
                            <th class="text-center">Jumlah Gambar</th>
                            <th>Updated</th>
                            <th class="text-center" style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rows as $i => $row)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <td><span class="badge bg-light text-dark">{{ $row->slug }}</span></td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->content), 60) }}</td>
                                <td>
                                    @if ($row->cover)
                                        <img src="/{{ $row->cover }}" alt="Cover"
                                            style="max-width:60px;max-height:60px;border-radius:6px;">
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $row->keberlanjutan_img_count ?? ($row->Keberlanjutan_img_count ?? 0) }}</td>
                                <td class="small text-muted">{{ optional($row->updated_at)->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-id="{{ $row->id }}" data-bs-toggle="tooltip"
                                            title="Edit" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-id="{{ $row->id }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmationModal"
                                            data-url="{{ url('admin/keberlanjutan') }}/{{ $row->id }}" title="Remove"
                                            class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ========== MODAL CREATE ========== --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" action="{{ url('admin/keberlanjutan-create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Keberlanjutan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Slug (opsional)</label>
                            <input type="text" name="slug" class="form-control" placeholder="otomatis jika kosong">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Konten</label>
                            <textarea name="content" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Cover (opsional)</label>
                            <input type="file" name="cover" id="createCover" class="form-control" accept="image/*">
                            <div id="createCoverPreview" class="mt-2"></div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-0">Gambar Galeri (maks 5)</label>
                                <small class="text-muted">jpg/png/webp ≤2MB</small>
                            </div>
                            <input type="file" name="images[]" id="createImages" class="form-control" accept="image/*"
                                multiple>
                            <div id="createPreview" class="row g-2 mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ========== MODAL EDIT ========== --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form id="editForm" class="modal-content" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Keberlanjutan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" id="editTitle" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Slug (opsional)</label>
                            <input type="text" name="slug" id="editSlug" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Konten</label>
                            <textarea name="content" id="editContent" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Ganti Cover (opsional)</label>
                            <input type="file" name="cover" id="editCover" class="form-control" accept="image/*">
                            <div id="editCoverPreview" class="mt-2"></div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-0">Tambah Gambar Galeri (opsional)</label>
                                <small class="text-muted">jpg/png/webp ≤2MB</small>
                            </div>
                            <input type="file" name="images[]" id="editImages" class="form-control" accept="image/*"
                                multiple>
                            <div id="editPreview" class="row g-2 mt-2"></div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Gambar Saat Ini</label>
                            <div id="existingWrap" class="row g-2"></div>
                            <input type="hidden" name="delete_ids" id="delete_ids">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .thumb {
            position: relative;
            border: 1px dashed #e2e5ec;
            border-radius: 12px;
            padding: 8px;
            text-align: center;
            background: #fafafa;
        }

        .thumb img {
            max-width: 100%;
            height: 110px;
            object-fit: cover;
            border-radius: 8px;
        }

        .thumb .del {
            position: absolute;
            top: 6px;
            right: 6px;
        }
    </style>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // DataTables init
                if (!$.fn.DataTable.isDataTable('#tblKeberlanjutan')) {
                    $('#tblKeberlanjutan').DataTable({
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

                // CREATE preview cover
                document.getElementById('createCover')?.addEventListener('change', function() {
                    const box = document.getElementById('createCoverPreview');
                    box.innerHTML = '';
                    const file = this.files?.[0];
                    if (file) {
                        const img = document.createElement('img');
                        img.style.maxWidth = '120px';
                        img.style.maxHeight = '120px';
                        img.style.borderRadius = '8px';
                        const fr = new FileReader();
                        fr.onload = ev => img.src = ev.target.result;
                        fr.readAsDataURL(file);
                        box.appendChild(img);
                    }
                });

                // CREATE preview images with description inputs
                document.getElementById('createImages')?.addEventListener('change', function() {
                    const wrap = document.getElementById('createPreview');
                    wrap.innerHTML = '';
                    const files = [...this.files].slice(0, 5);
                    files.forEach((file, i) => {
                        const col = document.createElement('div');
                        col.className = 'col-6 col-md-3';

                        const card = document.createElement('div');
                        card.className = 'thumb';
                        const img = document.createElement('img');
                        img.alt = file.name;
                        const fr = new FileReader();
                        fr.onload = ev => img.src = ev.target.result;
                        fr.readAsDataURL(file);
                        card.appendChild(img);
                        col.appendChild(card);

                        const descInput = document.createElement('input');
                        descInput.type = 'text';
                        descInput.name = 'descriptions[]';
                        descInput.className = 'form-control mt-1';
                        descInput.placeholder = 'Deskripsi gambar ' + (i + 1);
                        col.appendChild(descInput);

                        wrap.appendChild(col);
                    });
                });

                // OPEN EDIT MODAL
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
                        const res = await fetch(`{{ url('admin/keberlanjutan') }}/${id}`);
                        if (!res.ok) throw new Error('Gagal mengambil data');
                        const data = await res.json();

                        const form = document.getElementById('editForm');
                        if (!form) {
                            console.warn('Edit form not found');
                            return;
                        }
                        form.action = `{{ url('admin/keberlanjutan') }}/${id}`;

                        document.getElementById('editTitle').value = data.title ?? '';
                        document.getElementById('editSlug').value = data.slug ?? '';
                        document.getElementById('editContent').value = data.content ?? '';

                        document.getElementById('editCover').value = '';
                        const coverBox = document.getElementById('editCoverPreview');
                        coverBox.innerHTML = '';
                        if (data.cover) {
                            const img = document.createElement('img');
                            img.src = `/${data.cover}`;
                            img.style.maxWidth = '120px';
                            img.style.maxHeight = '120px';
                            img.style.borderRadius = '8px';
                            coverBox.appendChild(img);
                        }

                        const wrap = document.getElementById('existingWrap');
                        wrap.innerHTML = '';
                        window.keberlanjutanDelSet = new Set();
                        (data.keberlanjutan_img || []).forEach(img => {
                            const col = document.createElement('div');
                            col.className = 'col-6 col-md-3';
                            col.dataset.id = img.id;

                            const card = document.createElement('div');
                            card.className = 'thumb';

                            const del = document.createElement('button');
                            del.type = 'button';
                            del.className = 'btn btn-sm btn-danger del';
                            del.dataset.id = img.id;
                            del.onclick = function() {
                                window.keberlanjutanDelSet.add(img.id);
                                col.remove();
                                document.getElementById('delete_ids').value = [...window
                                    .keberlanjutanDelSet
                                ].join(',');
                            };

                            const image = document.createElement('img');
                            image.src = `/${img.src}`;
                            image.alt = 'img-' + img.id;
                            card.appendChild(del);
                            card.appendChild(image);
                            col.appendChild(card);

                            const descText = document.createElement('div');
                            descText.className = 'small text-muted mt-2';
                            descText.textContent = img.description || '';
                            col.appendChild(descText);

                            const descInput = document.createElement('input');
                            descInput.type = 'text';
                            descInput.name = `descriptions_existing[${img.id}]`;
                            descInput.className = 'form-control mt-1';
                            descInput.value = img.description || '';
                            descInput.placeholder = 'Edit deskripsi';
                            descInput.addEventListener('input', function() {
                                descText.textContent = this.value;
                            });
                            col.appendChild(descInput);

                            wrap.appendChild(col);
                        });
                        document.getElementById('delete_ids').value = '';

                        const modalEditEl = document.getElementById('modalEdit');
                        let modalEdit = bootstrap.Modal.getInstance(modalEditEl);
                        if (!modalEdit) {
                            modalEdit = new bootstrap.Modal(modalEditEl);
                        }
                        modalEdit.show();
                    } catch (err) {
                        alert(err.message || 'Terjadi kesalahan');
                    }
                });

                // EDIT preview new images
                document.getElementById('editImages')?.addEventListener('change', function() {
                    const wrap = document.getElementById('editPreview');
                    wrap.innerHTML = '';
                    const files = [...this.files].slice(0, 5);
                    files.forEach((file, i) => {
                        const col = document.createElement('div');
                        col.className = 'col-6 col-md-3';

                        const card = document.createElement('div');
                        card.className = 'thumb';
                        const img = document.createElement('img');
                        img.alt = file.name;
                        const fr = new FileReader();
                        fr.onload = ev => img.src = ev.target.result;
                        fr.readAsDataURL(file);
                        card.appendChild(img);
                        col.appendChild(card);

                        const descInput = document.createElement('input');
                        descInput.type = 'text';
                        descInput.name = 'descriptions[]';
                        descInput.className = 'form-control mt-2';
                        descInput.placeholder = 'Deskripsi gambar ' + (i + 1);
                        col.appendChild(descInput);

                        wrap.appendChild(col);
                    });
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
                    const f = document.getElementById('editForm');
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

@endsection

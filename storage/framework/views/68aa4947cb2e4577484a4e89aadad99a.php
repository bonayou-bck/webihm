<?php $__env->startSection('title', 'Fasilitas'); ?>
<?php $__env->startSection('scripts', 'Fasilitas'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
        <div>
            <h3 class="fw-bold mb-1">Fasilitas</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class="bi bi-plus-circle"></i> Tambah Fasilitas
            </button>
        </div>
    </div>

    <div class="tab-content pt-3">
        
        <div class="tab-pane fade show active" id="tab-pub" role="tabpanel">
            <div class="table-responsive">
                <table id="tblFasilitas" class="table table-striped table-bordered align-middle w-100">
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
                        <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($i + 1); ?></td>
                                <td><?php echo e($row->title); ?></td>
                                <td><span class="badge bg-light text-dark"><?php echo e($row->slug); ?></span></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit(strip_tags($row->content), 60)); ?></td>
                                <td>
                                    <?php if($row->cover): ?>
                                        <img src="/<?php echo e($row->cover); ?>" alt="Cover"
                                            style="max-width:60px;max-height:60px;border-radius:6px;">
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo e($row->Fasilitas_img ? count($row->Fasilitas_img) : 0); ?>

                                </td>
                                <td class="small text-muted"><?php echo e(optional($row->updated_at)->format('d M Y H:i')); ?></td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-id="<?php echo e($row->id); ?>" data-bs-toggle="tooltip"
                                            title="Edit" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-id="<?php echo e($row->id); ?>" data-bs-toggle="tooltip"
                                            title="Remove" class="btn btn-link btn-danger btn-delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <form id="deleteForm" method="POST" style="display:none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>

            </div>
        </div>
    </div>

    
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" action="<?php echo e(url('admin/fasilitas-create')); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah fasilitas</h5>
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

                        <div class="col-md-6">
                            <label class="form-label">Cover (opsional)</label>
                            <input type="file" name="cover" id="createCover" class="form-control" accept="image/*">
                            <div id="createCoverPreview" class="mt-2"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-0">Gambar Galeri (maks 5)</label>
                                <small class="text-muted">jpg/png/webp ≤2MB</small>
                            </div>
                            <input type="file" name="images[]" id="createImages" class="form-control" accept="image/*" multiple>
                            <div id="createPreview" class="row g-2 mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form id="editForm" class="modal-content" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Edit fasilitas</h5>
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

                        <div class="col-md-6">
                            <label class="form-label">Ganti Cover (opsional)</label>
                            <input type="file" name="cover" id="editCover" class="form-control" accept="image/*">
                            <div id="editCoverPreview" class="mt-2"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label mb-0">Tambah Gambar Galeri (opsional)</label>
                                <small class="text-muted">jpg/png/webp ≤2MB</small>
                            </div>
                            <input type="file" name="images[]" id="editImages" class="form-control" accept="image/*" multiple>
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
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

    <?php $__env->startPush('scripts'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // DataTables init (aman dari re-init)
                if (!$.fn.DataTable.isDataTable('#tblFasilitas')) {
                    $('#tblFasilitas').DataTable({
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

                // CREATE preview images
                document.getElementById('createImages')?.addEventListener('change', function() {
                    const wrap = document.getElementById('createPreview');
                    wrap.innerHTML = '';
                    const files = [...this.files].slice(0, 5);
                    files.forEach(file => {
                        const col = document.createElement('div');
                        col.className = 'col-4 col-md-3';
                        const card = document.createElement('div');
                        card.className = 'thumb';
                        const img = document.createElement('img');
                        img.alt = file.name;
                        const fr = new FileReader();
                        fr.onload = ev => img.src = ev.target.result;
                        fr.readAsDataURL(file);
                        card.appendChild(img);
                        col.appendChild(card);
                        wrap.appendChild(col);
                    });
                    if (this.files.length > 5) {
                        alert('Maksimal 5 gambar.');
                        this.value = '';
                    }
                });

                // OPEN EDIT
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
                        const res = await fetch(`<?php echo e(url('admin/fasilitas')); ?>/${id}`);
                        if (!res.ok) throw new Error('Gagal mengambil data');
                        const data = await res.json();

                        // set action form
                        const form = document.getElementById('editForm') || document.querySelector(
                            '#modalEdit form');
                        if (!form) {
                            console.warn('Edit form not found');
                            alert('Form edit tidak ditemukan. Silakan muat ulang halaman.');
                            return;
                        }
                        form.action = `<?php echo e(url('admin/fasilitas')); ?>/${id}`;

                        // isi field
                        document.getElementById('editTitle').value = data.title ?? '';
                        document.getElementById('editSlug').value = data.slug ?? '';
                        document.getElementById('editContent').value = data.content ?? '';

                        // cover preview
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

                        // existing images (preview galeri dari DB)
                        const wrap = document.getElementById('existingWrap');
                        wrap.innerHTML = '';
                        window.fasilitasDelSet = new Set();
                        (data.Fasilitas_img || []).forEach(img => {
                            const col = document.createElement('div');
                            col.className = 'col-4 col-md-3';
                            col.dataset.id = img.id;
                            const card = document.createElement('div');
                            card.className = 'thumb';
                            const del = document.createElement('button');
                            del.type = 'button';
                            del.className = 'btn btn-sm btn-danger del';
                            del.dataset.id = img.id;
                            del.innerHTML = '&times;';
                            del.onclick = function() {
                                window.fasilitasDelSet.add(img.id);
                                col.remove();
                                document.getElementById('delete_ids').value = [...window.fasilitasDelSet].join(',');
                            };
                            const image = document.createElement('img');
                            image.src = `/${img.src}`;
                            image.alt = 'img-' + img.id;
                            card.appendChild(del);
                            card.appendChild(image);
                            col.appendChild(card);
                            wrap.appendChild(col);
                        });
                        // reset delete_ids
                        document.getElementById('delete_ids').value = '';

                        // show modal
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
            });

            // EDIT preview images (baru)
            document.getElementById('editImages')?.addEventListener('change', function() {
                const wrap = document.getElementById('editPreview');
                wrap.innerHTML = '';
                [...this.files].forEach(file => {
                    const col = document.createElement('div');
                    col.className = 'col-4 col-md-3';
                    const card = document.createElement('div');
                    card.className = 'thumb';
                    const img = document.createElement('img');
                    img.alt = file.name;
                    const fr = new FileReader();
                    fr.onload = ev => img.src = ev.target.result;
                    fr.readAsDataURL(file);
                    card.appendChild(img);
                    col.appendChild(card);
                    wrap.appendChild(col);
                });
            });

            // Hapus gambar existing (toggle)
            window.fasilitasDelSet = window.fasilitasDelSet || new Set();
            document.getElementById('existingWrap')?.addEventListener('click', function(e) {
                if (e.target.classList.contains('del')) {
                    const id = e.target.dataset.id;
                    window.fasilitasDelSet.add(id);
                    // remove element dari DOM
                    e.target.closest('.col-4, .col-md-3').remove();
                    document.getElementById('delete_ids').value = [...window.fasilitasDelSet].join(',');
                }
            });

            // DELETE record
            document.querySelectorAll('.btn-delete').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById('deleteForm');
                    form.action = `<?php echo e(url('admin/fasilitas')); ?>/${id}`;
                    form.submit();
                });
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/admin/Fasilitas.blade.php ENDPATH**/ ?>
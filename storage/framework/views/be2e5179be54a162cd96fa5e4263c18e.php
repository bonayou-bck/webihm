<?php $__env->startSection('title', 'Berita'); ?>
<?php $__env->startSection('scripts', 'Berita'); ?>
<?php $__env->startSection('content'); ?>

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
                        <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id="<?php echo e($row->id); ?>">
                                <td><?php echo e($i + 1); ?></td>
                                <td>
                                    <div class="fw-semibold"><?php echo e($row->title_id); ?></div>
                                    <div class="text-muted small"><?php echo e($row->title_en); ?></div>
                                </td>
                                <td>
                                    <div class="fw-semibold"><?php echo e($row->slug_id); ?></div>
                                    <div class="text-muted small"><?php echo e($row->slug_en); ?></div>
                                </td>
                                <td><span class="badge badge-status bg-success">Published</span></td>
                                <td class="small text-muted"><?php echo e($row->updated_at?->format('d M Y H:i')); ?></td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-id="<?php echo e($row->id); ?>" data-bs-toggle="tooltip"
                                            title="Edit" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-bs-toggle="tooltip" title="Remove"
                                            class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" method="POST" action="<?php echo e(url('admin/berita-create')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul (Indonesia)</label>
                        <input type="text" name="title_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title (English)</label>
                        <input type="text" name="title_en" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Slug (Indonesia)</label>
                        <input type="text" name="slug_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug (English)</label>
                        <input type="text" name="slug_en" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten (Indonesia)</label>
                        <textarea name="content_id" rows="6" class="form-control"></textarea>
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

    
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            
            <form class="modal-content" id="formEdit" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="modal-header">
                    <h5 class="modal-title">Detail Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label class="form-label">Judul (Indonesia)</label>
                        <input type="text" name="title_id" id="edit_title_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title (English)</label>
                        <input type="text" name="title_en" id="edit_title_en" class="form-control">
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Slug (Indonesia)</label>
                        <input type="text" name="slug_id" id="edit_slug_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug (English)</label>
                        <input type="text" name="slug_en" id="edit_slug_en" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konten (Indonesia)</label>
                        <textarea name="content_id" id="edit_content_id" rows="6" class="form-control"></textarea>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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

            // Delegasi klik tombol Edit (tetap jalan setelah redraw)
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
                    const res = await fetch(`<?php echo e(url('admin/berita')); ?>/${id}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    if (!res.ok) throw new Error('Gagal mengambil data (HTTP ' + res.status + ')');
                    const row = await res.json();

                    // Set action form PUT /admin/berita/{id}
                    const form = document.getElementById('formEdit');
                    form.action = `<?php echo e(url('admin/berita')); ?>/${id}`;

                    // Isi field termasuk SLUG
                    document.getElementById('edit_id').value = row.id ?? '';
                    document.getElementById('edit_title_id').value = row.title_id ?? '';
                    document.getElementById('edit_title_en').value = row.title_en ?? '';
                    document.getElementById('edit_slug_id').value = row.slug_id ?? '';
                    document.getElementById('edit_slug_en').value = row.slug_en ?? '';
                    document.getElementById('edit_content_id').value = row.content_id ?? '';
                    document.getElementById('edit_content_en').value = row.content_en ?? '';
                    document.getElementById('edit_status').value = row.status ?? 'published';

                    // Info + preview cover
                    const info = document.getElementById('edit_cover_info');
                    const wrap = document.getElementById('edit_cover_wrap');
                    const img = document.getElementById('edit_cover_preview');

                    if (row.cover) {
                        info.innerHTML = 'Cover saat ini: <code>' + row.cover + '</code>';
                        img.src =
                        `<?php echo e(url('/')); ?>/${row.cover}`; // row.cover = 'upload/berita/xxx.jpg'
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
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/admin/berita.blade.php ENDPATH**/ ?>
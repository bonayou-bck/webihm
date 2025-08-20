<?php $__env->startSection('title', 'Fasilitas'); ?>
<?php $__env->startSection('scripts', 'Fasilitas'); ?>
<?php $__env->startSection('content'); ?>

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
          <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-id="<?php echo e($row->id); ?>">
              <td><?php echo e($i + 1); ?></td>
              <td class="fw-semibold"><?php echo e($row->title); ?></td>
              <td class="text-muted small">
                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($row->description), 90)); ?>

              </td>
              <td>
                <?php if(!empty($row->foto)): ?>
                  <img src="<?php echo e(url('/' . ltrim($row->foto, '/'))); ?>"
                       alt="Foto"
                       style="max-width:60px;max-height:60px;border-radius:6px;">
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
              <td class="small text-muted"><?php echo e($row->updated_at?->format('d M Y H:i')); ?></td>
              <td>
                <div class="form-button-action d-flex align-items-center gap-1">
                  
                  <button type="button"
                          data-id="<?php echo e($row->id); ?>"
                          data-bs-toggle="tooltip" title="Edit"
                          class="btn btn-link btn-primary btn-lg">
                    <i class="fa fa-edit"></i>
                  </button>

                  
                  <form action="<?php echo e(url('admin/fasilitas/'.$row->id)); ?>"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus fasilitas ini?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                            data-bs-toggle="tooltip" title="Remove"
                            class="btn btn-link btn-danger">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
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
      <form class="modal-content" method="POST" action="<?php echo e(url('admin/fasilitas-create')); ?>"
            enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
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

  
  <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      
      <form class="modal-content" id="formEdit" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
      const res = await fetch(`<?php echo e(url('admin/fasilitas')); ?>/${id}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      if (!res.ok) throw new Error('Gagal mengambil data (HTTP ' + res.status + ')');
      const row = await res.json();

      // Set action form PUT /admin/fasilitas/{id}
      const form = document.getElementById('formEdit');
      form.action = `<?php echo e(url('admin/fasilitas')); ?>/${id}`;

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
        img.src = `<?php echo e(url('/')); ?>/${row.foto}`; // row.foto = 'upload/fasilitas/xxx.jpg'
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/admin/fasilitas.blade.php ENDPATH**/ ?>
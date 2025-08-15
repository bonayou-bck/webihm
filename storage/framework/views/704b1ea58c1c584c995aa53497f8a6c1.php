<?php $__env->startSection('title','Berita - Itci Hutani Manunggal'); ?>
<?php $__env->startSection('body_class','berita-page'); ?>

<?php $__env->startPush('styles'); ?>
<style>
  .sidebar-sticky{position:sticky; top:90px}
  .post-meta{font-size:.9rem; opacity:.8}
  .post-title{margin:.25rem 0 .5rem; line-height:1.25}
  .post-image img{width:100%; height:auto; border-radius:.5rem; object-fit:cover}
  @media (min-width:992px){ .post-image img{ max-height:420px } }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
  
  <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.webp')); ?>');">
    <div class="container position-relative">
      <h1>Berita</h1>
      <p>Update informasi dan kegiatan terbaru ITCI Hutani Manunggal.</p>
    </div>
  </div>

  <section id="blog" class="blog section">
    <div class="container">
      <div class="row gy-4">
        
        <div class="col-lg-8">
          <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="mb-4 pb-4 border-bottom">
              <div class="post-image mb-3">
                <a href="<?php echo e(route('pages.berita-detail')); ?>">
                  <img src="<?php echo e(asset($post->cover)); ?>" alt="cover">
                </a>
              </div>
              <h2 class="post-title h4">
                <a class="text-dark text-decoration-none" href="<?php echo e(route('pages.berita-detail')); ?>">
                  <?php echo e($post->title); ?>

                </a>
              </h2>
              <div class="post-meta mb-2">
                <span class="me-2"><?php echo e($post->title_id); ?></span><br>
                <span class="me-2"><i class="bi bi-calendar-event"></i> <?php echo e($post->created_at->format('d M Y')); ?></span><br>
                <span class="me-2"><i class="bi bi-person"></i> Admin</span><br>
              </div>
              <p class="mb-0 text-muted"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($post->content), 200)); ?></p>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          
          <div class="mt-4">
            
          </div>
        </div>

        
        <div class="col-lg-4">
          <div class="sidebar sidebar-sticky">
            <div class="widget mb-4">
              <h4 class="widget-title">Pencarian</h4>
              <form method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" name="q" value="<?php echo e(request('q')); ?>" placeholder="Cari berita...">
                  <button class="btn btn-primary">Cari</button>
                </div>
              </form>
            </div>

            <div class="widget mb-4">
              <h4 class="widget-title">Terbaru</h4>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><a class="text-decoration-none" href="<?php echo e(route('pages.berita-detail')); ?>">Judul Berita Satu</a><div class="small text-muted"><?php echo e(now()->format('d M Y')); ?></div></li>
                <li class="mb-2"><a class="text-decoration-none" href="<?php echo e(route('pages.berita-detail')); ?>">Judul Berita Dua</a><div class="small text-muted"><?php echo e(now()->format('d M Y')); ?></div></li>
              </ul>
            </div>

            <div class="widget">
              <h4 class="widget-title">Kategori</h4>
              <div>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">Perusahaan</a>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">Kegiatan</a>
                <a href="#" class="badge bg-light text-dark border me-1 mb-1">CSR</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/berita.blade.php ENDPATH**/ ?>
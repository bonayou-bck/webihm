<?php $__env->startSection('title', 'Fasilitas - Itci Hutani Manunggal'); ?>
<?php $__env->startSection('body_class', 'service-details-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1 class="mb-2">Fasilitas</h1>
                <nav class="breadcrumbs">
                    <ol></ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Fasilitas Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-12">

                        <div class="service-content">
                            <div class="row g-4">
                                <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <?php if(!empty($item->foto)): ?>
                                                <div class="thumb">
                                                    <a href="<?php echo e(asset(ltrim($item->foto, '/'))); ?>" class="glightbox"
                                                        data-gallery="fasilitas" data-title="<?php echo e($item->title); ?>"
                                                        data-description="<?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->description ?? ''), 160)); ?>">
                                                        <img src="<?php echo e(asset(ltrim($item->foto, '/'))); ?>"
                                                            alt="<?php echo e($item->title); ?>" class="thumb-img" loading="lazy"
                                                            decoding="async">
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><?php echo e($item->title); ?></h5>
                                                <?php if(!empty($item->description)): ?>
                                                    <div class="card-text text-muted">
                                                        <?php echo nl2br(e($item->description)); ?>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="text-muted">—</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-12 text-muted">Belum ada data fasilitas.</div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Fasilitas Section -->

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.GLightbox) {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('styles'); ?>
<style>
  /* Rasio seragam untuk thumbnail (ubah 4/3 jika mau 1/1, 16/9, dll.) */
  .service-details .thumb{
    aspect-ratio: 4/3;  /* <- ubah di sini kalau perlu */
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    background: #f6f7f9;
  }
  .service-details .thumb-img{
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .35s ease;
  }
  .service-details .thumb:hover .thumb-img{ transform: scale(1.03); }

  /* Fallback untuk browser lama yang belum support aspect-ratio */
  @supports not (aspect-ratio: 1) {
    .service-details .thumb{ position: relative; }
    .service-details .thumb::before{
      content: ""; display: block; padding-top: calc(100% * 3 / 4); /* 4/3 */
    }
    .service-details .thumb > a,
    .service-details .thumb > a > img{
      position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    }
  }
</style>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/fasilitas.blade.php ENDPATH**/ ?>
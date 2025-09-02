<?php $__env->startSection('title', 'Fasilitas - Itci Hutani Manunggal'); ?>
<?php $__env->startSection('body_class', 'service-details-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1>Fasilitas</h1>
                <h2>Kami menyediakan berbagai fasilitas yang mendukung operasional sekaligus mencerminkan komitmen perusahaan terhadap kenyamanan, efisiensi, dan keberlanjutan. Dari infrastruktur kerja hingga sarana pendukung di lapangan.</h2>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Fasilitas Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-12">
                        
                            <div class="row g-4">
                                <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php $imgCount = !empty($item->Fasilitas_img) ? count($item->Fasilitas_img) : 0; ?>
                                    <div class="col-md-6 col-lg-4">
                                        <article class="card fasilitas-card h-100 border-0 shadow-sm overflow-hidden">
                                            <?php if(!empty($item->cover)): ?>
                                                <div class="card-img-top thumb position-relative">
                                                    <a href="<?php echo e(asset(ltrim($item->cover, '/'))); ?>" class="glightbox"
                                                        data-gallery="fasilitas-<?php echo e($item->id); ?>" data-title="<?php echo e($item->title); ?>"
                                                        data-description="<?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->content ?? ''), 160)); ?>">
                                                        <img src="<?php echo e(asset(ltrim($item->cover, '/'))); ?>"
                                                            alt="<?php echo e($item->title); ?>" class="thumb-img" loading="lazy"
                                                            decoding="async">
                                                    </a>
                                                    
                                                    <?php if(!empty($item->Fasilitas_img) && count($item->Fasilitas_img)): ?>
                                                        <?php $__currentLoopData = $item->Fasilitas_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(asset(ltrim($gimg->src, '/'))); ?>" class="glightbox d-none" data-gallery="fasilitas-<?php echo e($item->id); ?>" data-title="<?php echo e($item->title); ?>" data-description="<?php echo e($gimg->caption); ?>"></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <div class="img-overlay d-flex justify-content-between align-items-start p-2">
                                                        <div class="overlay-title">
                                                            <h6 class="mb-0 text-white fw-bold"><?php echo e($item->title); ?></h6>
                                                        </div>
                                                        <div>
                                                            <span class="badge bg-primary bg-opacity-90 text-white"><?php echo e($imgCount); ?> gambar</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="card-body d-flex flex-column">
                                                <?php
                                                    $excerpt = \Illuminate\Support\Str::limit(strip_tags($item->title ?? ''), 140);
                                                ?>

                                                <p class="text-muted mb-3 small"><?php echo nl2br(e($excerpt)); ?></p>

                                                

                                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                                    <div class="meta small text-muted">Updated: <?php echo e(optional($item->updated_at)->format('d M Y')); ?> · <?php echo e($imgCount); ?> images</div>
                                                    
                                                </div>
                                            </div>

                                            
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-12 text-muted">Belum ada data fasilitas.</div>
                                <?php endif; ?>
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

    /* Professional card & gallery styles for Fasilitas */
    .service-details .thumb{
        aspect-ratio: 4/3;
        width: 100%;
        overflow: hidden;
        border-radius: 12px;
        background: linear-gradient(180deg, #f8faf8 0%, #eef7ee 100%);
        position: relative;
    }

    .fasilitas-card {
        transition: transform .28s ease, box-shadow .28s ease;
        border-radius: 12px;
        overflow: hidden;
        background: transparent;
        color: bisque;
    }
    .fasilitas-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(16,24,40,.12); }

    .fasilitas-card .card-img-top.thumb { height: 25vh; }
    .fasilitas-card .thumb-img { width: 100%; height: 100%; object-fit: cover; display: block; }

    /* image overlay: title left, badge right */
    .fasilitas-card .img-overlay{ position: absolute; inset: 0; pointer-events: none; display:flex; flex-direction:column; justify-content:space-between; }
    .fasilitas-card .img-overlay .overlay-top{ display:flex; justify-content:space-between; align-items:flex-start; padding: .8vh; }
    .fasilitas-card .img-overlay .overlay-title h6{ margin:0; font-size:1rem; color: #fff; text-shadow: 0 2px 8px rgba(0,0,0,.45); }
    .fasilitas-card .img-overlay .badge{ pointer-events:auto; }
    .fasilitas-card .img-overlay { background: linear-gradient(180deg, rgba(10, 10, 10, 0.5) 0%, rgba(0,0,0,0.38) 100%); }

    /* gallery preview thumbnails */
    .gallery-preview img{ border-radius:8px; border: 1px solid rgba(0,0,0,0.04); }

    .glightbox-trigger { text-decoration: none; }
    .collapse-text { max-height: 4.8em; overflow: hidden; }

    /* .service-content { background-color: rgba(34,197,94,0.06); padding: 1.25rem; border-radius: 12px; } */
    .fasilitas-card .card-body { background: transparent; padding: 1rem; }

    .actions .btn-outline-light { border-color: rgba(255,255,255,0.12); color: rgba(255,255,255,0.95); }
    .actions .btn-outline-light:hover { background: rgba(255,255,255,0.04); }

    .service-details .thumb-img{ transition: transform .35s ease; }
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
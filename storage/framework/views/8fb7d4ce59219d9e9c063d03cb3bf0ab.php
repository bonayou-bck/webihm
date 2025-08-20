<?php $__env->startSection('title', 'Sertifikat'); ?>
<?php $__env->startSection('body_class', 'sustainability-gallery-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        
        <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1 class="mb-3">Sertifikat</h1>
                <p class="lead lead-muted">Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan
                    Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
            </div>
        </div>
        <section id="portfolio" class="portfolio section">
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 portfolio-container isotope-container">
                        <?php $__currentLoopData = $ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                                <div class="portfolio-wrap">
                                    <img src="<?php echo e(asset($item->showcase)); ?>" class="img-fluid" alt="Capturing Moments"
                                        loading="lazy">
                                    <div class="portfolio-info">
                                        <h4><?php echo e($item->name_id); ?></h4>
                                        <p><?php echo e($item->description_id); ?></p>
                                        <div class="portfolio-links">
                                            <a href="<?php echo e(asset($item->showcase)); ?>" class="glightbox"
                                                data-gallery="sustainability-gallery"
                                                data-glightbox="title: <?php echo e(e($item->name_id)); ?>; description: <?php echo e(e($item->description_id)); ?>">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof GLightbox !== 'undefined') {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/sertifikat.blade.php ENDPATH**/ ?>
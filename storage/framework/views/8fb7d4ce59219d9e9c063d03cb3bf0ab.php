<?php $__env->startSection('title', 'Sertifikat'); ?>
<?php $__env->startSection('body_class', 'sustainability-gallery-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        
        <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1 class="mb-3">Sertifikat</h1>
                <p class="lead lead-muted">
                    Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan
                    Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.
                </p>
            </div>
        </div>

        <section id="portfolio" class="portfolio section">
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 portfolio-container isotope-container">
                        <?php $__currentLoopData = $ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $lbId = 'lb-sertif-' . $loop->index; ?>

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                                <div class="portfolio-wrap shadow-sm js-card" data-src="<?php echo e(asset($item->showcase)); ?>">
                                    
                                    <img src="<?php echo e(asset($item->showcase)); ?>" class="img-fluid portfolio-thumb"
                                        alt="<?php echo e(e($item->name_id)); ?>" loading="lazy">
                                    <div class="portfolio-info">
                                        <h4 class="mb-1"><?php echo e($item->name_id); ?></h4>
                                        <p class="text-muted small mb-0"><?php echo e($item->description_id); ?></p>
                                        <div class="portfolio-links">
                                            
                                            <a href="#<?php echo e($lbId); ?>" class="glightbox"
                                                data-gallery="sustainability-gallery" data-width="95vw" data-height="90vh">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div id="<?php echo e($lbId); ?>" class="glightbox-inline" style="display:none;">
                                <div class="lb-wrap">
                                    <div class="lb-flex">
                                        <div class="lb-media">
                                            <img src="<?php echo e(asset($item->showcase)); ?>" alt="<?php echo e(e($item->name_id)); ?>">
                                        </div>
                                        <div class="lb-side">
                                            <h3 class="lb-title"><?php echo e($item->name_id); ?></h3>
                                            <p class="lb-desc"><?php echo e($item->description_id); ?></p>
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

<?php $__env->startPush('styles'); ?>
    <style>
        /* --- Grid & kartu rapi --- */
        .portfolio .portfolio-item .portfolio-wrap {
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .portfolio .portfolio-item .portfolio-wrap:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
        }

        /* Thumbnail seragam, crop rapi */
        .portfolio .portfolio-item .portfolio-wrap > .portfolio-thumb {
            display: block;
            width: 100%;
            height: clamp(180px, 22vw, 260px);
            object-fit: cover;
            object-position: center;
            background: #f2f4f7;
        }
        .portfolio .portfolio-item .portfolio-info { padding: 12px 14px; }

        /* ====== GLightbox: pakai ruang lebih besar & layout samping ====== */

        /* Perkecil padding default GLightbox & lebarkan kontainer */
        .glightbox-clean .gslide-content { padding: 16px !important; }
        .glightbox-clean .ginner-container { max-width: 96vw !important; }

        /* --- Layout GLightbox inline: side-by-side --- */
        .lb-wrap { width: min(96vw, 1400px); margin: 0 auto; }

        /* Tinggi besar (90vh) supaya gambar tidak kecil */
        .lb-flex {
            display: flex;
            gap: 24px;
            align-items: stretch;   /* penting: kolom ikut setinggi container */
            height: 90vh;
            max-height: 90vh;
        }

        /* Rasio kolom: gambar 68% | teks 32% */
        .lb-media   { flex: 0 1 68%; min-width: 0; }
        .lb-side    { flex: 1;      min-width: 0; overflow: auto; padding-right: 4px; }

        .lb-title { margin: 0 0 8px; font-size: 1.25rem; font-weight: 700; }
        .lb-desc  { margin: 0; color: #5e6a7a; line-height: 1.6; }

        /* Gambar isi penuh tinggi kolom (proporsional, tanpa gepeng) */
        .lb-media img {
            display: block;
            width: 100%;
            height: 100%;             /* kunci: pakai seluruh tinggi kolom */
            object-fit: contain;      /* jaga proporsi; ubah ke 'cover' jika mau penuh dengan crop */
            object-position: center;
            background: #0b0b0b;
            border-radius: 12px;
        }

        /* Responsive: stack di layar kecil */
        @media (max-width: 768px) {
            .lb-flex {
                flex-direction: column;
                height: auto;
                max-height: unset;
            }
            .lb-media img {
                height: 60vh;          /* tetap besar di mobile */
                max-height: 70vh;
            }
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Init GLightbox (inline selector tetap sama)
            if (typeof GLightbox !== 'undefined') {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/sertifikat.blade.php ENDPATH**/ ?>
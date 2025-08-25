<?php $__env->startSection('title', 'Keberlanjutan'); ?>
<?php $__env->startSection('body_class', 'keberlanjutan-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1 class="mb-2">Keberlanjutan</h1>
                <nav class="breadcrumbs">
                    <ol></ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <section class="section py-5">
            <div class="container">
                
                <div class="row mb-4 align-items-center">
                    <div class="col-lg-8">
                        <h2 class="display-6 fw-bold mb-2">Pendekatan Kami</h2>
                        <p class="text-muted">Melalui program rehabilitasi, sertifikasi, dan keterlibatan komunitas, kami menjaga siklus produksi yang seimbang antara kebutuhan manusia dan kelestarian alam.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="#" class="btn btn-outline-light">Pelajari Kebijakan Kami</a>
                    </div>
                </div>

                
                <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $images = $item->keberlanjutan_img ?? collect();
                        $imgCount = $images->count() + (!empty($item->cover) ? 1 : 0);
                        $reverse = ($loop->index % 2) === 1; // alternate layout
                    ?>

                    <article class="card keb-card mb-5 shadow-sm overflow-hidden border-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-5 <?php if($reverse): ?> order-lg-2 <?php endif; ?>">
                                <?php if(!empty($item->cover)): ?>
                                    <div class="thumb h-100 position-relative square-thumb">
                                        <a href="<?php echo e(asset(ltrim($item->cover, '/'))); ?>" class="glightbox d-block" data-gallery="k<?php echo e($item->id); ?>" data-title="<?php echo e(e($item->title)); ?>" data-description="">
                                            <img src="<?php echo e(asset(ltrim($item->cover, '/'))); ?>" alt="<?php echo e($item->title); ?>" class="thumb-img" loading="lazy" decoding="async">
                                        </a>

                                        <div class="img-overlay p-3 d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="mb-0 text-white fw-bold"><?php echo e($item->title); ?></h5>
                                                <small class="text-white-75"><?php echo e(optional($item->updated_at)->format('d M Y')); ?></small>
                                            </div>
                                            <span class="badge bg-success bg-opacity-90"><?php echo e($imgCount); ?> gambar</span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                            </div>

                            <div class="col-lg-7">
                                <div class="card-body p-4">
                                    <h3 class="h4 mb-2"><?php echo e($item->title); ?></h3>
                                    <div class="keb-content text-muted mb-3"><?php echo \Illuminate\Support\Str::limit($item->content ?? '', 320); ?></div>

                                    <?php if($images->count()): ?>
                                        <div class="row g-2 mb-3">
                                            <?php $__currentLoopData = $images->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-3">
                                                    <a href="<?php echo e(asset(ltrim($img->src, '/'))); ?>" class="glightbox keb-thumb square-thumb" data-gallery="k<?php echo e($item->id); ?>" data-title="<?php echo e(e($item->title)); ?>" data-description="<?php echo e($img->description); ?>">
                                                        <img src="<?php echo e(asset(ltrim($img->src, '/'))); ?>" alt="<?php echo e($item->title); ?>" class="keb-thumb-img" loading="lazy" decoding="async">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($images->count() > 4): ?>
                                                <div class="col-3 d-flex align-items-center justify-content-center">
                                                    <a href="<?php echo e(asset(ltrim($images->first()->src, '/'))); ?>" class="glightbox view-more text-center d-inline-block square-thumb" data-gallery="k<?php echo e($item->id); ?>">
                                                        <div class="more-placeholder">
                                                            +<?php echo e($images->count() - 4); ?>

                                                            <div class="small text-muted">Lihat semua</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="small text-muted">Diperbarui: <?php echo e(optional($item->updated_at)->format('d M Y')); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted">Belum ada data keberlanjutan.</div>
                <?php endif; ?>

            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.GLightbox) {
                // Disable looping so lightbox doesn't cycle back to the first image
                GLightbox({ selector: '.glightbox', touchNavigation: true, loop: false });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Keberlanjutan - futuristic / sustainability theme */
        :root{
            --accent-1: #0ea5a4; /* teal */
            --accent-2: #16a34a; /* green */
            --glass-bg: rgba(255,255,255,0.6);
            --glass-border: rgba(255,255,255,0.14);
        }

        .page-title.dark-background{ padding: 5.5rem 0; background-size:cover; background-position:center; position:relative; }
        .page-title .lead{ max-width: 780px; color: rgba(255,255,255,0.9); }
        .hero-accent{ position:absolute; right:2rem; top:2.5rem; opacity:0.9; filter: drop-shadow(0 8px 30px rgba(22,163,74,0.08)); }

        .keb-card{ border-radius: 16px; overflow: hidden; background: linear-gradient(180deg, rgba(255,255,255,0.65) 0%, rgba(243,250,240,0.55) 100%); backdrop-filter: blur(6px); border: 1px solid var(--glass-border); }

    /* enforce 1:1 square thumbnails */
    .square-thumb{ aspect-ratio: 1 / 1; overflow: hidden; display:block; }
    .keb-card .thumb{ width:100%; display:block; }
    .keb-card .thumb, .square-thumb { position:relative; }
    .keb-card .thumb::before, .square-thumb::before { content: ''; display:block; padding-top:100%; /* 1:1 */ }
    .keb-card .thumb > a, .square-thumb > img, .square-thumb > a > img, .keb-thumb > img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; }
    .keb-card .thumb-img, .keb-thumb-img{ width:100%; height:100%; object-fit:cover; display:block; transition: transform .5s cubic-bezier(.2,.9,.2,1); }
    .keb-card .thumb:hover .thumb-img, .keb-thumb:hover .keb-thumb-img{ transform: scale(1.06); }

    .keb-card .img-overlay{ position:absolute; inset:0; display:flex; flex-direction:column; justify-content:space-between; padding:1.4vh; pointer-events:none;
            background: linear-gradient(180deg, rgba(6,95,70,0.08) 0%, rgba(6,95,70,0.18) 100%); }
        .keb-card .img-overlay h5{ margin:0; color:#f8fff8; text-shadow: 0 6px 24px rgba(6,95,70,0.18); }

        .keb-card .card-body{ padding: 1.25rem 1.5rem; }
        .keb-card .keb-content{ max-height: 7.2em; overflow:hidden; }

        .keb-thumb{ border-radius:10px; overflow:hidden; display:block; background:linear-gradient(180deg, rgba(240,250,240,0.9), rgba(245,251,245,0.9)); }
        .keb-thumb-img{ width:100%; height:100%; object-fit:cover; display:block; transition: transform .35s ease; }

        .more-placeholder{ width:100%; height:100%; border-radius:10px; background:linear-gradient(180deg, rgba(16,185,129,0.06), rgba(34,197,94,0.04)); display:flex; flex-direction:column; align-items:center; justify-content:center; color:var(--accent-2); font-weight:700; }

        /* animated outline accent on hover */
        .keb-card:hover{ box-shadow: 0 18px 50px rgba(6,95,70,0.08), 0 6px 18px rgba(6,95,70,0.04); transform: translateY(-4px); }

        /* gradient accent bar for headings */
        .keb-card .card-body h3::after{ content: ''; display:block; width:64px; height:4px; margin-top:10px; border-radius:4px; background: linear-gradient(90deg,var(--accent-1),var(--accent-2)); }

        /* responsive adjustments */
        @media (max-width: 991px){
            .keb-card .thumb{ min-height: 200px; }
            .page-title.dark-background{ padding: 3.5rem 0; }
            .hero-accent{ display:none; }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/keberlanjutan.blade.php ENDPATH**/ ?>
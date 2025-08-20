<?php $__env->startSection('title', 'Berita Detail - Itci Hutani Manunggal'); ?>
<?php $__env->startSection('body_class', 'berita-detail-page'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        
        <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1>Berita</h1>
                <p>Kumpulan informasi dan kabar terbaru dari PT Itci Hutani Manunggal.</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li><a href="<?php echo e(route('berita')); ?>">Berita</a></li>
                        <li class="current"><?php echo e($post->title_id ?? ($post->title ?? '-')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="blog section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-9">
                        
                        <article>
                            <div class="mb-3">
                                <img class="img-fluid rounded"
                                    src="<?php echo e(asset($post->cover ?? 'assets/img/placeholders/cover-16x9.jpg')); ?>"
                                    alt="cover" style="width:900px; height:400px; object-fit:cover;">
                            </div>
                            <h2 class="h3"><?php echo e($post->title_id ?? ($post->title ?? '-')); ?></h2>
                            <div class="post-meta mb-3 text-muted">
                                <span class="me-2"><i class="bi bi-person"></i> Admin</span>
                                <span class="me-2"><i class="bi bi-calendar-event"></i>
                                    <?php echo e($post->created_at ? $post->created_at->format('d M Y') : '-'); ?></span>
                                <span>
                                    <?php if(!empty($post->kategori)): ?>
                                        <a href="#" class="badge bg-light text-dark border"><?php echo e($post->kategori); ?></a>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="content">
                                <?php echo $post->content_id ?? ($post->content ?? '-'); ?>

                            </div>
                        </article>

                        
                        <div class="mt-4 d-flex align-items-center">
                            <div class="me-3">Bagikan:</div>
                            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->fullUrl())); ?>"><i
                                    class="bi bi-facebook"></i></a>
                            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank"
                                href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(request()->fullUrl())); ?>&text=<?php echo e(urlencode('Judul Berita')); ?>"><i
                                    class="bi bi-twitter-x"></i></a>
                            <a class="btn btn-sm btn-outline-secondary" target="_blank"
                                href="https://api.whatsapp.com/send?text=<?php echo e(urlencode('Judul Berita - ' . request()->fullUrl())); ?>"><i
                                    class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    
                    <div class="col-lg-3">
                        <div class="sidebar sidebar-sticky">
                            <div class="widget mb-4">
                                <h4 class="widget-title">Terbaru</h4>
                                <ul class="list-unstyled mb-0">
                                    <?php $__currentLoopData = $terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="mb-2">
                                            <a class="text-decoration-none"
                                                href="<?php echo e(route('pages.berita-detail', ['id' => $item->id])); ?>">
                                                <?php echo e($item->title_id ?? $item->title); ?>

                                            </a>
                                            <div class="small text-muted"><?php echo e($item->created_at->format('d M Y')); ?></div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/berita-detail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Berita - Itci Hutani Manunggal'); ?>
<?php $__env->startSection('body_class', 'berita-page'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .sidebar-sticky {
            position: sticky;
            top: 90px
        }

        .post-meta {
            font-size: .9rem;
            opacity: .8
        }

        .post-title {
            margin: .25rem 0 .5rem;
            line-height: 1.25
        }

        .post-image img {
            width: 100%;
            height: auto;
            border-radius: .5rem;
            object-fit: cover
        }

        @media (min-width:992px) {
            .post-image img {
                max-height: 420px
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        
        <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
            <div class="container position-relative">
                <h1>Berita</h1>
                <h2>Temukan kabar terbaru seputar kegiatan, program, dan perjalanan perusahaan kami. Dari aktivitas di lapangan hingga cerita keberlanjutan, kami berbagi informasi agar Anda selalu dekat dengan setiap langkah yang kami lakukan.</h2>
            </div>
        </div>

        <section id="blog" class="blog section">
            <div class="container">
                <div class="row gy-4">
                    
                    <div class="col-lg-8">
                        <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="mb-5 pb-4 border-bottom shadow-sm rounded-3 bg-white">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-5">
                                        <a href="<?php echo e(route('pages.berita-detail', ['id' => $post->id])); ?>">
                                            <img src="<?php echo e(asset($post->cover)); ?>" alt="cover"
                                                class="img-fluid rounded-3 w-100"
                                                style="object-fit:cover; min-height:180px; max-height:260px;">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="p-3">
                                            <a href="<?php echo e(route('pages.berita-detail', ['id' => $post->id])); ?>"
                                               class="mb-1 d-block text-dark fw-bold"
                                               style="font-size:1.2rem; line-height:1.2; text-decoration:none;">
                                                <?php echo e($post->title_id); ?>

                                            </a>
                                            <div class="mb-3" style="font-size:1.1rem; font-weight:bold; color:#444;">
                                                <?php echo e($post->slug_id); ?></div>
                                            <p class="mb-0 text-muted"
                                                style="display: flex; flex-wrap: wrap; align-items: center;">
                                                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($post->content_id), 150)); ?>

                                                <a href="<?php echo e(route('pages.berita-detail', ['id' => $post->id])); ?>" class="text-primary text-decoration-underline mt-2 d-inline-block">Baca Selengkapnya</a>
                                            </p>
                                            <div class="post-meta mb-2 small text-muted mt-3">
                                                <div class="post-meta mb-2 small text-muted">
                                                    <span class="me-3"><i class="bi bi-calendar-event"></i>
                                                        <?php echo e($post->created_at->format('d M Y')); ?></span>
                                                    <span class="me-3"><i class="bi bi-person"></i> Admin</span>
                                                    <span class="me-3"><i class="bi bi-person"></i> Kategori</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <input type="text" class="form-control" name="q"
                                            value="<?php echo e(request('q')); ?>" placeholder="Cari berita...">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
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
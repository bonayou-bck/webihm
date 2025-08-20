<?php $__env->startSection('title', 'Keberlanjutan'); ?>
<?php $__env->startSection('body_class', 'keberlanjutan-page'); ?>

<?php $__env->startPush('styles'); ?>
  
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">

  
  <div class="page-title dark-background" style="background-image:url('<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>');">
    <div class="container position-relative">
      <h1 class="mb-3">Keberlanjutan</h1>
      <p>Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.</p>
    </div>
  </div>

  <?php $__empty_1 = true; $__currentLoopData = $kebs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
      $desc = trim(preg_replace('/\s+/', ' ', strip_tags($k->content ?? '')));
      $imgs = $k->Keberlanjutan_img ?? collect();
    ?>

    <section class="section">
      <div class="container">

        
        <div class="row g-4 align-items-start mb-4">
          <div class="col-lg-6">
            <h2 class="title-xl"><?php echo e($k->title); ?></h2>
          </div>
          <div class="col-lg-6 desc">
            <?php echo $k->content; ?>

          </div>
        </div>

        
        <?php if(!empty($k->cover)): ?>
          <div class="row mb-4">
            <div class="col-12">
              <figure class="hero-image">
                <a href="<?php echo e(asset($k->cover)); ?>"
                   class="glightbox"
                   data-gallery="k<?php echo e($k->id); ?>"
                   data-title="<?php echo e(e($k->title)); ?>"
                   data-description="<?php echo e($desc); ?>">
                  <img src="<?php echo e(asset($k->cover)); ?>" alt="<?php echo e($k->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                </a>
              </figure>
            </div>
          </div>
        <?php endif; ?>

        
<?php if($imgs->count()): ?>
  <div class="row g-3">
    <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6 col-md-4 col-lg-3">
        <a class="glightbox keb-thumb"
           href="<?php echo e(asset($img->src)); ?>"
           data-gallery="k<?php echo e($k->id); ?>"
           data-title="<?php echo e(e($k->title)); ?>"
           data-description="<?php echo e($desc); ?>">
          <img src="<?php echo e(asset($img->src)); ?>" alt="<?php echo e($k->title); ?>" class="keb-thumb-img" loading="lazy" decoding="async">
        </a>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php endif; ?>


      </div>
    </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <section class="section"><div class="container">
      <div class="text-muted">Belum ada data keberlanjutan.</div>
    </div></section>
  <?php endif; ?>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function(){
  if (window.GLightbox) { GLightbox({ selector: '.glightbox' }); }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('styles'); ?>
<style>
  /* Ubah rasio di sini: 1/1 (persegi), 4/3, 3/2, 16/9, dll. */
  .keb-thumb{
    display:block;
    width:100%;
    aspect-ratio: 4 / 3;         /* <-- ganti ke 1 / 1 kalau mau kotak */
    border-radius: 12px;
    overflow:hidden;
    background:#f6f7f9;
  }
  .keb-thumb-img{
    width:100%; height:100%;
    object-fit:cover; display:block;
    transition: transform .35s ease;
  }
  .keb-thumb:hover .keb-thumb-img{ transform: scale(1.03); }

  /* Fallback untuk browser lama yang belum support aspect-ratio */
  @supports not (aspect-ratio: 1) {
    .keb-thumb{ position:relative; padding-top: calc(100% * 3 / 4); } /* 4/3 */
    .keb-thumb-img{ position:absolute; inset:0; width:100%; height:100%; object-fit:cover; }
  }
</style>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/pages/keberlanjutan.blade.php ENDPATH**/ ?>
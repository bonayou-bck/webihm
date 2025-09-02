<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php echo $__env->yieldContent('title', 'Dashboard Admin'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

<link rel="icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>" type="image/x-icon" />

<!-- Fonts & Icons -->
<script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
<script>
  WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
      families: ["Font Awesome 5 Solid","Font Awesome 5 Regular","Font Awesome 5 Brands","simple-line-icons"],
      urls: ["<?php echo e(asset('assets/admin/css/fonts.min.css')); ?>"],
    },
    active: function () { sessionStorage.fonts = true; },
  });
</script>

<!-- CSS Admin -->
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>?v=<?php echo e(@filemtime(public_path('assets/admin/css/bootstrap.min.css'))); ?>" data-no-sourcemap />
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/plugins.min.css')); ?>?v=<?php echo e(@filemtime(public_path('assets/admin/css/plugins.min.css'))); ?>" data-no-sourcemap />
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/kaiadmin.min.css')); ?>?v=<?php echo e(@filemtime(public_path('assets/admin/css/kaiadmin.min.css'))); ?>" data-no-sourcemap />

<?php echo $__env->yieldPushContent('styles'); ?>
<?php /**PATH /Users/bona/Downloads/webihm1/resources/views/partials/head.blade.php ENDPATH**/ ?>

<script src="<?php echo e(asset('assets/js/core/jquery-3.7.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/chart.js/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/chart-circle/circles.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/jsvectormap/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/jsvectormap/world.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/kaiadmin.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/setting-demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>


<script>
  $(function () {
    if ($('#lineChart').length) {
      $("#lineChart").sparkline([102,109,120,99,110,105,115], {
        type:"line", height:"70", width:"100%", lineWidth:"2",
        lineColor:"#177dff", fillColor:"rgba(23,125,255,0.14)"
      });
    }
  });
</script>
<?php /**PATH /Users/bona/Downloads/webihm1/resources/views/partials/footer.blade.php ENDPATH**/ ?>
<script src="<?php echo e(URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/node-waves/waves.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/feather-icons/feather.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/plugins.js')); ?>"></script>
<script>
    function showToast(message, className = 'bg-success', timeout = 1000, duration = 3000) {
        setTimeout(() => {
            Toastify({
                text: message,
                close: true,
                className: className,
                gravity: 'bottom',
                position: 'center',
                duration: duration
            }).showToast();
        }, timeout);
    }
</script>

<?php if(session()->exists(SESSION_ALERT)): ?>
    <?php
        $sess = session(SESSION_ALERT);
				$sessBg = "bg-primary";

				if($sess['status'] == 'success') {
					$sessBg = 'bg-success';
				}else if($sess['status'] == 'error'){
					$sessBg = 'bg-danger';
				}
    ?>

    <script>
        showToast(
					<?php echo json_encode($sess['message']); ?>,
					<?php echo json_encode($sessBg); ?>,
					500,
					6000
				);
    </script>
<?php endif; ?>

<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldContent('script-bottom'); ?>
<?php /**PATH /Users/bona/Downloads/webihm1/resources/views/app/layouts/vendor-scripts.blade.php ENDPATH**/ ?>
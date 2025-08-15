<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
  </head>
  <body>
    <div class="wrapper">
      
      <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="main-panel">
        
        <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="container">
          <div class="page-inner">
            <?php echo $__env->yieldContent('content'); ?>
          </div>
        </div>

        
        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>

      
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                <br />
                <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button type="button" class="changeTopBarColor" data-color="dark"></button>
                <button type="button" class="changeTopBarColor" data-color="blue"></button>
                <button type="button" class="changeTopBarColor" data-color="purple"></button>
                <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                <button type="button" class="changeTopBarColor" data-color="green"></button>
                <button type="button" class="changeTopBarColor" data-color="orange"></button>
                <button type="button" class="changeTopBarColor" data-color="red"></button>
                <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                <br />
                <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                <button type="button" class="changeTopBarColor" data-color="green2"></button>
                <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                <button type="button" class="changeTopBarColor" data-color="red2"></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button type="button" class="changeSideBarColor" data-color="white"></button>
                <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                <button type="button" class="changeSideBarColor" data-color="dark2"></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      
    </div>

    <?php echo $__env->make('partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>
<?php /**PATH /Users/bona/Downloads/webihm1/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
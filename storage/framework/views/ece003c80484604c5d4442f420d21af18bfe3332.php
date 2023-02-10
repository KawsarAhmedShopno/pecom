<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2038,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2038,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2038,$translate)); ?></span></p>
      </div>
    </section>
<main role="main">
<div class="container page-white-box mt-3">
<div class="row">
<div class="col-xl-12 col-md-12 col-sm-12">
    <div class="pb-3 mb-3 mt-3 pt-3 col-md-5 mx-auto">
       <div>
             <?php if($message = Session::get('success')): ?>
             <div class="alert alert-success" role="alert">
                <span class="alert_icon lnr lnr-checkmark-circle"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
             </div>
             <?php endif; ?>
             <?php if($message = Session::get('error')): ?>
             <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
        <div>
        <article class="card-body">
        <h4 class="card-title mb-4 mt-1"><?php echo e(Helper::translation(2038,$translate)); ?></h4>
             <form method="POST" action="<?php echo e(route('reset')); ?>" id="reset_form">
             <?php echo csrf_field(); ?>
             <input type="hidden" name="user_token" value="<?php echo e($token); ?>">
            <div class="form-group">
                <label><?php echo e(Helper::translation(2102,$translate)); ?></label>
                <input type="password" class="form-control input-lg" name="password" placeholder="<?php echo e(Helper::translation(2102,$translate)); ?>" id="password" data-bvalidator="required">
            </div>
            <div class="form-group">
               <label><?php echo e(Helper::translation(2162,$translate)); ?></label>
                <input type="password" class="form-control input-lg" placeholder="<?php echo e(Helper::translation(2162,$translate)); ?>" name="password_confirmation" id="password_confirmation" data-bvalidator="equal[password],required">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn button-color"> <?php echo e(Helper::translation(2038,$translate)); ?> </button>
            </div>                                                  
        </form>
        </article>
        </div>
     </div>
</div>
</div>
</div>
</div>
</main>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/parifqis/public_html/resources/views/reset.blade.php ENDPATH**/ ?>
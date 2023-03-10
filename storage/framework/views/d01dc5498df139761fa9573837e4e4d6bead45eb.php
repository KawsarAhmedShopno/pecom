<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if(Auth::user()->user_type == 'vendor'): ?><?php echo e(Helper::translation(2046,$translate)); ?><?php else: ?><?php echo e(Helper::translation(1912,$translate)); ?><?php endif; ?>  - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()->user_type == 'vendor'): ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2046,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2046,$translate)); ?></span></p>
      </div>
    </section>
    <main role="main">
     <div class="container page-white-box mt-3">
     <div class="row mb-2">
           <div class="col-md-12 text-right">
           <a href="<?php echo e(URL::to('/add-product')); ?>" class="btn button-color"><i class="fa fa-plus"></i> <?php echo e(Helper::translation(1927,$translate)); ?></a>
           </div>
        </div>
     <div class="row">
	     <div class="col-md-12">
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
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(1964,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2099,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1928,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1934,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1946,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2100,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1915,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1965,$translate)); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $product['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td>
                                            <?php if($product->product_image != ''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"  class="img-thumb" alt="<?php echo e($product->product_name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  class="img-thumb" alt="<?php echo e($product->product_name); ?>"/>  <?php endif; ?>
                                                </td>
                                            <td><?php echo e($product->product_name); ?> </td>
                                            <td><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product->product_price); ?> </td>
                                            <td><?php echo e($product->product_type); ?> </td>
                                            <td><?php if($product->flash_deals == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(1942,$translate)); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(1943,$translate)); ?></span> <?php endif; ?></td>
                                            <td><?php if($product->product_status == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(1916,$translate)); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(1917,$translate)); ?></span> <?php endif; ?></td>
                                            <td><a href="edit-product/<?php echo e($product->product_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(1966,$translate)); ?></a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(1967,$translate)); ?></a>
                                            <?php else: ?> 
                                            <a href="my-product/<?php echo e($product->product_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(1968,$translate)); ?>');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(1967,$translate)); ?></a><?php endif; ?></td>
                                        </tr>
                                       <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                   </tbody>
                                </table>
               </div>
        </div>
    </div>
</div>
</main>
<?php else: ?>
<?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\zigkart\resources\views/my-product.blade.php ENDPATH**/ ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Right Panel -->
<?php if(in_array('products',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(1975,$translate)); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-product')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> <?php echo e(Helper::translation(1927,$translate)); ?></a>&nbsp;
                            <a href="<?php echo e(url('/admin/products-import-export')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> <?php echo e(Helper::translation(2961,$translate)); ?></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
      <?php endif; ?>
      <?php if(session('error')): ?>
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
      <?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(Helper::translation(1975,$translate)); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(1964,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2099,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(1928,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(3567,$translate)); ?></th>
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
                                                <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>"  class="image-size" alt="<?php echo e($product->product_name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  class="image-size" alt="<?php echo e($product->product_name); ?>"/>  <?php endif; ?>
                                                </td>
                                            <td><?php echo e($product->product_name); ?> </td>
                                            <td><?php echo e($product->name); ?> </td>
                                            <td><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product->product_price); ?> </td>
                                            <td><?php echo e($product->product_type); ?> </td>
                                            <td><?php if($product->flash_deals == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(1942,$translate)); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(1943,$translate)); ?></span> <?php endif; ?></td>
                                            <td><?php if($product->product_status == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(1916,$translate)); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(1917,$translate)); ?></span> <?php endif; ?></td>
                                            <td><a href="edit-product/<?php echo e($product->product_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(1966,$translate)); ?></a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(1967,$translate)); ?></a>
                                            <?php else: ?> 
                                            <a href="products/<?php echo e($product->product_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(1968,$translate)); ?>');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(1967,$translate)); ?></a><?php endif; ?></td></tr><?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/parifqis/public_html/resources/views/admin/products.blade.php ENDPATH**/ ?>
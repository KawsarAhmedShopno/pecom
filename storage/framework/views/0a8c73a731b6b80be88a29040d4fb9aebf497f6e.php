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
    <?php if(in_array('pages',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(3027,$translate)); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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
        <?php if($errors->any()): ?>
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                       <form action="<?php echo e(route('admin.add-page')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="card">
                           <div class="col-md-8">
                              <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <?php $j = 1; ?>
            <?php $__currentLoopData = $language['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php if($j == 1): ?> active show <?php endif; ?>"  data-toggle="tab" href="#<?php echo e($language->language_name); ?>" role="tab"  aria-selected="true"><?php echo e($language->language_name); ?></a>
            </li>
            <?php $j++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <?php $i = 1; ?>
          <?php $__currentLoopData = $languages['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?> mt-4" id="<?php echo e($language->language_name); ?>" role="tabpanel">
              <div class="form-group">
                   <label for="name" class="control-label mb-1"><?php echo e(Helper::translation(3030,$translate)); ?> <span class="require">*</span></label>
                   <input type="text" name="page_title[]" id="page_title" value=""   class="form-control" data-bvalidator="required">
              </div>
              <div class="form-group">
                  <label for="site_desc" class="control-label mb-1"><?php echo e(Helper::translation(1931,$translate)); ?><span class="require">*</span></label>
                  <textarea name="page_desc[]" id="summary-ckeditor<?php echo e($language->language_id); ?>" rows="6" placeholder="page description" class="form-control" data-bvalidator="required"></textarea>
              </div>            
          </div>
          <input type="hidden" name="language_code[]" value="<?php echo e($language->language_code); ?>">
          <?php $i++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
                              <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(Helper::translation(3033,$translate)); ?> <span class="require">*</span></label>
                                                <input id="page_slug" name="page_slug" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(Helper::translation(1915,$translate)); ?> <span class="require">*</span></label>
                                                <select name="page_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(Helper::translation(1916,$translate)); ?></option>
                                                <option value="0"><?php echo e(Helper::translation(1917,$translate)); ?></option>
                                                </select>
                                                
                                            </div>   
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(Helper::translation(3036,$translate)); ?><span class="require">*</span></label>
                                                <select name="main_menu" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(Helper::translation(1942,$translate)); ?></option>
                                                <option value="0"><?php echo e(Helper::translation(1943,$translate)); ?></option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(Helper::translation(3039,$translate)); ?><span class="require">*</span></label>
                                                <select name="footer_menu" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(Helper::translation(1942,$translate)); ?></option>
                                                <option value="0"><?php echo e(Helper::translation(1943,$translate)); ?></option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(Helper::translation(1918,$translate)); ?></label>
                                                <input id="menu_order" name="menu_order" type="text" class="form-control">
                                            </div>
                                            <input type="hidden" name="token" value="<?php echo e(uniqid()); ?>">     
                                     </div>
                                </div>
                              </div>
                            </div>
                           <div class="col-md-6">
                           </div>
                           <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                     <i class="fa fa-dot-circle-o"></i> <?php echo e(Helper::translation(1919,$translate)); ?>

                                 </button>
                                 <button type="reset" class="btn btn-danger btn-sm">
                                     <i class="fa fa-ban"></i> <?php echo e(Helper::translation(2979,$translate)); ?>

                                  </button>
                           </div>
                         </div> 
                    </form> 
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
</html><?php /**PATH D:\xampp\htdocs\paribibi\resources\views/admin/add-page.blade.php ENDPATH**/ ?>
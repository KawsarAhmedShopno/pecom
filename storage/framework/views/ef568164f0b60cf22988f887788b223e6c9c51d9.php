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
    <?php if(in_array('slideshow',$avilable)): ?>
    <div id="right-panel" class="right-panel">
      <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Image</h1>
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
                       <form action="<?php echo e(route('admin.add-slideshow')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
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
                                           <label for="name" class="control-label mb-1">Heading</label>
                                           <input type="text" name="slide_title[]" id="slide_title" value=""   class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="site_desc" class="control-label mb-1">Sub Heading</label>
                                          <input id="slide_desc" name="slide_desc[]" type="text" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="site_desc" class="control-label mb-1">Button Text</label>
                                          <input id="slide_btn_text" name="slide_btn_text[]" type="text" class="form-control">
                                      </div>             
                                  </div>
                                  <input type="hidden" name="language_code[]" value="<?php echo e($language->language_code); ?>">
                                  <?php $i++; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                </div>
                              </div>
                              <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Text Position</label>
                                                <select name="slide_text_position" class="form-control">
                                                <option value="left">Left</option>
                                                <option value="right">Right</option>
                                                <option value="center">Center</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Image (size 1920 x 400) <span class="require">*</span></label>
                                                
                                            <input type="file" id="slide_image" name="slide_image" class="form-control-file"  data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"></div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Button Link</label>
                                                <input id="slide_btn_link" name="slide_btn_link" type="text" class="form-control" data-bvalidator="url">
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Display Order</label>
                                                <input id="slide_order" name="slide_order" type="text" class="form-control" data-bvalidator="digit,min[0]">
                                            </div> 
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="slide_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                                </select>
                                                
                                            </div> 
                                            <input type="hidden" name="token" value="<?php echo e(uniqid()); ?>">    
                                            <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>">    
                                     </div>
                                </div>
                             </div>
                           </div>
                           <div class="col-md-6">
                           </div>
                           <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                     <i class="fa fa-dot-circle-o"></i> Submit
                                 </button>
                                 <button type="reset" class="btn btn-danger btn-sm">
                                     <i class="fa fa-ban"></i> Reset
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
</html><?php /**PATH /home/parifqis/public_html/resources/views/admin/add-slideshow.blade.php ENDPATH**/ ?>
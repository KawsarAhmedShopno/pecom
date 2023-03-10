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
    <?php if(in_array('settings',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation(3555,$translate)); ?></h1>
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
                      <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.social-settings')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                           <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3780,$translate)); ?> </label>
                                                <input id="facebook_url" name="facebook_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->facebook_url); ?>" data-bvalidator="url">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3783,$translate)); ?> </label>
                                                <input id="twitter_url" name="twitter_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->twitter_url); ?>" data-bvalidator="url">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3786,$translate)); ?> </label>
                                                <input id="gplus_url" name="gplus_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->gplus_url); ?>" data-bvalidator="url">
                                            </div>
                                       </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3789,$translate)); ?> </label>
                                                <input id="pinterest_url" name="pinterest_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->pinterest_url); ?>" data-bvalidator="url"></div><div class="form-group"><label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3792,$translate)); ?> </label>
                                                <input id="instagram_url" name="instagram_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->instagram_url); ?>" data-bvalidator="url"></div><input type="hidden" name="sid" value="1">
                             </div>
                                </div>
                             </div>
                             </div>
                             <div class="col-md-12"><div class="card-body"><h4><?php echo e(Helper::translation(3795,$translate)); ?> </h4></div></div>
                             <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3795,$translate)); ?><span class="require">*</span></label>
                                                 <select name="display_social_login" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->display_social_login == 1): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3120,$translate)); ?></option>
                                                <option value="0" <?php if($setting['setting']->display_social_login == 0): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3117,$translate)); ?></option>
                                                </select>
                                            </div>
                                </div>
                                </div>
                              </div>
                            </div>
                             <div class="col-md-12"></div>
                             <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                      <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3798,$translate)); ?> <span class="require">*</span></label>
                                                <input id="facebook_client_id" name="facebook_client_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->facebook_client_id); ?>" data-bvalidator="required"> <small>Example : 24661324324234232</small>
                                            </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3801,$translate)); ?> <span class="require">*</span></label>
                                                <input id="facebook_client_secret" name="facebook_client_secret" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->facebook_client_secret); ?>" data-bvalidator="required"> <small>Example : 5fd2de273a28f223232423424232432</small>
                                            </div>
                                 </div>
                                </div>
                             </div>
                            </div>
                             <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3804,$translate)); ?> <span class="require">*</span></label>
                                                <input id="facebook_callback_url" name="facebook_callback_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->facebook_callback_url); ?>" data-bvalidator="required,url"> <small>Example : <?php echo e(URL::to('/')); ?>/login/facebook/callback</small>
                                            </div>
                             </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"></div>
                             <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                      <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3807,$translate)); ?> <span class="require">*</span></label>
                                                <input id="google_client_id" name="google_client_id" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->google_client_id); ?>" data-bvalidator="required"> <small>Example : 5464565465454-ups8ho3dria.apps.googleusercontent.com</small>
                                            </div>
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3810,$translate)); ?> <span class="require">*</span></label>
                                                <input id="google_client_secret" name="google_client_secret" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->google_client_secret); ?>" data-bvalidator="required"> <small>Example : fwIUn323232j1-32432423YBe</small>
                                            </div>
                               </div>
                                </div>
                            </div>
                            </div>
                             <div class="col-md-6">
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(3813,$translate)); ?> <span class="require">*</span></label>
                                                <input id="google_callback_url" name="google_callback_url" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->google_callback_url); ?>" data-bvalidator="required,url"> <small>Example : <?php echo e(URL::to('/')); ?>/login/google/callback</small>
                                            </div>
                                        </div>
                                </div>
                             </div>
                             </div>
                             <div class="col-md-12 no-padding">
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
</html><?php /**PATH /home/parifqis/public_html/resources/views/admin/social-settings.blade.php ENDPATH**/ ?>
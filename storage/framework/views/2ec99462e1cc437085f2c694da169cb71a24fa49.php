<?php use ZigKart\Models\Product; ?>
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
                        <h1>Edit Product</h1>
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
                            <form action="<?php echo e(route('admin.edit-product')); ?>" method="post" id="category_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                           <div class="col-md-6">
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
          <?php
          if($language->language_code == 'en')
		  {
		     $view = Product::singlar($edit['product']->product_id);
		  }
		  else
		  {
		    $code = $language->language_code;
		    $view = Product::others($edit['product']->product_id,$code);
		  }
          ?>
          <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?> mt-4" id="<?php echo e($language->language_name); ?>" role="tabpanel">
              <div class="form-group">
                   <label for="name" class="control-label mb-1">Product Name <span class="require">*</span></label>
                   <input type="text" name="product_name[]" id="product_name" value="<?php if(!empty($view->product_name)): ?><?php echo e($view->product_name); ?><?php endif; ?>"   class="form-control" data-bvalidator="required">
              </div>
              <div class="form-group">
                        <label for="site_keywords" class="control-label mb-1">Short Description <span class="require">*</span></label>
                                                 <textarea name="product_short_desc[]" id="product_short_desc" rows="3" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"><?php if(!empty($view->product_short_desc)): ?><?php echo e($view->product_short_desc); ?><?php endif; ?></textarea>
                      </div> 
                      <div class="form-group">
                            <label for="site_desc" class="control-label mb-1">Description<span class="require">*</span></label>
                                                <textarea name="product_desc[]" id="summary-ckeditor<?php echo e($language->language_id); ?>" rows="3"  class="form-control" data-bvalidator="required"><?php if(!empty($view->product_desc)): ?><?php echo e(html_entity_decode($view->product_desc)); ?><?php endif; ?></textarea>
                       </div>           
          </div>
          <input type="hidden" name="language_code[]" value="<?php echo e($language->language_code); ?>">
          <?php $i++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
      <div class="form-group">
                            <label for="name" class="control-label mb-1">Slug <span class="require">*</span></label>
                                                <input id="product_slug" name="product_slug" type="text" class="form-control" value="<?php echo e($edit['product']->product_slug); ?>" data-bvalidator="required">
                                            </div>
                                           <div class="form-group">
                                                <label for="name" class="control-label mb-1">SKU <span class="require">*</span></label>
                                                <input id="product_sku" name="product_sku" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->product_sku); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Categories <span class="require">*</span></label>
                                                <select name="product_category[]" class="form-control" data-bvalidator="required" multiple>
                                                <?php $__currentLoopData = $categories['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $cats = 'cat-'.$menu->cat_id; ?>
                                                <option value="cat-<?php echo e($menu->cat_id); ?>" <?php if(in_array($cats,$product_categories)): ?> selected="selected" <?php endif; ?>><?php echo e($menu->category_name); ?></option>
                                                     <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $subcats = 'subcat-'.$sub_category->subcat_id; ?>
                                                     <option value="subcat-<?php echo e($sub_category->subcat_id); ?>" class="ml-2" <?php if(in_array($subcats,$product_categories)): ?> selected="selected" <?php endif; ?>>- <?php echo e($sub_category->subcategory_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                               </select>
                                            </div> 
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Price (<?php echo e($allsettings->site_currency_symbol); ?>)<span class="require">*</span></label>
                                                <input id="product_price" name="product_price" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->product_price); ?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">Offer Price (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                                                <input id="product_offer_price" name="product_offer_price" type="text" class="form-control" value="<?php echo e($edit['product']->product_offer_price); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Featured Image <span class="require">*</span></label>
                                                <input type="file" id="product_image" name="product_image" class="form-control-file" <?php if($edit['product']->product_image == ''): ?> data-bvalidator="required,extension[jpg:png:jpeg]" <?php else: ?> data-bvalidator="extension[jpg:png:jpeg]" <?php endif; ?> data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg"> <?php if($edit['product']->product_image != ''): ?>
                                          <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($edit['product']->product_image); ?>"  class="image-size" alt="<?php echo e($edit['product']->product_name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  class="image-size" alt="<?php echo e($edit['product']->product_name); ?>"/>
                                          <?php endif; ?>      
                                             </div> 
                                             <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">Upload Gallery Images</label>
                                                <input type="file" id="product_gallery[]" name="product_gallery[]" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" multiple>
                                                <br/><?php $__currentLoopData = $editimage['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="item-img"><img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($product->product_image); ?>" alt="<?php echo e($product->product_image); ?>" class="item-thumb">
                                                    <a href="<?php echo e(url('/admin/edit-product')); ?>/dropimg/<?php echo e(base64_encode($product->proimg_id)); ?>" onClick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="clearfix"></div>
                                             </div>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">Video Url</label>
                                                <input id="product_video_url" name="product_video_url" type="text" class="form-control" value="<?php echo e($edit['product']->product_video_url); ?>">
                                                <small>( Example : https://www.youtube.com/watch?v=C0DPdy98e4c )</small>
                                             </div> 
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Allow Seo? <span class="require">*</span></label>
                                                <select name="product_allow_seo" id="product_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->product_allow_seo == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($edit['product']->product_allow_seo == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                             </div>      
                               <div id="ifseo" <?php if($edit['product']->product_allow_seo == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                  <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">SEO Meta Keywords (max 160 chars) <span class="require">*</span></label>
                                            <textarea name="product_seo_keyword" id="product_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"><?php echo e($edit['product']->product_seo_keyword); ?></textarea></div> 
                                   <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">SEO Meta Description (max 160 chars) <span class="require">*</span></label>
                                            <textarea name="product_seo_desc" id="product_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"><?php echo e($edit['product']->product_seo_desc); ?></textarea></div>
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
                                                <label for="site_title" class="control-label mb-1">Vendor <span class="require">*</span></label>
                                                <select name="user_id" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $vendor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vendor->id); ?>" <?php if($edit['product']->user_id == $vendor->id): ?> selected <?php endif; ?>><?php echo e($vendor->username); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                         <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Tags</label>
                                             <textarea name="product_tags" id="product_tags" rows="4" placeholder="separate tag with commas" class="form-control noscroll_textarea"><?php echo e($edit['product']->product_tags); ?></textarea></div>                      <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Featured <span class="require">*</span></label>
                                                <select name="product_featured" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->product_featured == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($edit['product']->product_featured == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                            </div>
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Product Type <span class="require">*</span></label>
                                                <select name="product_type" id="product_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>" <?php if($edit['product']->product_type == $type): ?> selected <?php endif; ?>><?php echo e($type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                           </div>
                                          <div id="ifphysical_external" <?php if($edit['product']->product_type == 'physical' or $edit['product']->product_type == 'external'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>><div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Return Policy</label>
                                            <textarea name="product_return_policy" id="product_return_policy" rows="6" class="form-control noscroll_textarea"><?php echo e($edit['product']->product_return_policy); ?></textarea>
                                            </div> 
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Estimate Time ( Product delivery time )</label>
                                                <input id="product_estimate_time" name="product_estimate_time" type="text" class="form-control" data-bvalidator="digit,min[1]" value="<?php echo e($edit['product']->product_estimate_time); ?>"><small>Days</small>
                                     </div>  
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Condition <span class="require">*</span></label>
                                                <select name="product_condition" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="new" <?php if($edit['product']->product_condition == 'new'): ?> selected <?php endif; ?>>New</option>
                                                <option value="used" <?php if($edit['product']->product_condition == 'used'): ?> selected <?php endif; ?>>Used</option>
                                                </select>
                                           </div>
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Brand</label>
                                                <select name="product_brand" class="form-control">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $brand['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->brand_id); ?>" <?php if($edit['product']->product_brand == $brand->brand_id): ?> selected <?php endif; ?>><?php echo e($brand->brand_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                           </div>
                                           <div class="form-group">
                                                <label for="name" class="control-label mb-1">Available Stock</label>
                                                <input id="product_stock" name="product_stock" type="text" class="form-control" data-bvalidator="digit,min[0]" value="<?php echo e($edit['product']->product_stock); ?>">
                                                <small><span class="red-color">if leave empty "No Stock"</span></small>
                                           </div> 
                                          <?php $__currentLoopData = $attribute_product['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e($attribute->attribute_name); ?></label>
                                                <select name="product_attribute[]" class="form-control" multiple>
                                                <?php $__currentLoopData = $attribute->attributevalue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product_value->attribute_value_id); ?>-<?php echo e($attribute->attribute_id); ?>" <?php if(in_array($product_value->attribute_value_id,$product_attribute)): ?> selected="selected" <?php endif; ?>><?php echo e($product_value->attribute_value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </div>
                                         <div id="ifdigital" <?php if($edit['product']->product_type == 'digital'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="customer_earnings" class="control-label mb-1">Upload File (Zip Format Only)<span class="require">*</span></label>
                                                <input type="file" id="product_file" name="product_file" class="form-control-file" <?php if($edit['product']->product_file == ''): ?> data-bvalidator="required,extension[zip]" <?php else: ?> data-bvalidator="extension[zip]" <?php endif; ?> data-bvalidator-msg="Please select file of type .zip">
                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                <?php 
                                                if($edit['product']->product_file != '')
                                                {
                                                $fileurl = Storage::disk('s3')->url($edit['product']->product_file); 
                                                }
                                                else
                                                {
                                                $fileurl = '';  
                                                }
                                                ?>
                                                    <br/><a href="<?php echo e($fileurl); ?>" class="blue-color" download><?php echo e($edit['product']->product_file); ?></a>
                                                    <?php else: ?>
                                                    <br/><?php if($edit['product']->product_file!=''): ?><a href="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($edit['product']->product_file); ?>" class="blue-color" download><?php echo e($edit['product']->product_file); ?></a><?php endif; ?>
                                                    <?php endif; ?>
                                              </div>   
                                             <div id="ifexternal" <?php if($edit['product']->product_type == 'external'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1">External Url <span class="require">*</span></label>
                                                <input id="product_external_url" name="product_external_url" type="text" class="form-control" data-bvalidator="required,url" value="<?php echo e($edit['product']->product_external_url); ?>"></div><div id="ifphysical" <?php if($edit['product']->product_type == 'physical'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Local Shipping Price (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                                                <input id="product_local_shipping_fee" name="product_local_shipping_fee" type="text" class="form-control" data-bvalidator="min[0]" value="<?php echo e($edit['product']->product_local_shipping_fee); ?>"><small>(Vendor country based shipping) <span class="red-color"> - if leave empty "free shipping"</span></small>
                                     </div> 
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">World Shipping Price (<?php echo e($allsettings->site_currency_symbol); ?>)</label>
                                                <input id="product_global_shipping_fee" name="product_global_shipping_fee" type="text" class="form-control" data-bvalidator="min[0]" value="<?php echo e($edit['product']->product_global_shipping_fee); ?>"><small>(Vendor non country based shipping) <span class="red-color"> - if leave empty "free shipping"</span></small>
                                     </div>
                                    </div>
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Flash Deals? <span class="require">*</span></label>
                                                <select name="flash_deals" id="flash_deals" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->flash_deals == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($edit['product']->flash_deals == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                          </div>
                                     <div id="ifdeal" <?php if($edit['product']->flash_deals == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                          <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Deal Start Date <span class="require">*</span></label>
                                            <input id="flash_deal_start_date" name="flash_deal_start_date" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->flash_deal_start_date); ?>"></div><div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Deal End Date <span class="require">*</span></label>
                                      <input id="flash_deal_end_date" name="flash_deal_end_date" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['product']->flash_deal_end_date); ?>">
                                       </div>
                                  </div>       
                                  <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Status <span class="require">*</span></label>
                                                <select name="product_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['product']->product_status == 1): ?> selected <?php endif; ?>>Active</option>
                                                <option value="0" <?php if($edit['product']->product_status == 0): ?> selected <?php endif; ?>>InActive</option>
                                                </select>
                                   </div>
                                  <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>"> 
                                  <input type="hidden" name="file_size" value="<?php echo e($allsettings->site_max_zip_size); ?>">
                                  <input type="hidden" name="save_product_image" value="<?php echo e($edit['product']->product_image); ?>"> 
                                  <input type="hidden" name="save_product_file" value="<?php echo e($edit['product']->product_file); ?>">            
                                  <input type="hidden" name="product_token" value="<?php echo e($edit['product']->product_token); ?>">
                                  <input type="hidden" name="token" value="<?php echo e(uniqid()); ?>"> 
                                  <input type="hidden" name="product_id" value="<?php echo e($edit['product']->product_id); ?>"> 
                                </div>
                                </div>
                              </div>
                             </div>
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
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
</html><?php /**PATH D:\xampp\htdocs\zigkart\resources\views/admin/edit-product.blade.php ENDPATH**/ ?>
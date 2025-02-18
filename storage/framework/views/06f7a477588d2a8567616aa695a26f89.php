<?php $__env->startPush('css'); ?>
    <style>
        .primary_input.custom-transfer-account {
            display: inline-block;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php if(count(@$menus)>0): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordion" class="dd">
                        <ol class="dd-list">
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dd-item" data-id="<?php echo e($element->id); ?>">
                                <div class="card accordion_card" id="accordion_<?php echo e($element->id); ?>">
                                    <div class="card-header item_header" id="heading_<?php echo e($element->id); ?>">
                                        <div class="dd-handle">
                                            <div class="pull-left">
                                                <?php echo app('translator')->get('common.title'); ?> : <?php echo e($element->title); ?>

                                            </div>
                                        </div>
                                        <div class="pull-right btn_div">
                                            <?php if(userPermission("element-update")): ?>
                                            <a href="javascript:void(0);" onclick="" data-toggle="collapse" 
                                                data-target="#collapse_<?php echo e($element->id); ?>" aria-expanded="false" 
                                                aria-controls="collapse_<?php echo e($element->id); ?>" class="primary-btn btn_zindex panel-title">
                                                <?php echo app('translator')->get('common.edit'); ?> 
                                                <span class="collapge_arrow_normal"></span>
                                            </a>
                                            <?php endif; ?>
                                            <?php if(env('APP_SYNC')==TRUE): ?>
                                                <a href="javascript:void(0);" class="primary-btn btn_zindex" title="Disable For Demo" data-toggle="tooltip">
                                                    <i class="ti-close"></i>
                                                </a>
                                            <?php else: ?>
                                                <?php if(userPermission("delete-element")): ?>
                                                <a href="javascript:void(0);" onclick="elementDelete(<?php echo e($element->id); ?>)" class="primary-btn btn_zindex">
                                                    <i class="ti-close"></i>
                                                </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="collapse_<?php echo e($element->id); ?>" class="collapse" aria-labelledby="heading_<?php echo e($element->id); ?>" data-parent="#accordion_<?php echo e($element->id); ?>">
                                        <div class="card-body">
                                            <form enctype="multipart/form-data" id="elementEditForm">
                                                <div class="row">
                                                    <input type="hidden" name="id" value="<?php echo e($element->id); ?>">
                                                        <input type="hidden" name="type" value="<?php echo e($element->type); ?>">
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label" for="title">
                                                                    <?php echo app('translator')->get('front_settings.navigation_label'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <input class="primary_input_field form-control title" type="text" name="title" autocomplete="off" value="<?php echo e($element->title); ?>">
                                                            </div>
                                                        </div>
                                                        <?php if($element->type == 'customLink'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label" for="link">
                                                                    <?php echo app('translator')->get('front_settings.link'); ?>
                                                                </label>
                                                                <input class="primary_input_field form-control link" type="text" name="link" autocomplete="off" value="<?php echo e($element->link); ?>"  placeholder="Link">
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'dCourse'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.course'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <select name="course" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $course->id?'selected':''); ?> value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'dCourseCategory'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.course'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <select name="course_category" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $courseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $courseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $courseCategory->id?'selected':''); ?> value="<?php echo e($courseCategory->id); ?>"><?php echo e($courseCategory->category_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'dPages'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <select name="page" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $page->id?'selected':''); ?> value="<?php echo e($page->id); ?>"><?php echo e($page->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'sPages'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <select name="static_pages" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $static_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $static_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $static_page->id?'selected':''); ?> value="<?php echo e($static_page->id); ?>"><?php echo e($static_page->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'dNews'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.news'); ?> 
                                                                    <span class="text-danger"> *</span>
                                                                </label>
                                                                <select name="news" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $v_news->id?'selected':''); ?> value="<?php echo e($v_news->id); ?>"><?php echo e($v_news->news_title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php elseif($element->type == 'dNewsCategory'): ?>
                                                        <div class="col-lg-6">
                                                            <div class="primary_input mb-15">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('student.category'); ?> 
                                                                    <span class="text-danger"> *</span></label>
                                                                <select name="news_category" class="primary_select optionPopup">
                                                                    <?php $__currentLoopData = $news_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($element->element_id == $news_category->id?'selected':''); ?> value="<?php echo e($news_category->id); ?>"><?php echo e($news_category->category_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="col-xl-12">
                                                            <div class="primary_input">
                                                                <label class="primary_input_label" for="">
                                                                    <?php echo app('translator')->get('front_settings.show'); ?>
                                                                </label>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="primary_input custom-transfer-account">
                                                                                <input type="radio" name="content_show" id="cont_show<?php echo e($element->id); ?>" value="1" <?php echo e($element->show == 1?'checked':''); ?> class="common-checkbox">
                                                                                <label for="cont_show<?php echo e($element->id); ?>">
                                                                                    <?php echo app('translator')->get('front_settings.left'); ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="primary_input custom-transfer-account">
                                                                                <input type="radio" name="content_show" id="cont_show2<?php echo e($element->id); ?>" value="0" <?php echo e($element->show == 0?'checked':''); ?> class="common-checkbox">
                                                                                <label for="cont_show2<?php echo e($element->id); ?>">
                                                                                    <?php echo app('translator')->get('front_settings.right'); ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 mt-30">
                                                            <div class="primary_input">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <input type="checkbox" name="is_newtab" id="is_newtab<?php echo e($element->id); ?>" class="common-checkbox form-control" value="1" <?php echo e($element->is_newtab == 1? 'checked':''); ?>>
                                                                        <label for="is_newtab<?php echo e($element->id); ?>">
                                                                            <?php echo app('translator')->get('front_settings.open_in_a_new_tab'); ?>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 text-center">
                                                            <div class="d-flex justify-content-center pt_20">
                                                                <?php if(env('APP_SYNC')==TRUE): ?>
                                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo ">
                                                                        <button class="primary-btn fix-gr-bg" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('front_settings.update'); ?></button>
                                                                    </span>
                                                                <?php else: ?>
                                                                    <?php if(userPermission("element-update")): ?>
                                                                    <button type="submit" class="primary-btn fix-gr-bg">
                                                                        <i class="ti-check"></i>
                                                                        <?php echo app('translator')->get('front_settings.update'); ?>
                                                                    </button>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <ol class="dd-list">
                                    <?php $__currentLoopData = $element->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="<?php echo e($submenu->id); ?>">
                                        <div class="card accordion_card" id="accordion_<?php echo e($submenu->id); ?>">
                                            <div class="card-header item_header" id="heading_<?php echo e($submenu->id); ?>">
                                                <div class="dd-handle">
                                                    <div class="pull-left">
                                                        <?php echo app('translator')->get('front_settings.title'); ?> : <?php echo e($submenu->title); ?>

                                                    </div>
                                                </div>
                                                <div class="pull-right btn_div">
                                                    <?php if(userPermission("element-update")): ?>
                                                        <a href="javascript:void(0);" onclick="" data-toggle="collapse" data-target="#collapse_<?php echo e($submenu->id); ?>" aria-expanded="false" aria-controls="collapse_<?php echo e($submenu->id); ?>" class="primary-btn btn_zindex panel-title"><?php echo app('translator')->get('common.edit'); ?> <span class="collapge_arrow_normal"></span></a>
                                                    <?php endif; ?>
                                                    <?php if(env('APP_SYNC')==TRUE): ?>
                                                        <a href="javascript:void(0);" class="primary-btn btn_zindex" title="Disable For Demo" data-toggle="tooltip">
                                                            <i class="ti-close"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <?php if(userPermission("delete-element")): ?>
                                                            <a href="javascript:void(0);" onclick="elementDelete(<?php echo e($submenu->id); ?>)" class="primary-btn btn_zindex"><i class="ti-close"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div id="collapse_<?php echo e($submenu->id); ?>" class="collapse" aria-labelledby="heading_<?php echo e($submenu->id); ?>" data-parent="#accordion_<?php echo e($submenu->id); ?>">
                                                <div class="card-body">
                                                    <form enctype="multipart/form-data" id="elementEditForm">
                                                        <div class="row">
                                                            <input type="hidden" name="id" value="<?php echo e($submenu->id); ?>">
                                                                <input type="hidden" name="type" value="<?php echo e($submenu->type); ?>">
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for="title">
                                                                            <?php echo app('translator')->get('front_settings.navigation_label'); ?> 
                                                                            <span class="text-danger"> *</span>
                                                                        </label>
                                                                        <input class="primary_input_field form-control title" type="text" name="title" autocomplete="off" value="<?php echo e($submenu->title); ?>">
                                                                    </div>
                                                                </div>
                                                                <?php if($submenu->type == 'customLink'): ?>
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for="link">
                                                                            <?php echo app('translator')->get('front_settings.link'); ?>
                                                                        </label>
                                                                        <input class="primary_input_field form-control link" type="text" name="link" autocomplete="off" value="<?php echo e($submenu->link); ?>"  placeholder="Link">
                                                                    </div>
                                                                </div>
                                                                <?php elseif($submenu->type == 'dPages'): ?>
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                            <span class="text-danger"> *</span>
                                                                        </label>
                                                                        <select name="page" class="primary_select optionPopup">
                                                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php echo e($submenu->element_id == $page->id?'selected':''); ?> value="<?php echo e($page->id); ?>"><?php echo e($page->title); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                                <?php elseif($submenu->type == 'sPages'): ?>
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                            <span class="text-danger"> *</span>
                                                                        </label>
                                                                        <select name="static_pages" class="primary_select optionPopup">
                                                                            <?php $__currentLoopData = $static_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $static_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php echo e($submenu->element_id == $static_page->id?'selected':''); ?> value="<?php echo e($static_page->id); ?>"><?php echo e($static_page->title); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <?php elseif($submenu->type == 'dNews'): ?>
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('front_settings.news'); ?> 
                                                                            <span class="text-danger"> *</span>
                                                                        </label>
                                                                        <select name="news" class="primary_select optionPopup">
                                                                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php echo e($v_news->element_id == $v_news->id?'selected':''); ?> value="<?php echo e($v_news->id); ?>"><?php echo e($v_news->news_title); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <?php elseif($submenu->type == 'dNewsCategory'): ?>
                                                                <div class="col-lg-6">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('student.category'); ?> 
                                                                            <span class="text-danger"> *</span></label>
                                                                        <select name="news_category" class="primary_select optionPopup">
                                                                            <?php $__currentLoopData = $news_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php echo e($submenu->element_id == $news_category->id?'selected':''); ?> value="<?php echo e($news_category->id); ?>"><?php echo e($news_category->category_name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <div class="col-xl-12">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('front_settings.show'); ?>
                                                                        </label>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input custom-transfer-account">
                                                                                        <input type="radio" name="content_show" id="cont_show<?php echo e($submenu->id); ?>" value="1" <?php echo e($submenu->show == 1?'checked':''); ?> class="common-checkbox">
                                                                                        <label for="cont_show<?php echo e($submenu->id); ?>">
                                                                                            <?php echo app('translator')->get('front_settings.left'); ?>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input custom-transfer-account">
                                                                                        <input type="radio" name="content_show" id="cont_show2<?php echo e($submenu->id); ?>" value="0" <?php echo e($submenu->show == 0?'checked':''); ?> class="common-checkbox">
                                                                                        <label for="cont_show2<?php echo e($submenu->id); ?>">
                                                                                            <?php echo app('translator')->get('front_settings.right'); ?>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 mt-30">
                                                                    <div class="primary_input">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="is_newtab" id="is_newtab<?php echo e($submenu->id); ?>" class="common-checkbox form-control" value="1" <?php echo e($submenu->is_newtab == 1? 'checked':''); ?>>
                                                                                <label for="is_newtab<?php echo e($submenu->id); ?>">
                                                                                    <?php echo app('translator')->get('front_settings.open_in_a_new_tab'); ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="d-flex justify-content-center pt_20">
                                                                        <?php if(env('APP_SYNC')==TRUE): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo ">
                                                                                <button class="primary-btn fix-gr-bg" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('front_settings.update'); ?></button>
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <?php if(userPermission("element-update")): ?>
                                                                            <button type="submit" class="primary-btn fix-gr-bg">
                                                                                <i class="ti-check"></i>
                                                                                <?php echo app('translator')->get('front_settings.update'); ?>
                                                                            </button>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <ol class="dd-list">
                                        <?php $__currentLoopData = $submenu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="dd-item" data-id="<?php echo e($element->id); ?>">
                                            <div class="card accordion_card" id="accordion_<?php echo e($element->id); ?>">
                                                <div class="card-header item_header" id="heading_<?php echo e($element->id); ?>">
                                                    <div class="dd-handle">
                                                        <div class="pull-left">
                                                            <?php echo app('translator')->get('front_settings.title'); ?> : <?php echo e($element->title); ?>

                                                        </div>
                                                    </div>
                                                    <div class="pull-right btn_div">
                                                        <?php if(userPermission("element-update")): ?>
                                                            <a href="javascript:void(0);" onclick="" data-toggle="collapse" data-target="#collapse_<?php echo e($element->id); ?>" aria-expanded="false" aria-controls="collapse_<?php echo e($element->id); ?>" class="primary-btn btn_zindex panel-title"><?php echo app('translator')->get('common.edit'); ?> <span class="collapge_arrow_normal"></span></a>
                                                        <?php endif; ?>
                                                        <?php if(env('APP_SYNC')==TRUE): ?>
                                                            <a href="javascript:void(0);" class="primary-btn btn_zindex" title="Disable For Demo" data-toggle="tooltip">
                                                                <i class="ti-close"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <?php if(userPermission("delete-element")): ?>
                                                                <a href="javascript:void(0);" onclick="elementDelete(<?php echo e($element->id); ?>)" class="primary-btn btn_zindex"><i class="ti-close"></i></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div id="collapse_<?php echo e($element->id); ?>" class="collapse" aria-labelledby="heading_<?php echo e($element->id); ?>" data-parent="#accordion_<?php echo e($element->id); ?>">
                                                    <div class="card-body">
                                                        <form enctype="multipart/form-data" id="elementEditForm">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="<?php echo e($element->id); ?>">
                                                                    <input type="hidden" name="type" value="<?php echo e($element->type); ?>">
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-25">
                                                                            <label class="primary_input_label" for="title">
                                                                                <?php echo app('translator')->get('front_settings.navigation_label'); ?> 
                                                                                <span class="text-danger"> *</span>
                                                                            </label>
                                                                            <input class="primary_input_field form-control title" type="text" name="title" autocomplete="off" value="<?php echo e($element->title); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <?php if($element->type == 'customLink'): ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-25">
                                                                            <label class="primary_input_label" for="link">
                                                                                <?php echo app('translator')->get('front_settings.link'); ?>
                                                                            </label>
                                                                            <input class="primary_input_field form-control link" type="text" name="link" autocomplete="off" value="<?php echo e($element->link); ?>"  placeholder="Link">
                                                                        </div>
                                                                    </div>
                                                                    <?php elseif($element->type == 'dPages'): ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-15">
                                                                            <label class="primary_input_label" for="">
                                                                                <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                                <span class="text-danger"> *</span>
                                                                            </label>
                                                                            <select name="page" class="primary_select optionPopup">
                                                                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option <?php echo e($element->element_id == $page->id?'selected':''); ?> value="<?php echo e($page->id); ?>"><?php echo e($page->title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <?php elseif($element->type == 'sPages'): ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-15">
                                                                            <label class="primary_input_label" for="">
                                                                                <?php echo app('translator')->get('front_settings.pages'); ?> 
                                                                                <span class="text-danger"> *</span>
                                                                            </label>
                                                                            <select name="static_pages" class="primary_select optionPopup">
                                                                                <?php $__currentLoopData = $static_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $static_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option <?php echo e($element->element_id == $static_page->id?'selected':''); ?> value="<?php echo e($static_page->id); ?>"><?php echo e($static_page->title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php elseif($element->type == 'dNews'): ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-15">
                                                                            <label class="primary_input_label" for="">
                                                                                <?php echo app('translator')->get('front_settings.news'); ?> 
                                                                                <span class="text-danger"> *</span>
                                                                            </label>
                                                                            <select name="news" class="primary_select optionPopup">
                                                                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option <?php echo e($element->element_id == $v_news->id?'selected':''); ?> value="<?php echo e($v_news->id); ?>"><?php echo e($v_news->news_title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php elseif($element->type == 'dNewsCategory'): ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="primary_input mb-15">
                                                                            <label class="primary_input_label" for="">
                                                                                <?php echo app('translator')->get('student.category'); ?> 
                                                                                <span class="text-danger"> *</span></label>
                                                                            <select name="news_category" class="primary_select optionPopup">
                                                                                <?php $__currentLoopData = $news_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option <?php echo e($element->element_id == $news_category->id?'selected':''); ?> value="<?php echo e($news_category->id); ?>"><?php echo e($news_category->category_name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-xl-12">
                                                                        <div class="primary_input">
                                                                            <label class="primary_input_label" for="">
                                                                                <?php echo app('translator')->get('front_settings.show'); ?>
                                                                            </label>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <div class="primary_input custom-transfer-account">
                                                                                            <input type="radio" name="content_show" id="cont_show<?php echo e($element->id); ?>" value="1" <?php echo e($element->show == 1?'checked':''); ?> class="common-checkbox">
                                                                                            <label for="cont_show<?php echo e($element->id); ?>">
                                                                                                <?php echo app('translator')->get('front_settings.left'); ?>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="primary_input custom-transfer-account">
                                                                                            <input type="radio" name="content_show" id="cont_show2<?php echo e($element->id); ?>" value="0" <?php echo e($element->show == 0?'checked':''); ?> class="common-checkbox">
                                                                                            <label for="cont_show2<?php echo e($element->id); ?>">
                                                                                                <?php echo app('translator')->get('front_settings.right'); ?>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 mt-30">
                                                                        <div class="primary_input">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input type="checkbox" name="is_newtab" id="is_newtab<?php echo e($element->id); ?>" class="common-checkbox form-control" value="1" <?php echo e($element->is_newtab == 1? 'checked':''); ?>>
                                                                                    <label for="is_newtab<?php echo e($element->id); ?>">
                                                                                        <?php echo app('translator')->get('front_settings.open_in_a_new_tab'); ?>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 text-center">
                                                                        <div class="d-flex justify-content-center pt_20">
                                                                            <?php if(env('APP_SYNC')==TRUE): ?>
                                                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo ">
                                                                                    <button class="primary-btn fix-gr-bg" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('front_settings.update'); ?></button>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <?php if(userPermission("element-update")): ?>
                                                                                <button type="submit" class="primary-btn fix-gr-bg">
                                                                                    <i class="ti-check"></i>
                                                                                    <?php echo app('translator')->get('front_settings.update'); ?>
                                                                                </button>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body text-center">
            <?php echo app('translator')->get('front_settings.not_found_data'); ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/frontSettings/headerSubmenuList.blade.php ENDPATH**/ ?>
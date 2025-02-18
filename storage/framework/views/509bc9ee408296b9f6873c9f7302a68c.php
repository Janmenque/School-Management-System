<?php
    $generalSetting = generalSetting();
    $is_registration_permission = false;
    if (moduleStatusCheck('ParentRegistration')) {
        $reg_setting = Modules\ParentRegistration\Entities\SmRegistrationSetting::where('school_id', $generalSetting->school_id)->first();
        $is_registration_position = $reg_setting ? $reg_setting->position : null;
        $is_registration_permission = $reg_setting ? $reg_setting->registration_permission == 1 : false;
    }
?>

<div class="heading_mobile_menu_top">
    <ul>
        <li>
            <a href="<?php echo e(route('admin-dashboard')); ?>" class='text-primary'>
                <?php if(!auth()->check()): ?>
                    <?php echo app('translator')->get('common.login'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('edulia.dashboard'); ?>
                <?php endif; ?>
            </a>
        </li>
    </ul>
</div>
<ul>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($menu->childs) > 0): ?>
            <li class="has-submenu">
                <a href="#" data-submenu="pages_<?php echo e($menu->id); ?>">
                    <?php echo e($menu->title); ?>

                    <i class="ti-angle-right"></i>
                </a>
                <div id="pages_<?php echo e($menu->id); ?>" class="submenu">
                    <div class="submenu-header">
                        <a href="#" data-submenu-close="pages_<?php echo e($menu->id); ?>">
                            <i class='ti ti-angle-left'></i>
                            <?php echo e($menu->title); ?>

                        </a>
                    </div>
                    <ul>
                        <?php $__currentLoopData = $menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="has-submenu">
                                <a <?php if(count($sub_menu->childs) > 0): ?> data-submenu="Events_<?php echo e($sub_menu->id); ?>" <?php endif; ?> <?php echo e($sub_menu->is_newtab ? 'target="_blank"' : ''); ?>

                                    <?php if($sub_menu->type == 'dPages'): ?> 
                                        href="<?php echo e(route('view-page', $sub_menu->link)); ?>" 
                                    <?php endif; ?>
                                    <?php if($sub_menu->type == 'sPages'): ?> 
                                        <?php if($sub_menu->link == '/login'): ?>
                                            <?php if(!auth()->check()): ?>
                                                href="<?php echo e(url('/')); ?><?php echo e($sub_menu->link); ?>"
                                            <?php else: ?>
                                                href="<?php echo e(url('/')); ?><?php echo e($sub_menu->link); ?>" 
                                            <?php endif; ?>
                                        <?php else: ?>
                                            href="<?php echo e(url('/')); ?><?php echo e($sub_menu->link); ?>"
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($sub_menu->type == 'dCourse'): ?> href="<?php echo e(route('course-Details', $sub_menu->element_id)); ?>" <?php endif; ?>
                                    <?php if($sub_menu->type == 'dCourseCategory'): ?> href="<?php echo e(route('view-course-category', $sub_menu->element_id)); ?>" <?php endif; ?>
                                    <?php if($sub_menu->type == 'dNewsCategory'): ?> href="<?php echo e(route('view-news-category', $sub_menu->element_id)); ?>" <?php endif; ?>
                                    <?php if($sub_menu->type == 'dNews'): ?> href="<?php echo e(route('news-Details', $sub_menu->element_id)); ?>" <?php endif; ?>
                                    <?php if($sub_menu->type == 'customLink'): ?> href="<?php echo e($sub_menu->link); ?>" <?php endif; ?>
                                    >
                                    <?php if($sub_menu->link == '/login'): ?>
                                        <?php if(!auth()->check()): ?>
                                            <?php echo e($sub_menu->title); ?>

                                        <?php else: ?>
                                            <?php echo app('translator')->get('edulia.dashboard'); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo e($sub_menu->title); ?>

                                    <?php endif; ?> 
                                    <?php if(count($sub_menu->childs) > 0): ?>
                                        <i class='ti ti-angle-right'></i>
                                    <?php endif; ?>
                                </a>
                                <?php if(count($sub_menu->childs) > 0): ?>
                                    <div id="Events_<?php echo e($sub_menu->id); ?>" class="submenu">
                                        <div class="submenu-header">
                                            <a href="#" data-submenu-close="Events_<?php echo e($sub_menu->id); ?>"><i class='ti ti-angle-left'></i><?php echo e($sub_menu->title); ?></a>
                                        </div>
                                        <ul>
                                            <?php $__currentLoopData = $sub_menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child_sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a  <?php echo e($child_sub_menu->is_newtab ? 'target="_blank"' : ''); ?>

                                                        <?php if($child_sub_menu->type == 'dPages'): ?> 
                                                            href="<?php echo e(route('view-page', $child_sub_menu->link)); ?>" 
                                                        <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'sPages'): ?> 
                                                            <?php if($child_sub_menu->link == '/login'): ?>
                                                                <?php if(!auth()->check()): ?>
                                                                    href="<?php echo e(url('/')); ?><?php echo e($child_sub_menu->link); ?>"
                                                                <?php else: ?>
                                                                    href="<?php echo e(url('/')); ?><?php echo e($child_sub_menu->link); ?>" 
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                href="<?php echo e(url('/')); ?><?php echo e($child_sub_menu->link); ?>"
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'dCourse'): ?> href="<?php echo e(route('course-Details', $child_sub_menu->element_id)); ?>" <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'dCourseCategory'): ?> href="<?php echo e(route('view-course-category', $child_sub_menu->element_id)); ?>" <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'dNewsCategory'): ?> href="<?php echo e(route('view-news-category', $child_sub_menu->element_id)); ?>" <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'dNews'): ?> href="<?php echo e(route('news-Details', $child_sub_menu->element_id)); ?>" <?php endif; ?>
                                                        <?php if($child_sub_menu->type == 'customLink'): ?> href="<?php echo e($child_sub_menu->link); ?>" <?php endif; ?>
                                                        >
                                                        <?php if($child_sub_menu->link == '/login'): ?>
                                                            <?php if(!auth()->check()): ?>
                                                                <?php echo e($child_sub_menu->title); ?>

                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('edulia.dashboard'); ?>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo e($child_sub_menu->title); ?>

                                                        <?php endif; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </li>
        <?php else: ?>
            <li class='has-submenu'>
                <a <?php echo e($menu->is_newtab ? 'target="_blank"' : ''); ?>

                    <?php if($menu->type == 'dPages'): ?> href="<?php echo e(route('view-page', $menu->link)); ?>" <?php endif; ?>
                        <?php if($menu->type == 'sPages'): ?> <?php if($menu->link == '/login'): ?>
                            <?php if(!auth()->check()): ?>
                            href="<?php echo e(url('/')); ?><?php echo e($menu->link); ?>"
                            <?php else: ?>
                            href="<?php echo e(url('/admin-dashboard')); ?>" <?php endif; ?>
                    <?php else: ?>
                        href="<?php echo e(url('/')); ?><?php echo e($menu->link); ?>"
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if($menu->type == 'dCourse'): ?> href="<?php echo e(route('course-Details', $menu->element_id)); ?>" <?php endif; ?>
                        <?php if($menu->type == 'dCourseCategory'): ?> href="<?php echo e(route('view-course-category', $menu->element_id)); ?>" <?php endif; ?>
                        <?php if($menu->type == 'dNewsCategory'): ?> href="<?php echo e(route('view-news-category', $menu->element_id)); ?>" <?php endif; ?>
                        <?php if($menu->type == 'dNews'): ?> href="<?php echo e(route('news-Details', $menu->element_id)); ?>" <?php endif; ?>
                        <?php if($menu->type == 'customLink'): ?> href="<?php echo e($menu->link); ?>" <?php endif; ?>
                    >
                    <?php if($menu->link == '/login'): ?>
                        <?php if(!auth()->check()): ?>
                            <?php echo e($menu->title); ?>

                        <?php else: ?>
                            <?php echo app('translator')->get('edulia.dashboard'); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo e($menu->title); ?>

                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(moduleStatusCheck('ParentRegistration') && $is_registration_permission && $is_registration_permission == 1): ?>
        <li class='has-submenu'>
            <a href="<?php echo e(route('parentregistration/registration', $reg_setting->url)); ?>"> <?php echo e(__('edulia.student_registration')); ?> </a>
        </li>
    <?php endif; ?> 
</ul><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/header-content-mobile-menu.blade.php ENDPATH**/ ?>
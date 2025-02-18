<nav class="heading_main_menu">
    <ul>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($menu->childs) > 0): ?>
                <li class="heading_main_menu_list">
                    <a href="index.php" class="heading_main_menu_list_link">
                        <?php echo e($menu->title); ?>

                    </a>
                    <ul class="heading_main_menu_list_dropdown">
                        <?php $__currentLoopData = $menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e($sub_menu->show == 1 ? 'menu_list_left' : ''); ?>">
                                <a <?php echo e($sub_menu->is_newtab ? 'target="_blank"' : ''); ?>

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

                                        <?php if(count($sub_menu->childs) > 0): ?>
                                            <i class="fa fa-caret-right"></i>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    
                                </a>
                                
                                <?php if(count($sub_menu->childs) > 0): ?>
                                    <ul>
                                        <?php $__currentLoopData = $sub_menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child_sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a <?php echo e($child_sub_menu->is_newtab ? 'target="_blank"' : ''); ?>

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
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php else: ?>
                <li class="heading_main_menu_list">
                    <a class="heading_main_menu_list_link" <?php echo e($menu->is_newtab ? 'target="_blank"' : ''); ?>

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
    </ul>
</nav><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/header-content-menu.blade.php ENDPATH**/ ?>
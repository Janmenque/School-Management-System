<h4><?php echo e(__('menumanage::menuManage.Live Preview')); ?></h4>
<div class="mt_30">

    <nav class="preview_menu_wrapper">
        <ul id="previewMenu">

            <?php if(isset($sidebar_menus)): ?>
                <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preview_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($preview_section->subModule->count() > 0): ?>
                        <li class="preview_section">
                            <?php echo e(__(@$preview_section->permissionInfo->lang_name)); ?>

                        </li>
                        <?php $__currentLoopData = @$preview_section->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(sidebarPermission($item->permissionInfo)==true): ?>
                                <li class="">
                                    <a href="#" class="<?php if($item->subModule->count()): ?> has-arrow <?php endif; ?>">
                                        <div class="nav_icon_small">
                                            <span class="<?php echo e($item->permissionInfo->icon ?? 'fas fa-th'); ?>"></span>
                                        </div>
                                        <div class="nav_title">
                                            <span><?php echo e($item->permissionInfo ? __($item->permissionInfo->lang_name) : 'no'); ?></span>
                                        </div>
                                    </a>
                                    <?php if($item->subModule->count()): ?>
                                        <ul>
                                            <?php $__currentLoopData = $item->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(sidebarPermission($submenu->permissionInfo)==true): ?>
                                                    <li>
                                                        <a href="#">
                                                            <?php echo e($submenu->permissionInfo ? __($submenu->permissionInfo->lang_name) :'no sub'); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </nav>

</div>
<?php /**PATH C:\xampp\htdocs\immersion\Modules/MenuManage\Resources/views/components/live_preview.blade.php ENDPATH**/ ?>
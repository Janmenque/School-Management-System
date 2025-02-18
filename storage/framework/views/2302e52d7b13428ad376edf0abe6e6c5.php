<h4><?php echo e(__('common.Menu List')); ?></h4>
<div class="">
    <?php $__env->startPush('css'); ?>
        <link href="<?php echo e(asset('Modules/MenuManage/Resources/assets/css/jquery.nestable.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('Modules/MenuManage/Resources/assets/css/sidebar.css')); ?>" rel="stylesheet">
    <?php $__env->stopPush(); ?>


    <div class="row">
        <div class="col-xl-12 menu_item_div" id="itemDiv">
            <?php if(isset($sidebar_menus)): ?>
            
                <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                        <div class="closed_section" data-id="<?php echo e($sidebar_menu->id); ?>"
                            data-parent_section="<?php echo e($sidebar_menu->permission_id); ?>">
                            <div id="accordion" class="dd">
                                <div class="section_nav">
                                    <h5><?php echo e($sidebar_menu->permissionInfo->name); ?></h5>
                                    <div class="setting_icons">
                                        <span class="edit-btn">
                                            <a class=" btn-modal" data-container="#commonModal" type="button"
                                                href="<?php echo e(route('sidebar-manager.section-edit-form', $sidebar_menu->permission_id)); ?>">
                                                <i class="ti-pencil-alt"></i>
                                            </a>

                                        </span>
                                        <i class="ti-close delete_section" data-id="<?php echo e($sidebar_menu->id); ?>"></i>
                                        <i class="ti-angle-up toggle_up_down"></i>
                                    </div>
                                </div>
                            </div>
                            <?php if($sidebar_menu->subModule->count()): ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="accordion" class="dd menu-list used_menu" 
                                                    data-section="<?php echo e($sidebar_menu->permission_id); ?>">
                                                    <ol class="dd-list">
                                                        <?php $__currentLoopData = $sidebar_menu->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(sidebarPermission($menu->permissionInfo)==true): ?>
                                                            <li class="dd-item" data-id="<?php echo e($menu->id); ?>" 
                                                                data-section_id="<?php echo e($menu->parent); ?>"
                                                                data-parent_route="<?php echo e($menu->parent); ?>"
                                                                data-parent="<?php echo e($menu->parent); ?>"
                                                                >
                                                                <div class="card accordion_card"
                                                                    id="accordion_<?php echo e($menu->id); ?>">
                                                                    <div class="card-header item_header"
                                                                        id="heading_<?php echo e($menu->id); ?>">
                                                                        <div class="dd-handle">
                                                                            <div class="float-left">
                                                                                <?php echo e($menu->permissionInfo->name); ?> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="float-right btn_div">
                                                                            <div class="edit_icon">
                                                                                

                                                                                <i class="ti-close remove_menu"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <ol class="dd-list">
                                                                    
                                                                    <?php $__currentLoopData = $menu->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(sidebarPermission($submenu->permissionInfo)==true): ?>
                                                                        <li class="dd-item" data-id="<?php echo e($submenu->id); ?>"
                                                                        
                                                                            >
                                                                            <div class="card accordion_card"
                                                                                id="accordion_<?php echo e($submenu->id); ?>">
                                                                                <div class="card-header item_header"
                                                                                    id="heading_<?php echo e($submenu->id); ?>">
                                                                                    <div class="dd-handle">
                                                                                        <div class="float-left">
                                                                                            <?php echo e($submenu->permissionInfo->name); ?>

                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                <div class="float-right btn_div">
                                                                                    <div class="edit_icon">
                                                                                        

                                                                                        <i class="ti-close remove_menu"></i>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ol>
                                                            </li>  
                                                            <?php endif; ?>                                                     
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="accordion2" class="dd menu-list used_menu"
                                                    data-section="<?php echo e($sidebar_menu->permission_id); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('public/backEnd/js/jquery.nestable.min.js')); ?>"></script>
        <script src="<?php echo e(asset('Modules/MenuManage/Resources/assets/js/sidebar.js')); ?>"></script>
    <?php $__env->stopPush(); ?>


</div>
<?php /**PATH C:\xampp\htdocs\immersion\Modules/MenuManage\Resources/views/components/components.blade.php ENDPATH**/ ?>
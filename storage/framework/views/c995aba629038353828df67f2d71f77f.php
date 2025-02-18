<h4><?php echo e(__('common.Available menu items')); ?></h4>
<div class="">
    <div class="row">
        <div class="col-xl-12">
            <!-- menu_setup_wrap  -->
            <div class="dd available_list  menu_item_div menu-list" data-section="1">
                <div class="  available-items-container unused_menu" data-id="remove" data-section_id="remove" data-type="un_used"
                    id="available_list">
                    <?php
                        $hasIds = [];
                    ?>
                    <?php if(isset($unused_menus)): ?>
                        <?php if($unused_menus->count()): ?>                            
                            <?php $__currentLoopData = $unused_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="<?php echo e($menu->id); ?>"
                                            data-section_id="<?php echo e($menu->parent); ?>"
                                            data-permission_id="<?php echo e($menu->permission_id); ?>"
                                            data-parent_route="<?php echo e($menu->parent); ?>">
                                            <div class="card accordion_card" id="accordion_<?php echo e($menu->id); ?>">
                                                <div class="card-header item_header" id="heading_<?php echo e($menu->id); ?>">
                                                    <div class="dd-handle">
                                                        <div class="float-left">
                                                            <?php echo e(__($menu->permissionInfo->lang_name)); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <ol class="dd-list">   
                                                <?php if($menu->count() > 0): ?>                                            
                                                    <?php $__currentLoopData = $menu->deActiveChild; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                
                                                            ?>
                                                            <li class="dd-item" data-id="<?php echo e($submenu->id); ?>">
                                                                <div class="card accordion_card"
                                                                    id="accordion_<?php echo e($submenu->id); ?>">
                                                                    <div class="card-header item_header"
                                                                        id="heading_<?php echo e($submenu->id); ?>">
                                                                        <div class="dd-handle">
                                                                            <div class="float-left">
                                                                                <?php echo e(__($submenu->permissionInfo->lang_name)); ?>

                                                                               
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </ol>
                                        </li>
                                    </ol>                      
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <ol class="dd-list">
                            </ol>

                        <?php endif; ?>
                    <?php endif; ?>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\immersion\Modules/MenuManage\Resources/views/components/available_list.blade.php ENDPATH**/ ?>
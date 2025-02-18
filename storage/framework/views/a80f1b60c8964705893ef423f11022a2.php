<?php
    $school_config = schoolConfig();
    $isSchoolAdmin = Session::get('isSchoolAdmin');
?>
<!-- sidebar part here -->
<nav id="sidebar" class="sidebar">

    <div class="sidebar-header update_sidebar">
        <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 && Auth::user()->role_id != App\GlobalVariable::isAlumni()): ?>
            <?php if(userPermission('dashboard')): ?>
                <?php if(moduleStatusCheck('Saas') == true &&
                        Auth::user()->is_administrator == 'yes' &&
                        Session::get('isSchoolAdmin') == false &&
                        Auth::user()->role_id == 1): ?>
                    <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="superadmin-dashboard">
                    <?php else: ?>
                        <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
            <?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
        <?php endif; ?>
        <?php if(!is_null($school_config->logo)): ?>
            <img src="<?php echo e(asset($school_config->logo)); ?>" alt="logo">
        <?php else: ?>
            <img src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo">
        <?php endif; ?>
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>

    </div>
    <?php if(Auth::user()->is_saas == 0): ?>
        <ul class="sidebar_menu list-unstyled" id="sidebar_menu">
            <?php if(moduleStatusCheck('Saas') == true &&
                    Auth::user()->is_administrator == 'yes' &&
                    Session::get('isSchoolAdmin') == false &&
                    Auth::user()->role_id == 1): ?>
                <?php echo $__env->make('saas::menu.Saas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php if(auth()->user()->role_id != 3 && auth()->user()->role_id != App\GlobalVariable::isAlumni()): ?>
                    <?php if(isset($sidebar_menus)): ?>
                    
                        <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php if($sidebar_menu->subModule->count() > 0 && sidebarPermission($sidebar_menu->permissionInfo)==true): ?>
                                <?php if($sidebar_menu->permissionInfo->name): ?>
                                    <span class="menu_seperator" id="seperator_<?php echo e($sidebar_menu->permissionInfo->route); ?>" data-section="<?php echo e($sidebar_menu->permissionInfo->route); ?>"><?php echo e($sidebar_menu->permissionInfo->name); ?> </span>
                                <?php endif; ?>
                            
                                <?php $__currentLoopData = $sidebar_menu->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(sidebarPermission($item->permissionInfo)==true): ?>
                                        <li class="<?php echo e(spn_active_link(subModuleRoute($item), 'mm-active')); ?> <?php echo e($sidebar_menu->permissionInfo->route); ?>">

                                            <?php if($item->subModule->count() > 0 && $item->permissionInfo->route != 'dashboard'): ?>
                                                <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                                                <?php else: ?>
                                                    <a href="<?php echo e(validRouteUrl($item->permissionInfo->route)); ?>">
                                            <?php endif; ?>
                                            <div class="nav_icon_small">
                                                <span class="<?php echo e($item->permissionInfo->icon); ?>"></span>
                                            </div>
                                            <div class="nav_title">
                                                <span><?php echo e(__($item->permissionInfo->lang_name)); ?> 
                                                </span>
                                                <?php if(config('app.app_sync') && $item->permissionInfo->module && in_array($item->permissionInfo->module, $paid_modules)): ?>
                                                    <span class="demo_addons">Addon</span>
                                                <?php endif; ?>
                                            </div>
                                            </a>
                                            <ul class="mm-collapse">
                                                <?php if(@$item->subModule): ?>
                                                    <?php $__currentLoopData = @$item->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(sidebarPermission($sub->permissionInfo)==true): ?>
                                                        <li>
                                                            <?php if(count($sub->subModule) > 0): ?>
                                                                <a href="javascript:void(0)" class="has-arrow "
                                                                    aria-expanded="false">
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(validRouteUrl($sub->permissionInfo->route)); ?>"
                                                                        class="<?php echo e(spn_active_link(subModuleRoute($sub), 'active')); ?>">
                                                            <?php endif; ?>
                                                            <?php echo e(__($sub->permissionInfo->lang_name)); ?> </a>
                                                            <?php if($sub->subModule): ?>
                                                                <ul class="list-unstyled" id="<?php echo e($key); ?>">
                                                                    <?php $__currentLoopData = $sub->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(sidebarPermission($child)==true): ?>
                                                                            <li>
                                                                                <a  class="has-arrow" aria-expanded="false"
                                                                                    href="<?php echo e(validRouteUrl($child->permissionInfo->route)); ?>">
                                                                                    <?php echo e(__($child->permissionInfo->lang_name)); ?> 
                                                                                </a>
                                                                                <ul class="list-unstyled">
                                                                                    <li>Third level</li>
                                                                                </ul>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->user()->role_id == App\GlobalVariable::isAlumni()): ?>
                    <?php if(isset($sidebar_menus)): ?>                                    
                        <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(sidebarPermission($sidebar_menu->permissionInfo)==true): ?>
                                <?php if($sidebar_menu->permissionInfo->lang_name): ?>
                                    <span class="menu_seperator"><?php echo e(__($sidebar_menu->permissionInfo->lang_name)); ?></span>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $sidebar_menu->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(sidebarPermission($item->permissionInfo)==true): ?>
                                            <li class="<?php echo e(spn_active_link(subModuleRoute($item), 'mm-active')); ?>">
                                                
                                                <?php if(
                                                    ($item->subModule->count() > 0 && $item->permissionInfo->route != 'dashboard') ||
                                                        $item->permissionInfo->relate_to_child == 1): ?>
                                                    <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                                                    <?php else: ?>
                                                        <a href="<?php echo e(validRouteUrl($item->permissionInfo->route)); ?>">
                                                <?php endif; ?>
                                                <div class="nav_icon_small">
                                                    <span class="<?php echo e($item->permissionInfo->icon); ?>"></span>
                                                </div>
                                                <div class="nav_title">
                                                        <span><?php echo e(__($item->permissionInfo->lang_name)); ?></span>
                                                        <?php if(config('app.app_sync') && $item->permissionInfo->module && in_array($item->permissionInfo->module, $paid_modules)): ?>
                                                        <?php if(config('app.app_sync')): ?>
                                                            <span class="demo_addons">Addon</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                </a>
                                                <ul class="mm-collapse">
                                                    <?php if(@$item->subModule): ?>
                                                        <?php $__currentLoopData = @$item->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($sub->permissionInfo->relate_to_child == 1 && $item->permissionInfo->is_parent == 1 && sidebarPermission($sub->permissionInfo)): ?>
                                                                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      
                                                                <?php if(! in_array($item->permissionInfo->module , ["fees_collection", "Fees"]) && (hasDueFees($children->id) )): ?> <?php continue; ?>  <?php endif; ?> 
                                                                   
                                                                        <li>
                                                                            <a href="<?php echo e(validRouteUrl($sub->permissionInfo->route, $children->id)); ?>"
                                                                                class="<?php echo e(spn_active_link(subModuleRoute($sub), 'active')); ?>">

                                                                                <?php echo e(__($sub->permissionInfo->lang_name)); ?> - <?php echo e($children->full_name); ?>

                                                                            </a>
                                                                        </li>
                                                                            
                                                                       
                                                                        
                                                                    
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <?php if(sidebarPermission($sub->permissionInfo)): ?>
                                                                <li>
                                                                    <a href="<?php echo e(validRouteUrl($sub->permissionInfo->route)); ?>"
                                                                        class="<?php echo e(spn_active_link(subModuleRoute($sub), 'active')); ?>">

                                                                        <?php echo e(__($sub->permissionInfo->lang_name)); ?> 
                                                                    </a>

                                                                </li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <?php if(
                                                        $item->permissionInfo->relate_to_child == 1 &&
                                                            $item->permissionInfo->is_parent == 1 &&
                                                            count($item->subModule) == 0 && sidebarPermission($item->permissionInfo)): ?>
                                                        <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                            <?php if(! in_array($item->permissionInfo->module , ["fees_collection", "Fees"]) && (hasDueFees($children->id) )): ?> <?php continue; ?>  <?php endif; ?> 
                                                                
                                                                    <li>
                                                                        <a href="<?php echo e(validRouteUrl($item->permissionInfo->route, $children->id)); ?>"
                                                                            class="<?php echo e(spn_active_link(subModuleRoute($item), 'active')); ?>">

                                                                            <?php echo e(__($item->permissionInfo->lang_name)); ?> -
                                                                            <?php echo e($children->full_name); ?></a>

                                                                    </li>
                                                        
                                                               
                                                           
                                                             

                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>

                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->user()->role_id == 3): ?>
                    <?php if(isset($sidebar_menus)): ?>                                    
                        <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(sidebarPermission($sidebar_menu->permissionInfo)==true): ?>
                                    <?php if($sidebar_menu->permissionInfo->lang_name): ?>
                                    <span class="menu_seperator"><?php echo e(__($sidebar_menu->permissionInfo->lang_name)); ?></span>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $sidebar_menu->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(sidebarPermission($item->permissionInfo)==true): ?>
                                            <li class="<?php echo e(spn_active_link(subModuleRoute($item), 'mm-active')); ?>">
                                                
                                                <?php if(
                                                    ($item->subModule->count() > 0 && $item->permissionInfo->route != 'dashboard') ||
                                                        $item->permissionInfo->relate_to_child == 1): ?>
                                                    <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                                                    <?php else: ?>
                                                        <a href="<?php echo e(validRouteUrl($item->permissionInfo->route)); ?>">
                                                <?php endif; ?>
                                                <div class="nav_icon_small">
                                                    <span class="<?php echo e($item->permissionInfo->icon); ?>"></span>
                                                </div>
                                                <div class="nav_title">
                                                        <span><?php echo e(__($item->permissionInfo->lang_name)); ?></span>
                                                        <?php if(config('app.app_sync') && $item->permissionInfo->module && in_array($item->permissionInfo->module, $paid_modules)): ?>
                                                        <?php if(config('app.app_sync')): ?>
                                                            <span class="demo_addons">Addon</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                </a>
                                                <ul class="mm-collapse">
                                                    <?php if(@$item->subModule): ?>
                                                        <?php $__currentLoopData = @$item->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($sub->permissionInfo->relate_to_child == 1 && $item->permissionInfo->is_parent == 1 && sidebarPermission($sub->permissionInfo)): ?>
                                                                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      
                                                                <?php if(! in_array($item->permissionInfo->module , ["fees_collection", "Fees"]) && (hasDueFees($children->id) )): ?> <?php continue; ?>  <?php endif; ?> 
                                                                   
                                                                        <li>
                                                                            <a href="<?php echo e(validRouteUrl($sub->permissionInfo->route, $children->id)); ?>"
                                                                                class="<?php echo e(spn_active_link(subModuleRoute($sub), 'active')); ?>">

                                                                                <?php echo e(__($sub->permissionInfo->lang_name)); ?> - <?php echo e($children->full_name); ?>

                                                                            </a>
                                                                        </li>
                                                                            
                                                                       
                                                                        
                                                                    
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <?php if(sidebarPermission($sub->permissionInfo)): ?>
                                                                <li>
                                                                    <a href="<?php echo e(validRouteUrl($sub->permissionInfo->route)); ?>"
                                                                        class="<?php echo e(spn_active_link(subModuleRoute($sub), 'active')); ?>">

                                                                        <?php echo e(__($sub->permissionInfo->lang_name)); ?> 
                                                                    </a>

                                                                </li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <?php if(
                                                        $item->permissionInfo->relate_to_child == 1 &&
                                                            $item->permissionInfo->is_parent == 1 &&
                                                            count($item->subModule) == 0 && sidebarPermission($item->permissionInfo)): ?>
                                                        <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                            <?php if(! in_array($item->permissionInfo->module , ["fees_collection", "Fees"]) && (hasDueFees($children->id) )): ?> <?php continue; ?>  <?php endif; ?> 
                                                                
                                                                    <li>
                                                                        <a href="<?php echo e(validRouteUrl($item->permissionInfo->route, $children->id)); ?>"
                                                                            class="<?php echo e(spn_active_link(subModuleRoute($item), 'active')); ?>">

                                                                            <?php echo e(__($item->permissionInfo->lang_name)); ?> -
                                                                            <?php echo e($children->full_name); ?></a>

                                                                    </li>
                                                        
                                                               
                                                           
                                                             

                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>

                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</nav>
<!-- sidebar part end -->
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function(){
            var sections=[];
            $('.menu_seperator').each(function() { sections.push($(this).data('section')); });
          
            jQuery.each(sections, function(index, section) {             
                if($('.'+section).length == 0) {
                    $('#seperator_'+section).addClass('d-none');
                }else{
                    $('#seperator_'+section).removeClass('d-none');
                }
            });           
        })

    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/sidebar-component.blade.php ENDPATH**/ ?>
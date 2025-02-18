<?php
    setCurrentPageId($page->id);
?>
<?php if(!empty($page->settings['grids'])): ?>
    <?php $__currentLoopData = $page->settings['grids']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $columns = getColumnInfo($grid['grid']); ?>
        <?php
            setGridId($grid['grid_id']);
            $css = getCss();
            if(!empty(getBgOverlay()))
                $css = 'position:relative;'.$css;
                $x_components = ['header-breadcumb','home-slider','counter','event','news-area','event-gallery'];
                $container = [];
                $non_container = [];
                foreach ($grid['data'] as $key => $components) {
                    foreach($components as $component){
                        if(in_array($component['section_id'], $x_components)){
                            $non_container = $grid['data'];
                        }else{
                            $container =  $grid['data'];
                        }
                    }
                }
        ?>
        <section class="pb-themesection <?php echo e(getClasses()); ?>" <?php echo getCustomAttributes(); ?> <?php echo !empty($css)? 'style="' .$css.'"':''; ?>>
            <?php echo getBgOverlay(); ?>

            <?php if(!empty($container)): ?>
                <div <?php echo getContainerStyles(); ?>>
                    <div class="row">
                        <?php $__currentLoopData = $container; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $components): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e($columns[$column]); ?>">
                                <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php setSectionId($component['id']); ?>
                                    <?php if(view()->exists('themes.'.activeTheme().'.pagebuilder.' . $component['section_id'] . '.view')): ?>
                                        <?php echo view('themes.'.activeTheme().'.pagebuilder.'. $component['section_id']. '.view')->render(); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($non_container)): ?>
                <?php $__currentLoopData = $non_container; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $components): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="<?php echo e($columns[$column]); ?>">
                        <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php setSectionId($component['id']); ?>
                            <?php if(view()->exists('themes.'.activeTheme().'.pagebuilder.' . $component['section_id'] . '.view')): ?>
                                <?php echo view('themes.'.activeTheme().'.pagebuilder.'. $component['section_id']. '.view')->render(); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\immersion\packages\larabuild\pagebuilder\src/../resources/views/components/header-footer-page-components.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('style.color_theme'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
@media(max-width: 576px){

    table.dataTable > tbody > tr.child ul.dtr-details > li{
        flex-direction: column;
    }

    table.dataTable > tbody > tr.child ul.dtr-details .dtr-title{
        padding: 10px 0!important;
        padding-bottom: 0!important;
    }
    table.dataTable > tbody > tr.child ul.dtr-details > li span{
        width: 100%!important
    }

    table.dataTable > tbody > tr.child ul.dtr-details > li .bg-color{
        width: 10px!important;
        height: 10px;
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .bg-color {
            width: 20px;
            height: 20px;
            text-align: center;
            padding: 0px;
            margin: 0 12px;
        }

        .color_theme_list {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .color_theme_list > span:first-child{
            max-width: 60%;
            flex: 0 0 100%;
        }

        .color_theme_list .color_preview {
            flex-basis: 40%;
            display: inline-flex;
            justify-content: flex-start;
            align-items: flex-start;
            white-space: nowrap;
            align-items: center;
            justify-content: start;
        }
    </style>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('style.color_theme'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('style.style'); ?></a>
                    <a href="#"><?php echo app('translator')->get('style.color_theme'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <?php if(userPermission('theme-create')): ?>
                                    <a class="primary-btn-small-input primary-btn small fix-gr-bg mb-2"
                                        href="<?php echo e(route('theme-create')); ?>"><i
                                            class="ti-plus"></i><?php echo e(__('style.Add New Theme')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('common.title'); ?></th>
                                                <th><?php echo app('translator')->get('common.type'); ?></th>
                                                <th><?php echo app('translator')->get('style.colors'); ?></th>
                                                <th><?php echo app('translator')->get('style.Background'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo e(__('common.action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php @$count=1; ?>
                                            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->index +1); ?></td>
                                                    <td><?php echo e($theme->title); ?></td>
                                                    <td><?php echo e(__('style.' . $theme->color_mode)); ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <?php $__currentLoopData = $theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-12">
                                                                    <div class="color_theme_list">
                                                                        <span><?php echo e(__('style.' . $color->name)); ?> </span>
    
    
                                                                        <span class="color_preview">: <span class="bg-color"
                                                                                style="background: <?php echo e(@$color->pivot->value); ?>"></span><?php echo e(@$color->pivot->value); ?></span>
                                                                    </div>
                                                                </div>
                                                                
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
    
                                                    </td>
                                                    <td>
                                                        <?php if(@$theme->background_type == 'image'): ?>
                                                            <div class="bg_img_previw"
                                                                style="background-image : url(<?php echo e(asset($theme->background_image)); ?>)">
    
                                                            </div>
                                                        <?php else: ?>
                                                            <div
                                                                style="width: 100px; height: 50px; background-color:<?php echo e(@$theme->background_color); ?> ">
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if(@$theme->is_default == 1): ?>
                                                            <span class="primary-btn small fix-gr-bg "> <?php echo app('translator')->get('common.active'); ?> </span>
                                                        <?php else: ?>
                                                            <?php if(userPermission("themes.default")): ?>
                                                                <?php if(env('APP_SYNC')): ?>
                                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                                        title="Disabled For Demo ">
                                                                        <a class="primary-btn small tr-bg text-nowrap" href="#">
                                                                            <?php echo app('translator')->get('style.Make Default'); ?></a>
                                                                    </span>
                                                                <?php else: ?>
                                                                    <a class="primary-btn small tr-bg text-nowrap"
                                                                        href="<?php echo e(route('themes.default', @$theme->id)); ?>">
                                                                        <?php echo app('translator')->get('style.Make Default'); ?> </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
    
                                                        <div class="dropdown CRM_dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"> <?php echo e(__('common.select')); ?>

                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dropdownMenu2">
                                                                <?php if(!$theme->is_system): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('themes.edit', $theme->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                <?php endif; ?>
    
    
                                                                <a class="dropdown-item" type="button"
                                                                    href="<?php echo e(route('themes.copy', $theme->id)); ?>"><?php echo app('translator')->get('style.Clone Theme'); ?></a>
    
                                                                <?php if(!$theme->is_default && !$theme->is_system && userPermission('themes.destroy')): ?>
                                                                    <a class="dropdown-item" type="button" data-toggle="modal"
                                                                        data-target="#deletebackground_settingModal<?php echo e(@$theme->id); ?>"
                                                                        href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                                <?php endif; ?>
    
                                                            </div>
                                                        </div>
    
                                                    </td>
    
                                                    <div class="modal fade admin-query"
                                                        id="deletebackground_settingModal<?php echo e(@$theme->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal"> <i
                                                                            class="ti-close"></i>
                                                                    </button>
                                                                </div>
    
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h4><?php echo app('translator')->get('style.Are you sure to delete ?'); ?></h4>
                                                                    </div>
    
                                                                    <div class="mt-40 d-flex justify-content-between">
                                                                        <button type="button" class="primary-btn tr-bg"
                                                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                                                                        </button>
    
                                                                        <?php echo Form::open(['route' => ['themes.destroy', $theme->id], 'method' => 'delete']); ?>

                                                                        <button type="submit"
                                                                            class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                        <?php echo Form::close(); ?>

    
    
                                                                    </div>
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                        </tbody>
                                    </table>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/style/color_theme.blade.php ENDPATH**/ ?>
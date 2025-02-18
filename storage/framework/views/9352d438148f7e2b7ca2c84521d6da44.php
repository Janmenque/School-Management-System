
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.base_setup'); ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('system_settings.base_setup'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.base_setup'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($base_setup)): ?>
            <?php if(userPermission('base_setup_store')): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('base_setup')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($base_setup)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'base_setup_update',
                        'method' => 'POST'])); ?>

                        <?php else: ?>
                            <?php if(userPermission('base_setup_store')): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'base_setup_store',
                            'method' => 'POST'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($base_setup)): ?>
                                        <?php echo app('translator')->get('system_settings.edit_base_setup'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('system_settings.add_base_setup'); ?>
    
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.base_group'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('base_group') ? ' is-invalid' : ''); ?>"
                                            name="base_group">
                                            <option data-display="<?php echo app('translator')->get('system_settings.base_group'); ?> *" value=""><?php echo app('translator')->get('system_settings.base_group'); ?>*</option>
                                            <?php $__currentLoopData = $base_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $base_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($base_setup)): ?>
                                            <option value="<?php echo e(@$base_group->id); ?>"
                                                <?php echo e(@$base_group->id == @$base_setup->base_group_id? 'selected': ''); ?>><?php echo e(@$base_group->name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e(@$base_group->id); ?>"><?php echo e(@$base_group->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('base_group')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('base_group')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" value="<?php echo e(isset($base_setup)? @$base_setup->base_setup_name: ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($base_setup)? @$base_setup->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                  $tooltip = "";
                                  if(userPermission('base_setup_store')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($base_setup)): ?>
                                                <?php echo app('translator')->get('system_settings.update_base_setup'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('system_settings.save_base_setup'); ?>
                                            <?php endif; ?>
                                           
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('system_settings.base_setup_list'); ?></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="row base-setup">
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
                                            <th width="33%"><?php echo app('translator')->get('system_settings.base_type'); ?></th>
                                            <th width="33%"><?php echo app('translator')->get('common.label'); ?></th>
                                            <th width="33%"><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
        
                                        <tr>
                                            <td colspan="3" class="pr-0">
                                                <div id="accordion" role="tablist">
                                                    <?php $i = 0; ?>
                                                    <?php $__currentLoopData = $base_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $base_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                                                    <div class="card mr-4">
                                                        <div class="card-header d-flex justify-content-between" role="tab" id="headingOne<?php echo e(@$base_group->id); ?>">
                                                            <div class="row w-100 align-items-center">
                                                                <div class="col-lg-6">
                                                                    <a data-toggle="collapse" href="#collapseOne<?php echo e(@$base_group->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e(@$base_group->id); ?>">
                                                                    <?php echo e($base_group->name); ?>

                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-6 text-right">
                                                                    <a class="primary-btn icon-only tr-bg" data-toggle="collapse" href="#collapseOne<?php echo e(@$base_group->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                                                                        <span class="ti-arrow-down"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        @$base_setups = @$base_group->baseSetups;
                                                        ?>
                                                        <div id="collapseOne<?php echo e(@$base_group->id); ?>" class="collapse <?php echo e($i++ == 0? 'show':''); ?>" role="tabpanel" aria-labelledby="headingOne<?php echo e(@$base_group->id); ?>" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <?php $__currentLoopData = $base_setups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $base_setup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row py-3 border-bottom align-items-center">
                                                                    <div class="offset-lg-4 col-lg-4"><?php echo e(@$base_setup->base_setup_name); ?></div>
                                                                    <div class="col-lg-4">
                                                                        <div class="dropdown CRM_dropdown">
                                                                            <button type="button" class="btn dropdown-toggle"
                                                                                data-toggle="dropdown">
                                                                                <?php echo app('translator')->get('common.select'); ?>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <?php if(userPermission('base_setup_edit')): ?>
                                                                                    <a class="dropdown-item" href="<?php echo e(route('base_setup_edit', [@$base_setup->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                                <?php endif; ?>
                                                                                <?php if(userPermission('base_setup_delete')): ?>
                                                                                    <a class="dropdown-item deleteBaseSetupModal" href="#" data-toggle="modal" data-target="#deleteBaseSetupModal" data-id="<?php echo e(@$base_setup->id); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                </div>
                                            </td>
                                            <td class="d-none p-0"></td>
                                            <td class="d-none p-0"></td>
                                        </tr>
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


<div class="modal fade admin-query" id="deleteBaseSetupModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('system_settings.delete_base_setup'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                     <?php echo e(Form::open(['route' => 'base_setup_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                     <input type="hidden" name="id" value="" id="base_setup_id">
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                     <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/baseSetup/base_setup.blade.php ENDPATH**/ ?>
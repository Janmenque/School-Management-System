
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.language'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    @media (max-width: 767px){
    .dataTables_filter label{
        top: -25px!important;
        width: 100%;
    }
}

@media screen and (max-width: 640px) {
    div.dt-buttons {
        display: none;
    }

    .dataTables_filter label{
        top: -60px!important;
        width: 100%;
        float: right;
    }
    .main-title{
        margin-bottom: 40px
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.language'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.language'); ?></a>

                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
           
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'language_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <input type="hidden" name="id" value="<?php echo e(isset($editData)? @$editData->id: ''); ?>">
                            <?php else: ?>
                                <?php if(userPermission('language_store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'language_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('system_settings.edit_language'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('system_settings.add_language'); ?>
                                        <?php endif; ?>
                                        
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row"> 
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                                <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->name: ''); ?>" maxlength="25" >                                            
                                                
                                                
                                                <?php if($errors->has('name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-15"> 
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.code'); ?> <span class="text-danger"> *</span></label>
                                                <input class="primary_input_field form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" type="text" name="code" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->code: ''); ?>" maxlength="191" >                                            
                                               
                                                
                                                <?php if($errors->has('code')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('code')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-15"> 
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.native'); ?> <span class="text-danger"> *</span></label>
                                                <input class="primary_input_field form-control<?php echo e($errors->has('native') ? ' is-invalid' : ''); ?>" type="text" name="native" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->native: ''); ?>" maxlength="191" >                                            
                                               
                                                
                                                <?php if($errors->has('native')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('native')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-15"> 
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.text_alignment'); ?> <span class="text-danger"> *</span></label>
                                                <select class="primary_select form-control <?php echo e($errors->has('rtl') ? ' is-invalid' : ''); ?>" id="rtl" name="rtl">
                                                    <option value="0" <?php if(isset($editData) && $editData->rtl == 0 ): ?> selected <?php endif; ?>>LTL</option>
                                                    <option value="1">RTL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
 
                                    <?php 
                                        $tooltip = "";
                                        if(userPermission('language_store') || userPermission('language_edit')){
                                                $tooltip = "";
                                            }else{
                                                $tooltip = "You have no permission to add";
                                            }
                                    ?>
                                    <div class="row mt-15">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('system_settings.update_language'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('system_settings.save_language'); ?>
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
                                    <h3 class="mb-15"><?php echo app('translator')->get('system_settings.language_list'); ?></h3>
                                </div>
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
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.code'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.native'); ?></th> 
                                            <th><?php echo app('translator')->get('system_settings.text_alignment'); ?></th> 
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                        </thead>
    
                                        <tbody>
                                        <?php $i=1;  ?>
    
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?>

                                                <td><?php echo e(@$value->name); ?></td>
                                                <td><?php echo e(@$value->code); ?></td>
                                                <td><?php echo e(@$value->native); ?></td>
                                                <td>
                                                    <?php if($value->rtl == 1): ?> 
                                                    RTL
                                                    <?php else: ?> 
                                                    LTL  
                                                    <?php endif; ?> 
                                                </td> 
                                                <td>
    
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                        <?php if(userPermission('language_edit')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('language_edit', [@$value->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('language_delete')): ?>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteCurrency<?php echo e(@$value->id); ?>"  href="<?php echo e(route('currency_delete', [@$value->id])); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                        <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                </td>
    
                                                    <div class="modal fade admin-query" id="deleteCurrency<?php echo e(@$value->id); ?>" >
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo app('translator')->get('system_settings.delete_language'); ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                    </div>
                                                                    <div class="mt-40 d-flex justify-content-between">
                                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                        <a href="<?php echo e(route('language_delete', [@$value->id])); ?>" class="text-light">
                                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                        </a>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/language.blade.php ENDPATH**/ ?>
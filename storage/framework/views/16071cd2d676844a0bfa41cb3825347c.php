
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.course_category'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.course_category'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.course_category'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($editData)): ?>
                <?php if(userPermission('store_news_category')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <?php if(userPermission("store-course-category")): ?>
                                <a href="<?php echo e(route('course-category')); ?>" class="primary-btn small fix-gr-bg">
                                    <span class="ti-plus pr-2"></span>
                                    <?php echo app('translator')->get('common.add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'update-course-category',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php else: ?>
                                <?php if(userPermission("store-course-category")): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'store-course-category',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('front_settings.edit_category'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('front_settings.add_category'); ?>
                                        <?php endif; ?>
    
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12 mb-20">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.category_name'); ?>
                                                    <span class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('category_name') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="category_name" autocomplete="off"
                                                    value="<?php echo e(isset($editData) ? $editData->category_name : ''); ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php echo e(isset($editData) ? $editData->id : ''); ?>">


                                                <?php if($errors->has('category_name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('category_name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        
                                        <div class="col-lg-12 mt-15">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.category_image'); ?>
                                                    <span class="text-danger"> *</span> </label>
                                                <div class="primary_file_uploader">
                                                    <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('category_image') ? ' is-invalid' : ''); ?>" name="category_image" readonly="true" type="text"
                                                    placeholder="<?php echo e(isset($editData->category_image) && @$editData->category_image != '' ? getFilePath3(@$editData->category_image) : trans('front_settings.image')); ?>"
                                                    id="placeholderUploadContent">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="addCategoryImage"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="category_image" id="addCategoryImage">
                                                    </button>
                                                    
                                                    <?php if($errors->has('category_image')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('category_image')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-12 mt-15">
                                            <img class="previewImageSize <?php echo e(@$editData->category_image ? '' : 'd-none'); ?>" src="<?php echo e(@$editData->category_image ? asset($editData->category_image) : ''); ?>" alt="" id="categoryImageShow" height="100%" width="100%">
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission("store-course-category")) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                        if (isset($editData)) {
                                            if (userPermission('edit-course-category')) {
                                                $tooltip = '';
                                            } else {
                                                $tooltip = 'You have no permission to edit';
                                            }
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
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
                                    <h3 class="mb-15"> <?php echo app('translator')->get('front_settings.course_category_list'); ?></h3>
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
                                            <th> <?php echo app('translator')->get('student.category_title'); ?></th>
                                            <th> <?php echo app('translator')->get('front_settings.image'); ?> </th>
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($course_categories)): ?>
                                            <?php $__currentLoopData = $course_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->category_name); ?></td>
                                                    <td>
                                                        <img src="<?php echo e(asset($value->category_image)); ?>" height="100"
                                                            width="200">
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
                                                            <?php if(userPermission('edit-course-category')): ?>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('edit-course-category', $value->id)); ?>">
                                                                    <?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
    
                                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                <span tabindex="0" data-toggle="tooltip"
                                                                    title="Disabled For Demo"> <a href="#"
                                                                        class="dropdown-item small fix-gr-bg  demo_view"
                                                                        style="pointer-events: none;"><?php echo app('translator')->get('common.delete'); ?></a></span>
                                                            <?php else: ?>
                                                                <?php if(userPermission('delete-course-category')): ?>
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#deleteCourseCategory<?php echo e($value->id); ?>"
                                                                        href="#">
                                                                        <?php echo app('translator')->get('common.delete'); ?>
                                                                    </a>
                                                                <?php endif; ?>
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
                                                </tr>
                                                <div class="modal fade admin-query"
                                                    id="deleteCourseCategory<?php echo e($value->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">
                                                                    <?php echo app('translator')->get('front_settings.delete_course_category'); ?>
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
    
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    <?php echo e(Form::open(['route' => ['delete-course-category', $value->id], 'method' => 'post'])); ?>

                                                                    <button class="primary-btn fix-gr-bg" type="submit">
                                                                        <?php echo app('translator')->get('common.delete'); ?>
                                                                    </button>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('change', '#addCategoryImage', function(event) {
            $('#categoryImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderUploadContent');
            imageChangeWithFile($(this)[0], '#categoryImageShow');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/course/course_category.blade.php ENDPATH**/ ?>
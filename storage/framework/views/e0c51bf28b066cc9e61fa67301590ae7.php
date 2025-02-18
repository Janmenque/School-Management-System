
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.course'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
    .invalid-select-label {
        position: absolute;
        bottom: 0px;
        margin-top: 0px !important;
    }
    .invalid-select-label strong{
        top: -7px;
    }
</style>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.add_course'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.add_course'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($add_course)): ?>
                <?php if(userPermission("store_course")): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('course-list')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_course)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update_course',
                            'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                            <?php if(userPermission("store_course")): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store_course',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($add_course)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_course'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.add_course'); ?>
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12 mb-30">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title" autocomplete="off" value="<?php echo e(isset($add_course)? $add_course->title: old('title')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($add_course)? $add_course->id: ''); ?>">
                                            
                                            <?php if($errors->has('title')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('title')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.course_category'); ?> <span class="text-danger"> *</span></label>
                                            <select class="primary_select form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" name="category_id">
                                                <option data-display="<?php echo app('translator')->get('front_settings.course'); ?> <?php echo app('translator')->get('student.category'); ?>*" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e((@$add_course->category_id == $category->id) ? 'selected' :''); ?>><?php echo e($category->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('category_id')): ?>
                                                <span class="text-danger" role="alert">
                                                    <?php echo e($errors->first('category_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.image'); ?> <span class="text-danger"> </span></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" type="text"
                                                                id="placeholderFileOneName"
                                                                placeholder="<?php echo e(isset($add_course)? ($add_course->image !="") ? getFilePath3($add_course->image) :trans('front_settings.image') .' *' :trans('front_settings.image')); ?>"
                                                                readonly >
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="addCourseImage"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="image" id="addCourseImage">
                                                    </button>
                                                    <?php if($errors->has('image')): ?>
                                                        <span class="text-danger" role="alert">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-md-12 mt-15">
                                        <img class="previewImageSize <?php echo e(@$add_course->image ? '' : 'd-none'); ?>" src="<?php echo e(@$add_course->image ? asset($add_course->image) : ''); ?>" alt="" id="courseImageShow" height="100%" width="100%">
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-md-12 mt-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.overview'); ?> </label>
                                            <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('overview') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="overview" maxlength="500"><?php echo e(isset($add_course) ? $add_course->overview : old('overview')); ?></textarea>
                                            <script>
                                                CKEDITOR.replace("overview" );
                                            </script>
                                            <?php if($errors->has('overview')): ?>
                                                <span class="text-danger" ><?php echo e($errors->first('overview')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>      
                                <div class="row mt-15">
                                    <div class="col-md-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label d-flex" for=""><?php echo app('translator')->get('front_settings.outline'); ?>
                                                <?php if(moduleStatusCheck('AiContent')): ?>
                                                    <?php echo $__env->make('aicontent::inc.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                                <span>
                                                </span>
                                            </label>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('outline') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="outline" maxlength="500"><?php echo e(isset($add_course) ? $add_course->outline : old('outline')); ?></textarea>
                                            <script>
                                                CKEDITOR.replace( "outline" );
                                            </script>
                                            <?php if($errors->has('outline')): ?>
                                                <span class="error text-danger">
                                                    <?php echo e($errors->first('outline')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-md-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label d-flex" for=""><?php echo app('translator')->get('front_settings.prerequisites'); ?>
                                                <?php if(moduleStatusCheck('AiContent')): ?>
                                                    <?php echo $__env->make('aicontent::inc.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </label>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('prerequisites') ? ' is-invalid' : ''); ?>"
                                                cols="0" rows="4" name="prerequisites" maxlength="500"><?php echo e(isset($add_course) ? $add_course->prerequisites : old('prerequisites')); ?></textarea>
                                            <script>
                                                CKEDITOR.replace( "prerequisites" );
                                            </script>
                                            <?php if($errors->has('prerequisites')): ?>
                                                <span class="error text-danger">
                                                    <?php echo e($errors->first('prerequisites')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-md-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label d-flex"
                                                for=""><?php echo app('translator')->get('front_settings.resources'); ?>
                                                <?php if(moduleStatusCheck('AiContent')): ?>
                                                    <?php echo $__env->make('aicontent::inc.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </label>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('resources') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="resources" maxlength="500"><?php echo e(isset($add_course) ? $add_course->resources : old('resources')); ?></textarea>
                                            <script>
                                                CKEDITOR.replace( "resources" );
                                            </script>
                                            <?php if($errors->has('resources')): ?>
                                                <span class="error text-danger">
                                                    <?php echo e($errors->first('resources')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-md-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label d-flex"
                                                for=""><?php echo app('translator')->get('front_settings.stats'); ?>
                                                <?php if(moduleStatusCheck('AiContent')): ?>
                                                    <?php echo $__env->make('aicontent::inc.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </label>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('stats') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="stats" maxlength="500"><?php echo e(isset($add_course) ? $add_course->stats : old('stats')); ?></textarea>
                                            <script>
                                                CKEDITOR.replace( "stats" );
                                            </script>
                                            <?php if($errors->has('stats')): ?>
                                                <span class="error text-danger">
                                                    <?php echo e($errors->first('stats')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        $tooltip = "";
                        if(userPermission("store_course") || userPermission('edit-course')){
                                $tooltip = "";
                            }else{
                                $tooltip = "You have no permission to add";
                            }
                    ?>
                    <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('front_settings.update_course'); ?></button></span>
                                <?php else: ?>
                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php if(isset($add_course)): ?>
                                        <?php echo app('translator')->get('front_settings.update_course'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.add_course'); ?>
                                    <?php endif; ?>
                                    
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
        <div class="col-lg-12 mt-40 p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('front_settings.course_list'); ?></h3>
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
                                    <th><?php echo app('translator')->get('front_settings.title'); ?></th>
                                    <th><?php echo app('translator')->get('front_settings.overview'); ?></th>
                                    <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($course)): ?>
                                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(@$value->title); ?></td>
                                            <td><?php echo substr($value->overview, 0, 50); ?></td>
                                            <td><img src="<?php echo e(asset(@$value->image)); ?>" width="60px" height="50px"></td>
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
                                                        <?php if(userPermission('course-Details-admin')): ?>
                                                            <a href="<?php echo e(route('course-Details-admin',$value->id)); ?>"
                                                            class="dropdown-item small fix-gr-bg modalLink"
                                                            title="Course Details" data-modal-size="full-width-modal">
                                                                <?php echo app('translator')->get('common.view'); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('edit-course')): ?>
                                                            <a class="dropdown-item"
                                                            href="<?php echo e(route('edit-course',$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
    
                                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                        <span  tabindex="0" data-toggle="tooltip" title="Disabled For Demo"> <a href="#" class="dropdown-item small fix-gr-bg  demo_view" style="pointer-events: none;" ><?php echo app('translator')->get('common.delete'); ?></a></span>
                                                            <?php else: ?>
                                                                <?php if(userPermission('for-delete-course')): ?>
                                                                    <a href="<?php echo e(route('for-delete-course',$value->id)); ?>"
                                                                    class="dropdown-item small fix-gr-bg modalLink"
                                                                    title="<?php echo app('translator')->get('front_settings.delete_course'); ?>" data-modal-size="modal-md">
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
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('change', '#addCourseImage', function(event) {
            $('#courseImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderFileOneName');
            imageChangeWithFile($(this)[0], '#courseImageShow');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/frontSettings/course/course_page.blade.php ENDPATH**/ ?>
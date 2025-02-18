
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('style.color_style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('style.color_style'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('style.style'); ?></a>
                    <a href="#"><?php echo app('translator')->get('style.color_style'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['themes.update', $theme->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

            <input type="hidden" value="<?php echo e($theme->id); ?>" name="theme_id">
            <input type="hidden" id="old_bg_image" value="<?php echo e(asset($theme->background_image)); ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('style.Edit Color Theme'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="title">
                                        <?php echo e(__('style.Theme Title')); ?> <span class="text-danger"> *</span>
                                        
                                        </label>
                                    <input type="text" name="title"
                                        class="primary_input_field form-control <?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                        id="title" required maxlength="191" value="<?php echo e(old('title', $theme->title)); ?>">
                                    
                                    
                                    <?php if($errors->has('title')): ?>
                                        <span class="text-danger" >
                                            <?php echo e(@$errors->first('title')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="background-type" class="primary_input_label"> <?php echo e(__('common.type')); ?></label>
                                <select
                                    class="primary_select  form-control<?php echo e($errors->has('background_type') ? ' is-invalid' : ''); ?>"
                                    name="background_type" id="background-type">                                   
                                    
                                    <option value="image" <?php echo e(old('background_type', $theme->background_type) == 'image' ? 'selected' : ''); ?>>
                                        <?php echo app('translator')->get('common.image'); ?> (1920x1400)</option>

                                    <option value="color" <?php echo e(old('background_type', $theme->background_type) == 'color' ? 'selected' : ''); ?>>
                                            <?php echo app('translator')->get('style.color'); ?></option>

                                </select>
                                <?php if($errors->has('background_type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('background_type')); ?>

                                    </span>
                                <?php endif; ?>

                            </div>
                            <div class="col-lg-4" id="background-color">
                                <div class="primary_input">
                                    <label class="primary_input_label"><?php echo app('translator')->get('style.color'); ?><span class="text-danger"> *</span></label>

                                    <input class="primary_input_field color-input form-control" type="color" name="background_color"
                                        autocomplete="off" id="background_color" value="<?php echo e(old('background_color', $theme->background_color)); ?>">


                                    <?php if($errors->has('background_color')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('background_color')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4" id="background-image">
                                <div class="primary_input">
                                    <label class="primary_input_label"
                                        for=""><?php echo e(trans('common.file')); ?></label>
                                    <div class="primary_file_uploader">
                                        <input class="primary_input_field" id="placeholderInput" type="text"
                                                placeholder="<?php echo e(isset($theme) ? (@$theme->background_image != '' ? getFilePath3(@$theme->background_image) : trans('style.background_image') . ' *') : trans('style.background_image') . ' *'); ?>"
                                                readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="addThemeImage"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" id="addThemeImage" name="background_image">
                                        </button>
                                    </div>
                                   
                                    <?php if($errors->has('background_image')): ?>
                                    <span class="text-danger d-block">
                                        <?php echo e($errors->first('background_image')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15" id="themeImageDiv">
                            <div class="col-lg-12">
                                <img class="previewImageSize <?php echo e(@$theme->background_image ? '' : 'd-none'); ?>" src="<?php echo e(@$theme->background_image ? asset($theme->background_image) : ''); ?>" alt="" id="themeImageShow" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 mt-25" id="<?php echo e($color->name . '_div'); ?>">
                                    <div class="primary_input">

                                        <label class="fw-400 fs-12 position-unset mb-1 top-0"><?php echo e(__('style.' . $color->name)); ?><span class="text-danger"> *</span></label>
                                        <input type="color" name="color[<?php echo e($color->id); ?>]"
                                            class="primary_input_field color-input form-control color_field" id="<?php echo e($color->name); ?>"  data-name="<?php echo e($color->name); ?>"
                                            required  value="<?php echo e(old('color.'.$color->id, $color->pivot->value)); ?>" data-value="<?php echo e($color->pivot->value); ?>">
                                        
                                       
                                        <?php if($errors->has('color')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('color')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row">
                            <div class="col-4 mt-25">

                                <div class="">

                                    <input type="checkbox" id="box_shadow"
                                        class="common-checkbox form-control<?php echo e(@$errors->has('box_shadow') ? ' is-invalid' : ''); ?>"
                                        name="box_shadow" <?php echo e(old('box_shadow', $theme->box_shadow) ? 'checked' : ''); ?>>
                                    <label for="box_shadow"><?php echo e(__('style.box_shadow')); ?></label>

                                </div>

                                <?php if($errors->has('box_shadow')): ?>
                                    <span class="text-danger validate-textarea-checkbox" role="alert">
                                        <?php echo e(@$errors->first('box_shadow')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-12">
                                <div class="submit_btn text-center ">
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="reset_to_default"
                                        type="button"><i class="ti-reload"></i><?php echo e(__('style.Reset To Default')); ?>

                                    </button>
                                    <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i
                                            class="ti-check"></i><?php echo e(__('common.save')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('backEnd.style.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).on('change', '#addThemeImage', function(event) {
            $('#themeImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderInput');
            imageChangeWithFile($(this)[0], '#themeImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/style/edit_theme.blade.php ENDPATH**/ ?>
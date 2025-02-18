<div class="showAndHideSettings" style="display:none">
    <div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-5">
                <div class="main-title">
                    <h3 class="mb-15"><?php echo app('translator')->get('communicate.calendar_settings'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row mb-40">
              <div class="col-lg-12">
                <div>
                    <?php echo e(Form::open(['route' => 'store-academic-calendar-settings', 'method' => 'POST'])); ?>

                    <div class="row">
                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-uppercase fw-500 mb-10" style="width: 130px;"><?php echo app('translator')->get('communicate.'.$setting->menu_name); ?></p>
                                            <div class="d-flex radio-btn-flex ml-40">
                                                <div class="mr-30">
                                                    <input type="radio" name="setting[<?php echo e($setting->menu_name); ?>][status]" id="settingsY<?php echo e($setting->id); ?>" value="1" class="common-radio" <?php echo e($setting->status == 1 ? 'checked' : ''); ?>>
                                                    <label for="settingsY<?php echo e($setting->id); ?>"><?php echo app('translator')->get('common.yes'); ?></label>
                                                </div>
                                                <div class="mr-30">
                                                    <input type="radio" name="setting[<?php echo e($setting->menu_name); ?>][status]" id="settingsN<?php echo e($setting->id); ?>" value="0" class="common-radio" <?php echo e($setting->status == 0 ? 'checked' : ''); ?>>
                                                    <label for="settingsN<?php echo e($setting->id); ?>"><?php echo app('translator')->get('common.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label"><?php echo app('translator')->get('communicate.font_color'); ?><span class="text-danger"> *</span></label>
                                                <input type="color" name="setting[<?php echo e($setting->menu_name); ?>][font_color]" class="primary_input_field color-input color_field" required value="<?php echo e($setting->font_color); ?>">
                                                <?php $__errorArgs = ['font_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger">
                                                        <?php echo e($message); ?>

                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label"><?php echo app('translator')->get('communicate.background_color'); ?><span class="text-danger"> *</span></label>
                                                <input type="color" name="setting[<?php echo e($setting->menu_name); ?>][bg_color]" class="primary_input_field color-input color_field" required value="<?php echo e($setting->bg_color); ?>">
                                                <?php $__errorArgs = ['bg_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger">
                                                        <?php echo e($message); ?>

                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if(userPermission('store-academic-calendar-settings')): ?>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit">
                                    <span class="ti-check"></span><?php echo app('translator')->get('common.update'); ?>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::close()); ?>

              </div>
          </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/_calendarSettingsForm.blade.php ENDPATH**/ ?>
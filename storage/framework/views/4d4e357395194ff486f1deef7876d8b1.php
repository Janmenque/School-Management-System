
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.sms_sending_time'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.sms_sending_time'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.sms_sending_time'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a class="primary-btn fix-gr-bg" style="position: relative; right: 0" data-toggle="modal" data-target="#commandModal" href="#">Cron
                        Command
                    </a>
                </div>
            </div>

            <div class="modal fade admin-query" id="commandModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Cron Jobs Command</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="text-center">
                                <h4><code>artisan absent_notification:sms</code> </h4>

                            </div>

                            <div class="mt-40 d-flex ">
                                Example: <br>
                                <code>
                                    <?php echo e('cd ' . base_path() . '/ && php artisan absent_notification:sms >> /dev/null 2>&1'); ?>

                                </code>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-0 mt-lg-3">


                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'absent_time_setup_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                                <input type="hidden" name="id" value="<?php echo e($editData->id); ?>">
                            <?php else: ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'absent_time_setup',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('student.edit_time_setup'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('student.add_time_setup'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.start_time'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field primary_input_field time form-control<?php echo e($errors->has('start_time') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="start_time" id="start_time"
                                                    value="<?php echo e(isset($editData) ? $editData->time_from : Carbon::now()->format('H:i')); ?>">


                                                <?php if($errors->has('start_time')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('start_time')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <label for="start_time" class="m-0 p-0">
                                                <i class="ti-timer"></i>
                                            </label>
                                        </button>
                                    </div>
                                    
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="primary_select form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>"
                                                name="active_status">
                                                <option data-display="<?php echo app('translator')->get('student.status'); ?> *" value="">
                                                    <?php echo app('translator')->get('student.status'); ?> *</option>
                                                <option value="1"
                                                    <?php echo e(isset($editData) ? ($editData->active_status == 1 ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('common.active'); ?></option>
                                                <option value="0"
                                                    <?php echo e(isset($editData) ? ($editData->active_status == 0 ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('common.pending'); ?></option>
                                            </select>
                                            <?php if($errors->has('active_status')): ?>
                                                <span class="text-danger invalid-select d-block" role="alert">
                                                    <?php echo e($errors->first('active_status')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="">
                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('student.update_time_setup'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('student.save_time_setup'); ?>
                                                <?php endif; ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="url" value="<?php echo e(Request::url()); ?>">
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
    
                                    <h3 class="mb-15"><?php echo app('translator')->get('student.time_setup_list'); ?></h3>
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
                                                <th><?php echo app('translator')->get('student.time'); ?></th>
                                                
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $__currentLoopData = $setups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(@$item->time_from); ?></td>
                                                    
                                                    <td>
                                                        <?php if($item->active_status == 1): ?>
                                                            <?php echo app('translator')->get('common.active'); ?>
                                                        <?php else: ?>
                                                            <?php echo app('translator')->get('common.pending'); ?>
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
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('absent_time_edit', [$item->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#deleteStudentTypeModal<?php echo e($item->id); ?>"
                                                                href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                            </div>
                        </div>
                    </div>
                    </td>
                    </tr>
                    <div class="modal fade admin-query" id="deleteStudentTypeModal<?php echo e($item->id); ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo app('translator')->get('student.delete_time_setup'); ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                    </div>
                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                        <a href="<?php echo e(route('time_setup_delete', [$item->id])); ?>"><button
                                                class="primary-btn fix-gr-bg"
                                                type="submit"><?php echo app('translator')->get('common.delete'); ?></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/StudentAbsentNotification\Resources/views/index.blade.php ENDPATH**/ ?>
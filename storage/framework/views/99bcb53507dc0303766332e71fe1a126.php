
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.student_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
    <input type="text" hidden value="<?php echo e(@$clas->section_name->sectionName->section_name); ?>" id="sec">
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.student_report'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.student_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_report_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatuscheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => ['US'], 'hide' => ['USUB']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => ['US'], 'hide' => ['USUB']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('backEnd.common.search_criteria', [
                                    'div' => 'col-lg-3 mb-15',
                                    'required' => ['class'],
                                    'visiable' => ['class', 'section'],
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <div class="col-lg-3 mb-15">
                                <label class="primary_input_label" for=""><?php echo e(__('common.type')); ?></label>
                                <select class="primary_select" name="type">
                                    <option data-display="<?php echo app('translator')->get('reports.select_type'); ?>" value=""><?php echo app('translator')->get('reports.select_type'); ?></option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>"
                                            <?php echo e(isset($type_id) ? ($type_id == $type->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($type->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 mb-15">
                                <label class="primary_input_label" for=""><?php echo e(__('common.gender')); ?></label>
                                <select class="primary_select" name="gender">
                                    <option data-display="<?php echo app('translator')->get('reports.select_gender'); ?>" value=""><?php echo app('translator')->get('reports.select_gender'); ?></option>
                                    <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gender->id); ?>"
                                            <?php echo e(isset($gender_id) ? ($gender_id == $gender->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($gender->base_setup_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <?php if(isset($student_records)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('reports.student_report'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 ">
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
                                        <table id="table_id" class="table Crm_table_active3" cellspacing="0" width="100%">
                                            <thead>
                                                <?php if(session()->has('message-danger') != ''): ?>
                                                    <tr>
                                                        <td colspan="9">
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <th><?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                                        <th><?php echo app('translator')->get('university::un.department'); ?></th>
                                                    <?php else: ?>
                                                        <th><?php echo app('translator')->get('common.class'); ?></th>
                                                        <th><?php echo app('translator')->get('common.section'); ?></th>
                                                    <?php endif; ?>
                                                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                                    <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                                    <th><?php echo app('translator')->get('common.date_of_birth'); ?></th>
                                                    <th><?php echo app('translator')->get('common.gender'); ?></th>
                                                    <th><?php echo app('translator')->get('common.type'); ?></th>
                                                    <th><?php echo app('translator')->get('common.phone'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                            <td><?php echo e(@$record->UnSemesterLabel->name); ?></td>
                                                            <td> <?php echo e(@$record->unDepartment->name); ?></td>
                                                        <?php else: ?>
                                                            <td><?php echo e(@$record->class->class_name); ?></td>
                                                            <td> <?php echo e(@$record->section->section_name); ?></td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(@$record->student->admission_no); ?></td>
                                                        <td><?php echo e(@$record->student->first_name . ' ' . @$record->student->last_name); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->parents != '' ? @$record->student->parents->fathers_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->date_of_birth != '' ? dateConvert(@$record->student->date_of_birth) : ''); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->gender != '' ? @$record->student->gender->base_setup_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->category != '' ? @$record->student->category->category_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->mobile); ?></td>
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
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/student_report.blade.php ENDPATH**/ ?>
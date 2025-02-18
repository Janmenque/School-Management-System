
    <?php $__env->startSection('title'); ?>
        <?php echo app('translator')->get('academics.subject_list'); ?> 
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('student_subject')); ?>"><?php echo app('translator')->get('common.subject'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 student-details up_admin_visitor">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <li class="nav-item">
                                <a class="nav-link <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) - <?php echo e(@$record->unAcademic->name); ?>

                                    <?php else: ?> 
                                        <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) 
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <div role="tabpanel" class="tab-pane fade mt-60  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
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
                                            <th><?php echo app('translator')->get('common.subject'); ?></th>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <th><?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                                <th><?php echo app('translator')->get('university::un.number_of_hours'); ?></th>
                                                <th><?php echo app('translator')->get('fees.fees'); ?></th>
                                                <th><?php echo app('translator')->get('university::un.pass_mark'); ?></th>
                                            <?php endif; ?> 
                                            <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                            <th><?php echo app('translator')->get('academics.subject_type'); ?></th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        if(moduleStatusCheck('University')){
                                            $subjects = $record->UnAssignSubject;
                                        }else{
                                            $subjects = $record->AssignSubject ;
                                        }
                                    ?>
                                    <tbody>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$assignSubject->subject!=""?@$assignSubject->subject->subject_name:""); ?> - ( <?php echo e(@$assignSubject->subject->subject_code); ?> )</td>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <td><?php echo e($assignSubject->semesterLabel->name); ?></td>
                                                    <td><?php echo e(@$assignSubject->subject->number_of_hours); ?></td>
                                                    <td><?php echo e(@$assignSubject->feesMaster->amount); ?></td>
                                                    <td><?php echo e(@$assignSubject->subject->pass_mark); ?>%</td>
                                                <?php endif; ?>
                                                <td><?php echo e(@$assignSubject->teacher!=""?@$assignSubject->teacher->full_name:""); ?></td>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <td>
                                                        <?php echo e(@$assignSubject->subject->subject_type); ?>

                                                    </td> 
                                                <?php else: ?>
                                                    <td>
                                                        <?php if(!empty(@$assignSubject->subject)): ?>
                                                            <?php echo e(@$assignSubject->subject->subject_type == "T"? 'Theory': 'Practical'); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/student_subject.blade.php ENDPATH**/ ?>
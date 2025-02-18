<?php $__env->startPush('css'); ?>
    <style>
        #default_table.class-routine-table tr td {
            min-width: 200px;
        }

        .class-routine-table tbody tr td,
        .class-routine-table tbody tr th {
            padding-left: 18px !important;
        }

        .class-routine-table tbody th:nth-child(2) {
            padding-left: 18px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<div class="col-lg-12">
    <div class="white-box overflow-auto">
        <div class="row">
            <?php if($routineDashboard): ?>
        <div class="col-lg-12 col-md-12">
            <div class="main-title">
                <h3 class="mb-15"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-lg-12 student-details up_admin_visitor">
        <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(moduleStatuscheck('University')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" href="#tab<?php echo e($key); ?>"
                            role="tab" data-toggle="tab">
                            <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) -
                            <?php echo e(@$record->unAcademic->name); ?>

                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" href="#tab<?php echo e($key); ?>"
                            role="tab"
                            data-toggle="tab"><?php echo e($record->class->class_name); ?>

                            (<?php echo e($record->section->section_name); ?>)
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if(moduleStatuscheck('University')): ?>
            <div class="tab-content">
                <!-- Start Fees Tab -->
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div role="tabpanel"
                        class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                        id="tab<?php echo e($key); ?>">
                        <div class="container-fluid p-0">
                            <div class="row mt-15">
                                <?php if(!$routineDashboard): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="main-title">
                                            <h3 class="mb-30"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-6 col-md-6 col-6 pull-right">
                                    <a href="<?php echo e(route('university.academics.classRoutinePrint', [$record->un_semester_label_id, $record->un_section_id])); ?>"
                                        class="primary-btn small fix-gr-bg pull-right" target="_blank"><i
                                            class="ti-printer"> </i> Print</a>
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
                                        <table id="table_id" class="table  Crm_table_active3" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <?php
                                                    $height = 0;
                                                    $tr = [];
                                                ?>
                                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if (moduleStatusCheck('University')) {
                                                            $studentClassRoutine = App\SmWeekend::universityStudentClassRoutine($record->un_semester_label_id, $record->un_section_id, $sm_weekend->id);
                                                        } else {
                                                            $studentClassRoutine = App\SmWeekend::studentClassRoutineFromRecord($record->class_id, $record->section_id, $sm_weekend->id);
                                                        }
                                                    ?>
                                                    <?php if($studentClassRoutine->count() > $height): ?>
                                                        <?php
                                                            $height = $studentClassRoutine->count();
                                                        ?>
                                                    <?php endif; ?>
                                                    <th><?php echo e(@$sm_weekend->name); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <?php
                                                $used = [];
                                                $tr = [];
                                            ?>
                                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $i = 0;
                                                    if (moduleStatusCheck('University')) {
                                                        $studentClassRoutine = App\SmWeekend::universityStudentClassRoutine($record->un_semester_label_id, $record->un_section_id, $sm_weekend->id);
                                                    } else {
                                                        $studentClassRoutine = App\SmWeekend::studentClassRoutineFromRecord($record->class_id, $record->section_id, $sm_weekend->id);
                                                    }
                                                ?>
                                                <?php $__currentLoopData = $studentClassRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if (!in_array($routine->id, $used)) {
                                                            if (moduleStatusCheck('University')) {
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->unSubject ? $routine->unSubject->subject_name : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->unSubject ? $routine->unSubject->subject_code : '';
                                                            } else {
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->subject ? $routine->subject->subject_name : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->subject ? $routine->subject->subject_code : '';
                                                            }
                                                            $tr[$i][$sm_weekend->name][$loop->index]['class_room'] = $routine->classRoom ? $routine->classRoom->room_no : '';
                                                            $tr[$i][$sm_weekend->name][$loop->index]['teacher'] = $routine->teacherDetail ? $routine->teacherDetail->full_name : '';
                                                            $tr[$i][$sm_weekend->name][$loop->index]['start_time'] = $routine->start_time;
                                                            $tr[$i][$sm_weekend->name][$loop->index]['end_time'] = $routine->end_time;
                                                            $tr[$i][$sm_weekend->name][$loop->index]['is_break'] = $routine->is_break;
                                                            $used[] = $routine->id;
                                                        }
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $i++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($i = 0; $i < $height; $i++): ?>
                                                <tr>
                                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <td>
                                                                <?php
                                                                    $classes = gv($days, $sm_weekend->name);
                                                                ?>
                                                                <?php if($classes && gv($classes, $i)): ?>
                                                                    <?php if($classes[$i]['is_break']): ?>
                                                                        <strong> <?php echo app('translator')->get('academics.break'); ?> </strong>
                                                                        <span class="">
                                                                            (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                            -
                                                                            <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)
                                                                            <br> </span>
                                                                    <?php else: ?>
                                                                        <span class="">
                                                                            <strong><?php echo app('translator')->get('common.time'); ?> :</strong>
                                                                            <?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                            -
                                                                            <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>

                                                                            <br> </span>
                                                                        <span class=""> <strong>
                                                                                <?php echo e($classes[$i]['subject']); ?>

                                                                            </strong>
                                                                            (<?php echo e($classes[$i]['subject_code']); ?>)
                                                                            <br> </span>
                                                                        <?php if($classes[$i]['class_room']): ?>
                                                                            <span class="">
                                                                                <strong><?php echo app('translator')->get('academics.room'); ?>
                                                                                    :</strong>
                                                                                <?php echo e($classes[$i]['class_room']); ?>

                                                                                <br> </span>
                                                                        <?php endif; ?>
                                                                        <?php if($classes[$i]['teacher']): ?>
                                                                            <span class="">
                                                                                <?php echo e($classes[$i]['teacher']); ?>

                                                                                <br> </span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            <?php endfor; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- End Fees Tab -->
            </div>
        <?php else: ?>
            <div class="tab-content">
                <!-- Start Fees Tab -->
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div role="tabpanel" class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                        id="tab<?php echo e($key); ?>">
                        <div class="container-fluid p-0">
                            <div class="row <?php echo e($routineDashboard ? '' : 'mt-15'); ?>">
                                <?php if(!$routineDashboard): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="main-title mt-0">
                                            <h3 class="mb-15"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(!$routineDashboard): ?>
                                    <div class="col-lg-6 col-md-6 col-6 pull-right">
                                        <a href="<?php echo e(route('classRoutinePrint', [@$record->class_id, @$record->section_id])); ?>"
                                            class="primary-btn small fix-gr-bg pull-right" target="_blank"><i
                                                class="ti-printer"> </i> Print</a>
                                    </div>
                                <?php endif; ?>
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
                                        <div class="table-responsive">
                                            <table id="default_table"
                                                class="table school-table-data class-routine-table <?php echo e($routineDashboard ? 'customeDashboard' : ''); ?>"
                                                cellspacing="0" width="100%">
                                                <tr>
                                                    <?php
                                                        $height = 0;
                                                        $tr = [];
                                                    ?>
                                                    <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $studentClassRoutine = App\SmWeekend::studentClassRoutineFromRecord($record->class_id, $record->section_id, $sm_weekend->id);
                                                        ?>
                                                        <?php if($studentClassRoutine->count() > $height): ?>
                                                            <?php
                                                                $height = $studentClassRoutine->count();
                                                            ?>
                                                        <?php endif; ?>
                                                        <th
                                                            class="<?php echo e($routineDashboard ? (\Carbon\Carbon::now()->format('l') == $sm_weekend->name ? 'main-border-color' : '') : ''); ?>">
                                                            <?php echo e(@$sm_weekend->name); ?></th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                <?php
                                                    $used = [];
                                                    $tr = [];
                                                ?>
                                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $i = 0;
                                                        $studentClassRoutine = App\SmWeekend::studentClassRoutineFromRecord($record->class_id, $record->section_id, $sm_weekend->id);
                                                    ?>
                                                    <?php $__currentLoopData = $studentClassRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            if (!in_array($routine->id, $used)) {
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->subject ? $routine->subject->subject_name : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->subject ? $routine->subject->subject_code : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['class_room'] = $routine->classRoom ? $routine->classRoom->room_no : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['teacher'] = $routine->teacherDetail ? $routine->teacherDetail->full_name : '';
                                                                $tr[$i][$sm_weekend->name][$loop->index]['start_time'] = $routine->start_time;
                                                                $tr[$i][$sm_weekend->name][$loop->index]['end_time'] = $routine->end_time;
                                                                $tr[$i][$sm_weekend->name][$loop->index]['is_break'] = $routine->is_break;
                                                                $used[] = $routine->id;
                                                            }
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $i++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php for($i = 0; $i < $height; $i++): ?>
                                                    <tr>
                                                        <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <td
                                                                    class="<?php echo e($routineDashboard ? (\Carbon\Carbon::now()->format('l') == $sm_weekend->name ? 'main-border-color' : '') : ''); ?>">
                                                                    <?php
                                                                        $classes = gv($days, $sm_weekend->name);
                                                                    ?>
                                                                    <?php if($classes && gv($classes, $i)): ?>
                                                                        <?php if($classes[$i]['is_break']): ?>
                                                                            <strong> <?php echo app('translator')->get('academics.break'); ?> </strong>
                                                                            <span class="">
                                                                                (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                                -
                                                                                <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)
                                                                                <br> </span>
                                                                        <?php else: ?>
                                                                            <span class="">
                                                                                <strong><?php echo app('translator')->get('common.time'); ?>
                                                                                    :</strong>
                                                                                <?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                                -
                                                                                <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>

                                                                                <br> </span>
                                                                            <span class=""> <strong>
                                                                                    <?php echo e($classes[$i]['subject']); ?>

                                                                                </strong>
                                                                                (<?php echo e($classes[$i]['subject_code']); ?>)
                                                                                <br> </span>
                                                                            <?php if($classes[$i]['class_room']): ?>
                                                                                <span class="">
                                                                                    <strong><?php echo app('translator')->get('academics.room'); ?>
                                                                                        :</strong>
                                                                                    <?php echo e($classes[$i]['class_room']); ?>

                                                                                    <br> </span>
                                                                            <?php endif; ?>
                                                                            <?php if($classes[$i]['teacher']): ?>
                                                                                <span class="">
                                                                                    <?php echo e($classes[$i]['teacher']); ?>

                                                                                    <br> </span>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tr>
                                                <?php endfor; ?>
                                            </table>
                                        </div>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- End Fees Tab -->
            </div>
        <?php endif; ?>
    </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/_class_routine_content.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('study.syllabus_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        table.dataTable thead th {
            padding-left: 30px !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 20px 10px 20px 35px !important;
        }

        @media (max-width: 991px){
            .up_admin_visitor .dataTables_filter>label{
                left: 50%!important;
                top: -20px!important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('study.syllabus_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('study.study_material'); ?> </a>
                <a href="#"><?php echo app('translator')->get('study.syllabus_list'); ?> </a>
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
                                            <th><?php echo app('translator')->get('study.content_title'); ?></th>
                                            <th><?php echo app('translator')->get('common.type'); ?></th>
                                            <th><?php echo app('translator')->get('common.date'); ?></th>
                                            <th><?php echo app('translator')->get('study.available_for'); ?></th>
                                           
                                            <th style="max-width:30%"><?php echo app('translator')->get('common.description'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                        
                                        <?php 
                                            if(moduleStatusCheck('University')){
                                                $contents =  $record->getUploadContent('sy','for_university');
                                            }else{
                                                $contents =  $record->getUploadContent('sy',0);
                                            }
                                        ?>

                                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$value->content_title); ?></td>
                                                <td>
                                                    <?php if(@$value->content_type == 'as'): ?>
                                                        <?php echo e('Assignment'); ?>

                                                    <?php elseif(@$value->content_type == 'st'): ?>
                                                        <?php echo e('Study Material'); ?>

                                                    <?php elseif(@$value->content_type == 'sy'): ?>
                                                        <?php echo e('Syllabus'); ?>

                                                    <?php else: ?>
                                                        <?php echo e('Others Download'); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                                                <?php echo e(@$value->upload_date != ""? dateConvert(@$value->upload_date):''); ?>

                    
                                                </td>
                                                <td>

                                                    <?php if(moduleStatusCheck('University')): ?>
                                                    <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->semesterLabel->name.'->'.@$value->unDepartment->name); ?>)
                                                    <?php else: ?> 

                                                        <?php if(@$value->available_for_admin == 1): ?>
                                                            <?php echo app('translator')->get('study.all_admins'); ?><br>
                                                        <?php endif; ?>
                                                        <?php if(@$value->available_for_all_classes == 1): ?>
                                                            <?php echo app('translator')->get('study.all_classes_student'); ?>
                                                        <?php endif; ?>
                        
                                                        <?php if(@$value->classes != "" && $value->sections != ""): ?>
                                                            <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->classes->class_name.'->'.@$value->sections->section_name); ?>)
                                                        <?php endif; ?>
                                                        <?php if(@$value->classes != "" && $value->sections ==null): ?>
                                                        <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->classes->class_name.'->'.'All Sections'); ?>)
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                </td>
                                            
                                                <td>
                    
                                                <?php echo e(\Illuminate\Support\Str::limit(@$value->description, 500)); ?>

                    
                    
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
                                                            <a data-modal-size="modal-lg" title="View Content Details" class="dropdown-item modalLink" href="<?php echo e(route('upload-content-student-view', $value->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                            <?php if(@$value->upload_file != ""): ?>
                                                                <?php if(userPermission(32)): ?>
                                                                <a class="dropdown-item" href="<?php echo e(url(@$value->upload_file)); ?>" download>
                                                                    <?php echo app('translator')->get('study.download'); ?>  <span class="pl ti-download"></span>
                                                                </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        </div>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/studentSyllabus.blade.php ENDPATH**/ ?>
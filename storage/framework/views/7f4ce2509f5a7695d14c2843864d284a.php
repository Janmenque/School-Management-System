
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('dormitory.dormitory'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>

    @media (min-width: 991px) and (max-width: 1200px){
        .dataTables_filter label{
            left: 50%!important
        }
    }

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
            <h1><?php echo app('translator')->get('dormitory.dormitory'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('student_dormitory')); ?>"><?php echo app('translator')->get('dormitory.dormitory'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <?php if(isset($room_list)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('room-list')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"> <?php echo app('translator')->get('dormitory.dormitory_room_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('dormitory.dormitory'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.room_number'); ?> </th>
                                        <th><?php echo app('translator')->get('dormitory.room_type'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.no_of_bed'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.cost_per_bed'); ?></th>
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $__currentLoopData = $room_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$rowCount=0; ?>
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if(@$rowCount==0): ?>
                                            <td rowspan="<?php echo e(@$values->count()); ?>"><?php echo e(@$room_list->dormitory != ""? @$room_list->dormitory->dormitory_name:''); ?></td>
                                            <?php endif; ?>
                                            <?php @$rowCount=@$rowCount+1; ?>
                                            <td><?php echo e(@$room_list->name); ?></td>
                                            <td><?php echo e(@$room_list->roomType != ""? @$room_list->roomType->type: ''); ?></td>
                                            <td><?php echo e(@$room_list->number_of_bed); ?></td>
                                            <td><?php echo e(@$room_list->cost_per_bed); ?></td>
                                            <td>
                                                <?php if(@$student_detail->room_id == @$room_list->id): ?>
                                                    <button class="primary-btn small fix-gr-bg">
                                                       <?php echo app('translator')->get('dormitory.assigned'); ?>                                                 
                                                    </button>
                                                 <?php else: ?>
                                                  
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/student_dormitory.blade.php ENDPATH**/ ?>
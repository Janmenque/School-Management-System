
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('communicate.notice_board'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('communicate.notice_board'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.communicate'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.notice_board'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-40 sms-accordion">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-5">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('communicate.all_notices'); ?></h3>
                        </div>
                    </div>
                    <?php if(userPermission('add-notice')): ?>
                        <div class="offset-lg-5 col-lg-3 text-right col-md-6 col-7">
                            <a href="<?php echo e(route('add-notice')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('communicate.add_notice'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <div id="accordion">
                            <?php $i = 0; ?>
                            <?php if(isset($allNotices)): ?>
                                <?php $__currentLoopData = $allNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card">
                                        <a class="card-link" data-toggle="collapse" href="#notice<?php echo e(@$value->id); ?>">
                                            <div class="card-header d-flex justify-content-between">
                                                <?php echo e(@$value->notice_title); ?>

                                                <div>
                                                    <?php if(userPermission('edit-notice')): ?>
                                                        <a href="<?php echo e(route('edit-notice', $value->id)); ?>">
                                                            <button type="submit"
                                                                class="primary-btn small tr-bg mr-10"><?php echo app('translator')->get('common.edit'); ?>
                                                            </button>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission('delete-notice-view')): ?>
                                                        <a class="deleteUrl" data-modal-size="modal-md" title="Delete Notice"
                                                            href="<?php echo e(route('delete-notice-view', $value->id)); ?>"><button
                                                                class="primary-btn small tr-bg"><?php echo app('translator')->get('common.delete'); ?> </button></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                        <?php $i++; ?>
                                        <div id="notice<?php echo e(@$value->id); ?>" class="collapse <?php echo e($i == 1 ? 'show' : ''); ?>"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <?php echo $value->notice_message; ?>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <p class="mb-0">
                                                            <span class="ti-calendar mr-10"></span>
                                                            <?php echo app('translator')->get('communicate.publish_date'); ?> :
                                                            <?php echo e(@$value->publish_on != '' ? dateConvert(@$value->publish_on) : ''); ?>

                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="ti-calendar mr-10"></span>
                                                            <?php echo app('translator')->get('communicate.notice_date'); ?> :
                                                            <?php echo e(@$value->notice_date != '' ? dateConvert(@$value->notice_date) : ''); ?>

                                                        </p>
                                                        <p>
                                                            <span class="ti-user mr-10"></span>
                                                            <?php echo app('translator')->get('communicate.created_by'); ?> :
                                                            <?php echo e(@$value->users != '' ? @$value->users->full_name : ''); ?>

                                                        </p>
                                                        <?php
                                                            $roleData = json_decode($value->inform_to);
                                                        ?>
    
                                                        <?php if(isset($roleData)): ?>
                                                            <?php $__currentLoopData = $roleData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $name = \Modules\RolePermission\Entities\InfixRole::select('name')
                                                                        ->where('id', $role)
                                                                        ->first();
                                                                ?>
                                                                <p class="mb-0">
                                                                    <span class="ti-user mr-10"></span><?php echo e(@$name->name); ?>

                                                                </p>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/noticeList.blade.php ENDPATH**/ ?>
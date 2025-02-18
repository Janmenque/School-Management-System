<?php $__env->startPush('css'); ?>
    <style>
        .notification_pagination_container.notification_list ul {
            gap: 10px;
            display: none;
        }

        .notification_pagination_container.notification_list ul li a {
            height: 32px;
            width: 32px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #828bb2;
        }

        .notification_pagination_container.notification_list ul li a:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        .notification_pagination_container.notification_list ul li a.current {
            background: var(--primary-color);
            color: var(--white);
        }

        .notification_pagination_container.notification_list ul li a.current i {
            color: var(--white);
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('notification.notifications'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('notification.notifications'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('notification.notifications'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('notification.notification_list'); ?></h3>
                        </div>
                        <div class="notification_container">
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_notification">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="notification_time"><i class="fas fa-calendar-alt"></i>
                                                <span>
                                                    <?php echo e(formatedDate($notification->created_at)); ?>

                                                </span>
                                            </div>
                                            <div class="notification_description"><?php echo e($notification->message); ?></div>
                                            <?php if($notification->url): ?>
                                            <a href="<?php echo e(@$notification->url); ?>"
                                                class="notification_view_details"><?php echo app('translator')->get('notification.view_details'); ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <a href="<?php echo e(route('view-single-notification', $notification->id)); ?>"
                                                class="dissmiss_single_notification">
                                                <svg width="25"
                                                    height="25" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="notification_close_icon">
                                                    <circle opacity="0.5" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                        stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php echo e($notifications->onEachSide(1)->links()); ?>

                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/notification_list/notification_list.blade.php ENDPATH**/ ?>
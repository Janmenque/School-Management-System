
<?php $__env->startPush('css'); ?>
    <style>
        .recipientCard {
            display: -webkit-box;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .recipientCards .white-box {
            padding: 20px;
        }

        .recipientCards .primary_input_label:before,
        .common-checkbox:checked~label::after,
        .common-checkbox~label::before {
            left: 0 !important;
        }

        .recipientCards .primary_input_label {
            padding-left: 24px;
        }

        .recipientCards .primary-btn {
            padding: 0 10px;
            line-height: 30px;
        }

        .recipientCards .white-box>.d-flex {
            margin-bottom: 10px;
        }

        .recipientCards {
            gap: 8px;
        }

        .common-checkbox~label {
            padding-left: 25px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('system_settings.notification_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.notification_settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.general_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.notification_settings'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('system_settings.notification_settings'); ?></h3>
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
                            <div class="table-responsive">
                                <table id="table_id" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('system_settings.event'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.destination'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.recipient'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $notificationSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" id="dataId" value="<?php echo e($data->id); ?>">
                                            <tr>
                                                <td width="15%">
                                                    <input type="hidden" name="event" value="1">
                                                    <?php echo e(str_replace('_', ' ', $data->event)); ?>

                                                </td>
                                                <td width="15%">
                                                    <?php $__currentLoopData = $data->destination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-lg-12">
                                                            <input type="checkbox"
                                                                id="destination<?php echo e($loop->index); ?><?php echo e($data->id); ?>"
                                                                class="common-checkbox destinationCheckbox"
                                                                <?php echo e($destination == 1 ? 'checked' : ''); ?> value="<?php echo e($key); ?>"
                                                                name="destination<?php echo e($loop->index); ?><?php echo e($data->id); ?>"
                                                                data-id="<?php echo e($data->id); ?>">
                                                            <label class="primary_input_label"
                                                                for="destination<?php echo e($loop->index); ?><?php echo e($data->id); ?>"><?php echo e($key); ?></label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td width="70%">
                                                    <div class="d-flex recipientCards">
                                                        <?php $__currentLoopData = $data->recipient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="white-box w-100">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <input type="checkbox"
                                                                        id="recipient<?php echo e($loop->index); ?><?php echo e($data->id); ?>"
                                                                        class="common-checkbox recipientCheckbox"
                                                                        <?php echo e($recipient == 1 ? 'checked' : ''); ?>

                                                                        data-id="<?php echo e($data->id); ?>"
                                                                        value="<?php echo e($key); ?>"
                                                                        name="recipient<?php echo e($loop->index); ?><?php echo e($data->id); ?>">
                                                                    <label class="primary_input_label m-0"
                                                                        for="recipient<?php echo e($loop->index); ?><?php echo e($data->id); ?>"><b><?php echo e($key); ?></b></label>
                                                                    <a class="primary-btn fix-gr-bg modalLink"
                                                                        title="<?php echo e(str_replace('_', ' ', $data->event)); ?>[<?php echo e($key); ?>]"
                                                                        data-modal-size="large-modal"
                                                                        href="<?php echo e(route('notification_event_modal', [$data->id, $key])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                </div>
                                                                <p class="recipientCard">
                                                                    <?php if(isset($data->shortcode)): ?>
                                                                        <?php $__currentLoopData = $data->shortcode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role => $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($key == $role): ?>
                                                                                <?php echo e($short); ?>

                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
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
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('click', '.destinationCheckbox', function(e) {
            let id = $(this).data('id');
            let destination = $(this).val();
            let type = 'destination';
            if ($(this).is(':checked')) {
                var status = 1;
            } else {
                var status = 0;
            }
            let formData = {
                id: id,
                destination: destination,
                status: status,
                type: type,
            }
            statusUpdate(formData);
        });
        $(document).on('click', '.recipientCheckbox', function(e) {
            let id = $(this).data('id');
            let recipient = $(this).val();
            let type = 'recipient-status';
            if ($(this).is(':checked')) {
                var status = 1;
            } else {
                var status = 0;
            }
            let formData = {
                id: id,
                recipient: recipient,
                status: status,
                type: type,
            }
            statusUpdate(formData);
        });
        $(document).on('click', '.updateNotificationModal', function(e) {
            let id = $('#id').val();
            let key = $('#key').val();
            let email_body = $('#email_body').val();
            let app_body = $('#app_body').val();
            let sms_body = $('#sms_body').val();
            let web_body = $('#web_body').val();
            let subject = $('#subject').val();
            let type = 'recipient';
            let formData = {
                id: id,
                key: key,
                subject: subject,
                email_body: email_body,
                app_body: app_body,
                sms_body: sms_body,
                web_body: web_body,
                status: status,
                type: type,
            }
            statusUpdate(formData);
            $('.modal').modal('hide');
        })

        function statusUpdate(formData) {
            var url = $('#url').val();
            $.ajax({
                type: "POST",
                data: formData,
                url: url + "/notification-settings-update",
                dataType: "json",
                success: function(response) {
                    toastr.success('Operation Successfully', 'Success');
                },
                error: function(error) {
                    toastr.error('Operation failed', 'Error');
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/notification_setting/notification_setting.blade.php ENDPATH**/ ?>
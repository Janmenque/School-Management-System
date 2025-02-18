<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('award_heading')); ?></h4>
        <div class="scholar_student_table">
            <table class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th><?php echo e(pagesetting('photo_title')); ?></th>
                        <th><?php echo e(pagesetting('name_title')); ?></th>
                        <th><?php echo e(pagesetting('session_title')); ?></th>
                        <th><?php echo e(pagesetting('scholarship_title')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty(pagesetting('scholarship_items'))): ?>
                        <?php $__currentLoopData = pagesetting('scholarship_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if(!empty($item['scholarship_item_img'])): ?>
                                        <img style="height: 50px; width: 50px;"
                                            src="<?php echo e($item['scholarship_item_img'][0]['thumbnail']); ?>"
                                            alt="<?php echo e(__('edulia.Image')); ?>">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item['scholarship_item_name']); ?></td>
                                <td><?php echo e($item['scholarship_item_session']); ?></td>
                                <td><?php echo e($item['scholarship_item_scholarship']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/award/view.blade.php ENDPATH**/ ?>
<?php if (! $__env->hasRenderedOnce('a5b80bed-9ba2-4640-b4ff-942291e83901')): $__env->markAsRenderedOnce('a5b80bed-9ba2-4640-b4ff-942291e83901');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        table thead tr th:first-child {
            text-align: left;
        }

        table thead tr th {
            text-align: center;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<section class="section_padding tution_fee">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12">
                <div class="tution_fee_wrapper">
                    <div class="tution_fee_wrapper_item tution_fee_wrapper_table">
                        <h4><?php echo e(pagesetting('tuition_fees_heading')); ?></h4>
                        <div class="tution_fee_wrapper_item_table">
                            <table>
                                <caption><?php echo e(pagesetting('tuition_fees_sub_heading')); ?></caption>
                                <thead>
                                    <tr>
                                        <th><?php echo e(pagesetting('tuition_fees_col1')); ?></th>
                                        <th><?php echo e(pagesetting('tuition_fees_col2')); ?></th>
                                        <th><?php echo e(pagesetting('tuition_fees_col3')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty(pagesetting('tuition_fees_items'))): ?>
                                        <?php $__currentLoopData = pagesetting('tuition_fees_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item['tuition_fees_item_col_1']); ?></td>
                                                <td><?php echo e($item['tuition_fees_item_col_2']); ?></td>
                                                <td><?php echo e($item['tuition_fees_item_col_3']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/tuition-fees/view.blade.php ENDPATH**/ ?>
<?php if($paginator->hasPages()): ?>
    <div class="notification_pagination_container notification_list">
        <ul class="d-flex justify-content-center">
            <?php if($paginator->onFirstPage()): ?>
                <li class="pagination_item disabled" aria-disabled="true">
                    <a class="" aria-hidden="true">
                        <i class="ti-arrow-left"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="pagination_item">
                    <a class="" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">
                        <i class="ti-arrow-left"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li class="pagination_item disabled" aria-disabled="true"><a href=""
                            class=""><?php echo e($element); ?></a></li>
                <?php endif; ?>
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="pagination_item" aria-current="page"><a href=""
                                    class="current "><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li class="pagination_item"><a href="<?php echo e($url); ?>"
                                    class=""><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="pagination_item">
                    <a class="" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">
                        <i class="ti-arrow-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="pagination_item disabled" aria-disabled="true">
                    <a class="" aria-hidden="true">
                        <i class="ti-arrow-right"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/vendor/pagination/bootstrap-4.blade.php ENDPATH**/ ?>
<?php if($news->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/news')); ?>"><?php echo app('translator')->get('edulia.news'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-<?php echo e($colum); ?>">
            <div class="blog_item">
                <div class="blog_item_img">
                    <img src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->news_title); ?>">
                </div>
                <div class="blog_item_inner">
                    <span class="blog_item_meta"><?php echo e(dateConvert($article->publish_date)); ?></span>
                    <a href="<?php echo e(route('frontend.news-details', $article->id)); ?>"
                        class='blog_item_title'><?php echo e($article->news_title); ?></a>
                    <a href="<?php echo e(route('frontend.news-details', $article->id)); ?>" class='blog_item_readmore'><i
                            class="fa fa-plus-circle"></i> <?php echo e($readmore); ?></a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/news.blade.php ENDPATH**/ ?>
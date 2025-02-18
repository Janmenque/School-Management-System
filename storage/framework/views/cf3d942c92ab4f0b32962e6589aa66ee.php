   <!-- blog area start -->
   <section class="section_padding blog index-blog">
    <div class="container">
        <?php if(pagesetting('news_area_sub_heading') || pagesetting('news_area_heading') || pagesetting('news_area__description')): ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section_title">
                    <?php if(empty(!pagesetting('news_area_sub_heading'))): ?>
                        <span class="section_title_meta"><?php echo e(pagesetting('news_area_sub_heading')); ?></span>
                    <?php endif; ?>
                    <?php if(empty(!pagesetting('news_area_heading'))): ?>
                        <h2><?php echo e(pagesetting('news_area_heading')); ?></h2>
                    <?php endif; ?>
                    <?php if(empty(!pagesetting('news_area__description'))): ?>
                        <p><?php echo pagesetting('news_area__description'); ?></p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal3d452745d4a5eb38b6bef38907945e76 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d452745d4a5eb38b6bef38907945e76 = $attributes; } ?>
<?php $component = App\View\Components\News::resolve(['colum' => pagesetting('news_area_column'),'count' => pagesetting('news_count'),'readmore' => pagesetting('read_more_btn'),'sorting' => pagesetting('news_sorting')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\News::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d452745d4a5eb38b6bef38907945e76)): ?>
<?php $attributes = $__attributesOriginal3d452745d4a5eb38b6bef38907945e76; ?>
<?php unset($__attributesOriginal3d452745d4a5eb38b6bef38907945e76); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d452745d4a5eb38b6bef38907945e76)): ?>
<?php $component = $__componentOriginal3d452745d4a5eb38b6bef38907945e76; ?>
<?php unset($__componentOriginal3d452745d4a5eb38b6bef38907945e76); ?>
<?php endif; ?>
        </div>
    </div>
</section>
<!-- blog area end --><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/news-section/view.blade.php ENDPATH**/ ?>
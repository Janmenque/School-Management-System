<section class="section_padding noticeboard">
    <div class="container p-0">
        <div class="row">
            <div class="offset-lg-2 col-lg-10">
                <div class="noticeboard_inner">
                    <div class="noticeboard_inner_head">
                        <h5><?php echo e(pagesetting('notice_heading')); ?></h5>
                    </div>
                    <div class='noticeboard_inner_wrapper'>
                        <?php if (isset($component)) { $__componentOriginal43ac45c09457f169ac48f4f21f1c5412 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal43ac45c09457f169ac48f4f21f1c5412 = $attributes; } ?>
<?php $component = App\View\Components\Notice::resolve(['count' => pagesetting('notice_count'),'btn' => pagesetting('view_detail_btn')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Notice::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal43ac45c09457f169ac48f4f21f1c5412)): ?>
<?php $attributes = $__attributesOriginal43ac45c09457f169ac48f4f21f1c5412; ?>
<?php unset($__attributesOriginal43ac45c09457f169ac48f4f21f1c5412); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43ac45c09457f169ac48f4f21f1c5412)): ?>
<?php $component = $__componentOriginal43ac45c09457f169ac48f4f21f1c5412; ?>
<?php unset($__componentOriginal43ac45c09457f169ac48f4f21f1c5412); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/notice/view.blade.php ENDPATH**/ ?>
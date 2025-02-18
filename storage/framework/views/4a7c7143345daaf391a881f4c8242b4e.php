<?php $__env->startPush('css'); ?>
<style>
    table tr td{
        white-space: nowrap;
    }
</style>
<?php $__env->stopPush(); ?>

<div role="tabpanel" class="tab-pane fade <?php echo e(Session::get('studentDocuments') == 'active' ? 'show active' : ''); ?>"
    id="studentDocuments">
    <div>
        <div class="text-right mb-20">
            <button type="button" data-toggle="modal" data-target="#add_document_madal"
                class="primary-btn tr-bg text-uppercase bord-rad">
                <?php echo app('translator')->get('student.upload_document'); ?>
                <span class="pl ti-upload"></span>
            </button>
        </div>
        <table id="" class="table simple-table table-responsive school-table"
            cellspacing="0">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('student.title'); ?></th>
                    <th><?php echo app('translator')->get('student.name'); ?></th>
                    <th><?php echo app('translator')->get('student.action'); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php if(is_show('document_file_1')): ?>
                    <?php if($student_detail->document_file_1 != ''): ?>
                        <tr>
                            <td><?php echo e($student_detail->document_title_1); ?></td>
                            <td><?php echo e(showDocument(@$student_detail->document_file_1)); ?></td>
                            <td>
                                <?php if(file_exists($student_detail->document_file_1)): ?>
                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                        href="<?php echo e(url($student_detail->document_file_1)); ?>" download>
                                        <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                    </a>
                                    <a class="primary-btn icon-only fix-gr-bg"
                                        onclick="deleteDoc(<?php echo e($student_detail->id); ?>,1)" data-id="1" href="#">
                                        <span class="ti-trash"></span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(is_show('document_file_2')): ?>
                    <?php if($student_detail->document_file_2 != ''): ?>
                        <tr>
                            <td><?php echo e($student_detail->document_title_2); ?></td>
                            <td><?php echo e(showDocument(@$student_detail->document_file_2)); ?></td>
                            <td>
                                <?php if(file_exists($student_detail->document_file_2)): ?>
                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                        href="<?php echo e(url($student_detail->document_file_2)); ?>" download>
                                        <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                    </a>
                                    <a class="primary-btn icon-only fix-gr-bg"
                                        onclick="deleteDoc(<?php echo e($student_detail->id); ?>,2)" data-id="2" href="#">
                                        <span class="ti-trash"></span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(is_show('document_file_3')): ?>
                    <?php if($student_detail->document_file_3 != ''): ?>
                        <tr>
                            <td><?php echo e($student_detail->document_title_3); ?></td>
                            <td><?php echo e(showDocument(@$student_detail->document_file_3)); ?></td>
                            <td>
                                <?php if(file_exists($student_detail->document_file_3)): ?>
                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                        href="<?php echo e(url($student_detail->document_file_3)); ?>" download>
                                        <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                    </a>
                                    <a class="primary-btn icon-only fix-gr-bg"
                                        onclick="deleteDoc(<?php echo e($student_detail->id); ?>,3)" data-id="3" href="#">
                                        <span class="ti-trash"></span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(is_show('document_file_4')): ?>
                    <?php if($student_detail->document_file_4 != ''): ?>
                        <tr>
                            <td><?php echo e($student_detail->document_title_4); ?></td>
                            <td><?php echo e(showDocument(@$student_detail->document_file_4)); ?></td>
                            <td>
                                <?php if(file_exists($student_detail->document_file_4)): ?>
                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                        href="<?php echo e(url($student_detail->document_file_4)); ?>" download>
                                        <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                    </a>

                                    <a class="primary-btn icon-only fix-gr-bg"
                                        onclick="deleteDoc(<?php echo e($student_detail->id); ?>,4)" data-id="4" href="#">
                                        <span class="ti-trash"></span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="modal fade admin-query" id="delete-doc">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="text-center">
                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                </div>

                                <div class="mt-40 d-flex justify-content-between">
                                    <form action="<?php echo e(route('student_document_delete')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="student_id">
                                        <input type="hidden" name="doc_id">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                        <button type="submit" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php $__currentLoopData = $student_detail->studentDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($document->title); ?></td>
                        <td><?php echo e(showDocument($document->file)); ?></td>
                        <td>
                            <?php if(file_exists($document->file)): ?>
                                <a class="primary-btn tr-bg text-uppercase bord-rad"
                                    href="<?php echo e(url($document->file)); ?>" download>
                                    <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                </a>
                            <?php endif; ?>
                            <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                data-target="#deleteDocumentModal<?php echo e($document->id); ?>" href="#">
                                <span class="ti-trash"></span>
                            </a>

                        </td>
                    </tr>
                    <div class="modal fade admin-query" id="deleteDocumentModal<?php echo e($document->id); ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        &times;
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                    </div>

                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                                        </button>
                                        <a class="primary-btn fix-gr-bg"
                                            href="<?php echo e(route('delete-student-document', [$document->id])); ?>">
                                            <?php echo app('translator')->get('common.delete'); ?></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade admin-query" id="add_document_madal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> <?php echo app('translator')->get('student.upload_document'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <?php echo e(Form::open([
                            'class' => 'form-horizontal',
                            'files' => true,
                            'route' => 'upload_document',
                            'method' => 'POST',
                            'enctype' => 'multipart/form-data',
                            'name' => 'document_upload',
                        ])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="student_id"
                                    value="<?php echo e($student_detail->id); ?>">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('common.title'); ?><span class="text-danger"> *</span> </label>
                                            <input class="primary_input_field form-control{" type="text"
                                                name="title" value="" id="title">
                                            


                                            <span class=" text-danger" role="alert"
                                                id="amount_error">

                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field" type="text"
                                                id="placeholderPhoto" placeholder="Document"
                                                disabled>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button style="position: relative; top: 8px; right: 12px;" class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="photo">
                                                <?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="photo"
                                                id="photo">
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-lg-12 text-center mt-40">
                                <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                    <span class="ti-check"></span>
                                    save information
                                </button>
                            </div> -->
                            <div class="col-lg-12 text-center mt-40">
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg"
                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                                    </button>

                                    <button class="primary-btn fix-gr-bg submit" type="submit"><?php echo app('translator')->get('student.save'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/_document_tab.blade.php ENDPATH**/ ?>
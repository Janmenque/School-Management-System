
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('chat::chat.create_group'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="chat_main_wrapper">
                        <div class="chat_flow_list_wrapper white-box mb-3">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0"><?php echo app('translator')->get('chat::chat.chat_list'); ?></h3>
                                </div>
                                <?php if(userPermission(902)): ?>
                                    <a class="primary-btn radius_30px  fix-gr-bg" href="<?php echo e(route('chat.new')); ?>"><i class="ti-plus"></i><?php echo app('translator')->get('chat::chat.new_chat'); ?></a>
                                <?php endif; ?>
                            </div>
                            <!-- chat_list  -->
                            <side-panel-component
                                    :settings="<?php echo e(json_encode(generalSetting()->only(['teacher_phone_view', 'teacher_email_view']))); ?>"
                                    :search_url="<?php echo e(json_encode(route('chat.user.search'))); ?>"
                                    :single_chat_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                    :chat_block_url="<?php echo e(json_encode(route('chat.user.block'))); ?>"
                                    :create_group_url="<?php echo e(json_encode(route('chat.group.create'))); ?>"
                                    :group_chat_show="<?php echo e(json_encode(route('chat.group.show'))); ?>"
                                    :users="<?php echo e(json_encode($users)); ?>"
                                    :groups="<?php echo e(json_encode($myGroups)); ?>"
                                    :all_users="<?php echo e(json_encode(\App\Models\User::where('id', '!=', auth()->id())->get())); ?>"
                                    :can_create_group="<?php echo e(json_encode(createGroupPermission())); ?>"
                                    :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></side-panel-component>
                        </div>
                        <div class="chat_view_list white-box">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0"><?php echo app('translator')->get('chat::chat.create_group'); ?></h3>
                                </div>
                            </div>
                            <div class="chat_view_list_inner crm_full_height p-0">
                                <form action="<?php echo e(route('chat.group.create.store')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="chat_view_list_inner_scrolled pb-0" style="overflow: unset;">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('chat::chat.group_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field" placeholder="-" type="text" name="name" required>
                                        </div>
                                        <div class="primary_input  mt-15">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('chat::chat.group_photo'); ?> <span class="text-danger"> </span></label>
                                                        <div class="primary_file_uploader">
                                                            <input class="primary_input_field" type="text" id="placeholderGroupPhoto" placeholder="<?php echo app('translator')->get('chat::chat.group_photo'); ?>" readonly="">
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg" for="group_photo"><?php echo e(__('common.browse')); ?></label>
                                                                <input type="file" class="d-none" name="group_photo" id="group_photo">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="created_by" value="<?php echo e(auth()->id()); ?>">
                                        </div>
                                        <div class="primary_input mb-15 mt-15">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.member'); ?> <span class="text-danger"> *</span></label>
                                            <select class="primary_select select_users mb-25" name="users[]" id="" multiple required>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="primary-btn radius_30px  fix-gr-bg" href="#"><?php echo app('translator')->get('chat::chat.create_group'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.select_users').select2();
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/Chat\Resources/views/group/create.blade.php ENDPATH**/ ?>
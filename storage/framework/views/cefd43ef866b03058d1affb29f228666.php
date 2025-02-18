
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('chat::chat.group_chat_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="chat_main_wrapper">
                        <div class="chat_flow_list_wrapper ">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0"><?php echo app('translator')->get('chat::chat.chat_list'); ?></h3>
                                </div>
                                <a class="primary-btn radius_30px  fix-gr-bg" href="<?php echo e(route('chat.new')); ?>"><i class="ti-plus"></i><?php echo app('translator')->get('chat::chat.new_chat'); ?></a>
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

                        <?php if(app('general_settings')->get('chatting_method') == null || app('general_settings')->get('chatting_method')  == 'log'): ?>
                            <jquery-group-chat-component
                                    :group="<?php echo e(json_encode($group)); ?>"
                                    :send_message_url="<?php echo e(json_encode(route('chat.group.send'))); ?>"
                                    :new_message_check_url="<?php echo e(json_encode(route('chat.group.message.check'))); ?>"
                                    :add_people_url="<?php echo e(json_encode(route('chat.group.addPeople'))); ?>"
                                    :remove_people_url="<?php echo e(json_encode(route('chat.group.removePeople'))); ?>"
                                    :delete_group_url="<?php echo e(json_encode(route('chat.group.delete'))); ?>"
                                    :message_remove_url="<?php echo e(json_encode(route('chat.group.message.destroy'))); ?>"
                                    :leave_group_url="<?php echo e(json_encode(route('chat.group.leave'))); ?>"
                                    :assign_role_url="<?php echo e(json_encode(route('chat.group.role'))); ?>"
                                    :app_url="<?php echo e(json_encode(env('APP_URL'))); ?>"
                                    :user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                    :user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                    :connected_users="<?php echo e(json_encode($remainingUsers->toArray())); ?>"
                                    :all_connected_users="<?php echo e(json_encode($users)); ?>"
                                    :forward_message_url="<?php echo e(json_encode(route('chat.send.forward'))); ?>"
                                    :my_role="<?php echo e(json_encode($myRole)); ?>"
                                    :files_url="<?php echo e(json_encode(route('chat.files', ['type' => 'group', 'id' => $group->id]))); ?>"
                                    :load_more_url="<?php echo e(json_encode(route('chat.load.more.group'))); ?>"
                                    :read_only="<?php echo e(json_encode($group->read_only ? true : false)); ?>"
                                    :can_file_upload="<?php echo e(json_encode(app('general_settings')->get('chat_can_upload_file')== 'yes')); ?>"
                                    :asset_type="<?php echo e(json_encode('/public')); ?>"
                                    :single_threads="<?php echo e(json_encode($single_threads)); ?>"
                                    :make_read_only_url="<?php echo e(json_encode(route('chat.group.read.only'))); ?>"

                            ></jquery-group-chat-component>
                        <?php else: ?>
                            <group-chat-component
                                    :group="<?php echo e(json_encode($group)); ?>"
                                    :send_message_url="<?php echo e(json_encode(route('chat.group.send'))); ?>"
                                    :add_people_url="<?php echo e(json_encode(route('chat.group.addPeople'))); ?>"
                                    :remove_people_url="<?php echo e(json_encode(route('chat.group.removePeople'))); ?>"
                                    :message_remove_url="<?php echo e(json_encode(route('chat.group.message.destroy'))); ?>"
                                    :delete_group_url="<?php echo e(json_encode(route('chat.group.delete'))); ?>"
                                    :leave_group_url="<?php echo e(json_encode(route('chat.group.leave'))); ?>"
                                    :assign_role_url="<?php echo e(json_encode(route('chat.group.role'))); ?>"
                                    :app_url="<?php echo e(json_encode(env('APP_URL'))); ?>"
                                    :user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                    :user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                    :connected_users="<?php echo e(json_encode($remainingUsers->toArray())); ?>"
                                    :all_connected_users="<?php echo e(json_encode($users)); ?>"
                                    :forward_message_url="<?php echo e(json_encode(route('chat.send.forward'))); ?>"
                                    :my_role="<?php echo e(json_encode($myRole)); ?>"
                                    :files_url="<?php echo e(json_encode(route('chat.files', ['type' => 'group', 'id' => $group->id]))); ?>"
                                    :load_more_url="<?php echo e(json_encode(route('chat.load.more.group'))); ?>"
                                    :read_only="<?php echo e(json_encode($group->read_only ? true : false)); ?>"
                                    :can_file_upload="<?php echo e(json_encode(app('general_settings')->get('chat_can_upload_file')== 'yes')); ?>"
                                    :asset_type="<?php echo e(json_encode('/public')); ?>"
                                    :single_threads="<?php echo e(json_encode($single_threads)); ?>"
                                    :make_read_only_url="<?php echo e(json_encode(route('chat.group.read.only'))); ?>"
                            ></group-chat-component>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/Chat\Resources/views/group/show.blade.php ENDPATH**/ ?>
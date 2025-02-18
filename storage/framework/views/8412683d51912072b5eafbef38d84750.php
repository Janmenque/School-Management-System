
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.search_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="chat_main_wrapper">
                        <div class="white-box">
                        <side-panel-component
                                :settings="<?php echo e(json_encode(generalSetting()->only(['teacher_phone_view', 'teacher_email_view']))); ?>"
                            :search_url="<?php echo e(json_encode(route('chat.user.search'))); ?>"
                            :single_chat_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                            :chat_block_url="<?php echo e(json_encode(route('chat.user.block'))); ?>"
                            :create_group_url="<?php echo e(json_encode(route('chat.group.create'))); ?>"
                            :group_chat_show="<?php echo e(json_encode(route('chat.group.show'))); ?>"
                            :users="<?php echo e(json_encode($users)); ?>"
                            :groups="<?php echo e(json_encode(collect())); ?>"
                            :all_users="<?php echo e(json_encode(\App\Models\User::where('id', '!=', auth()->id())->get())); ?>"
                            :can_create_group="<?php echo e(json_encode(createGroupPermission())); ?>"
                            :asset_type="<?php echo e(json_encode('/public')); ?>"
                        ></side-panel-component>
                        </div>
                        <div class="chat_flow_list_wrapper white-box">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0"><?php echo e(__('common.search_result_of')); ?> '<?php echo e($keywords); ?>'</h3>
                                </div>
                            </div>
                            <!-- chat_list  -->
                            <div class="chat_flow_list crm_full_height">

                                <div class="main-title2 mt-0">
                                    <h4 class=""><?php echo app('translator')->get('common.people'); ?></h4>
                                </div>

                                <div class="chat_flow_list_inner">
                                    <ul class="list-unstyled">
                                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li>
                                            <div class="single_list d-flex align-items-center">
                                                <div class="thumb">
                                                    <?php if($user->avatar): ?>
                                                        <img src="<?php echo e(asset($user->avatar)); ?>" alt="">
                                                    <?php elseif($user->avatar_url): ?>
                                                        <img src="<?php echo e(asset($user->avatar_url)); ?>" alt="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/chat/images/spondon-icon.png')); ?>" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="list_name">
                                                    <a><h4><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <span class="active_chat" ></span> </h4></a>
                                                </div>
                                                <div>
                                                    <?php if(app('general_settings')->get('chat_open') == 'yes' || app('general_settings')->get('chat_invitation_requirement') == 'none'): ?>
                                                        <form action="<?php echo e(route('chat.invitation.open')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" value="<?php echo e($user->id); ?>" name="to">
                                                            <a class="primary-btn radius_30px  fix-gr-bg" onclick="$(this).closest('form').submit();" href="#">
                                                                <?php echo app('translator')->get('common.start'); ?> open
                                                            </a>
                                                        </form>
                                                    <?php elseif(app('general_settings')->get('chat_invitation_requirement') == 'required' && app('general_settings')->get('chat_admin_can_chat_without_invitation') == 'yes' && auth()->user()->roles->name == 'Super admin'): ?>
                                                        <form action="<?php echo e(route('chat.invitation.open')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" value="<?php echo e($user->id); ?>" name="to">
                                                            <a class="primary-btn radius_30px  fix-gr-bg" onclick="$(this).closest('form').submit();" href="#">
                                                                <?php echo app('translator')->get('common.start'); ?>
                                                            </a>
                                                        </form>
                                                    <?php else: ?>
                                                        <?php if(!$user->connectedWithLoggedInUser()): ?>
                                                            <form action="<?php echo e(route('chat.invitation.create')); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" value="<?php echo e($user->id); ?>" name="to">
                                                                <a href="#" onclick="$(this).closest('form').submit();" class="single-icon primary-btn small fix-gr-bg">
                                                                    <span class="ti-plus pr-2"></span>
                                                                </a>
                                                            </form>
                                                        <?php else: ?>
                                                            <?php if($user->connectionPending()): ?>
                                                                <p class="single-icon primary-btn small fix-gr-bg text-white">
                                                                    <span class="ti-timer pr-2"></span>
                                                                </p>
                                                            <?php elseif($user->connectionSuccess()): ?>
                                                                <p class="single-icon primary-btn small fix-gr-bg text-white">
                                                                    <span class="ti-check pr-2"></span>
                                                                </p>
                                                            <?php else: ?>
                                                                <p class="single-icon primary-btn small fix-gr-bg text-white">
                                                                    <span class="ti-close pr-2"></span>
                                                                </p>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="modal fade admin-query" id="profileEditForm<?php echo e($index); ?>" aria-modal="true">
                                                <div class="modal-dialog modal_800px modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                <div class="thumb" style="display: inline">
                                                                    <a href="#"><img src="<?php echo e(asset($user->avatar)); ?>" height="50" width="50" alt=""></a>
                                                                </div>
                                                                <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <i class="ti-close "></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.username'); ?> <span class="text-danger"> *</span></label>
                                                                        <input name="name" disabled class="primary_input_field name" placeholder="Name" value="<?php echo e($user->username); ?>" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.email'); ?> <span class="text-danger"> *</span></label>
                                                                        <input name="email" class="primary_input_field name" disabled placeholder="Email" value="<?php echo e($user->email); ?>" type="email" readonly="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.phone'); ?></label>
                                                                        <input name="username" class="primary_input_field name" disabled value="<?php echo e($user->phone); ?>" type="text" readonly="">
                                                                    </div>
                                                                    <?php if($user->blockedByMe()): ?>
                                                                        <a href="<?php echo e(route('chat.user.block', ['type' => 'unblock', 'user' => $user->id])); ?>" class="primary-btn small fix-gr-bg"><span class="ripple rippleEffect" style="width: 30px; height: 30px; top: -6.99219px; left: 19.2578px;"></span>
                                                                            <?php echo app('translator')->get('chat::chat.unblock_user'); ?>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a href="<?php echo e(route('chat.user.block', ['type' => 'block', 'user' => $user->id])); ?>" class="primary-btn small fix-gr-bg"><span class="ripple rippleEffect" style="width: 30px; height: 30px; top: -6.99219px; left: 19.2578px;"></span>
                                                                            <?php echo app('translator')->get('chat::chat.block_this_user'); ?>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?></label>
                                                                        <p>
                                                                            <?php echo e($user->description); ?>

                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p><?php echo app('translator')->get('chat::chat.no_user_found'); ?>!</p>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!--/ chat_list  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/Chat\Resources/views/user/search_result.blade.php ENDPATH**/ ?>
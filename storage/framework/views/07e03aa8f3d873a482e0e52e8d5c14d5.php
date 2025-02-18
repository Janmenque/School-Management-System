<div class="row mt-5">
    <div class="col-lg-12">
        <div class="contacts_form">
            <div class="section_title">
                <span class="section_title_meta"><?php echo e(pagesetting('sub_heading')); ?></span>
                <h2><?php echo e(pagesetting('heading')); ?></h2>
            </div>
            
            <div class="contacts_form_flex">
                <div class="input-control">
                    <input type="text" class="input-control-input"
                        placeholder='<?php echo e(pagesetting('name_placeholder')); ?>'
                        name="name" id="name" required>

                    <span id="nameError" class="text-danger ft"></span>
                </div>
                <div class="input-control">
                    <input type="tel" class="input-control-input"
                        placeholder='<?php echo e(pagesetting('phone_placeholder')); ?>'
                        name="phone" id="phone" required>

                    <span id="phoneError" class="text-danger ft"></span>
                </div>
            </div>
            <div class="contacts_form_flex">
                <div class="input-control">
                    <input type="email" class="input-control-input"
                        placeholder='<?php echo e(pagesetting('email_placeholder')); ?>' id="email"
                        name="email" required>

                    <span id="emailError" class="text-danger ft"></span>
                </div>
                <div class="input-control">
                    <input type="tel" class="input-control-input"
                        placeholder='<?php echo e(pagesetting('subject_placeholder')); ?>'
                        id="subject" name="subject"
                        required>

                    <span id="subjectError" class="text-danger ft"></span>
                </div>
            </div>
            <div class="input-control">
                <textarea class="input-control-input" name="message" id="message"
                    placeholder='<?php echo e(pagesetting('message_placeholder')); ?>' required></textarea>

                <span id="messageError" class="text-danger ft"></span>
            </div>
            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
            <div class="input-control">
                <input type="submit" id="click_btn" class="input-control-input"
                    value="<?php echo e(pagesetting('button_text')); ?>">
            </div>
            <p class=" mt-3 text-success"></p>
            <p class=" mt-3 text-danger"></p>
            
        </div>
    </div>
</div>
<?php if (! $__env->hasRenderedOnce('0382bad1-eea7-4e64-9def-d9623ca65aed')): $__env->markAsRenderedOnce('0382bad1-eea7-4e64-9def-d9623ca65aed');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $(document).ready(function() {
            $("#click_btn").click(function() {
                let url = $('#url').val();
                let name = $('#name').val();
                let phone = $('#phone').val();
                let email = $('#email').val();
                let subject = $('#subject').val();
                let message = $('#message').val();
                $.ajax({
                    url: url + '/' + 'edulia-send-message',
                    method: "GET",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        subject: subject,
                        message: message,
                    },
                    success: function(result) {
                            $('#name').val('');
                            $('#phone').val('');
                            $('#email').val('');
                            $('#subject').val('');
                            $('#message').val('');
                            $('.primary_input_field').removeClass('has-content');
                            $('.text-success').html('Email Sent Successfully');
                            $('.ft').html('');
                    },
                    error: function(xhr) {
                        $('#nameError').html(xhr.responseJSON.errors.name);
                        $('#phoneError').html(xhr.responseJSON.errors.phone);
                        $('#emailError').html(xhr.responseJSON.errors.email);
                        $('#subjectError').html(xhr.responseJSON.errors.subject);
                        $('#messageError').html(xhr.responseJSON.errors.message);
                    }
                })
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/contact-from/view.blade.php ENDPATH**/ ?>
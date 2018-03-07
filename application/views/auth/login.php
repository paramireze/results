<br />
<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
        <div class="card text-white p-5 bg-primary">
            <div class="card-body">
                <h1 class="mb-4"><?php echo lang('login_heading');?></h1>
                <p><?php echo lang('login_subheading');?></p>

                <?php echo form_open("auth/login");?>
                    <div class="form-group"> <label> <?php echo lang('login_identity_label', 'identity');?></label>
                       <br/> <?php

                        $identity['class'] = 'form-control';
                        echo form_input($identity);?> </div>
                    <div class="form-group"> <label><?php echo lang('login_password_label', 'password');?></label>
                        <br />
                        <?php
                        $password['class'] = 'form-control';
                        echo form_input($password);?></div>
                    <div class="form-group"> <p>
                        <?php echo lang('login_remember_label', 'remember');?>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                    </p></div>
                <?php
                $submit['class'] = 'btn btn-secondary';
                $submit['value'] = 'submit';

                echo form_submit($submit, lang('login_submit_btn'));?>
                <?php echo form_close();?>
                <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
            </div>
        </div>
    </div>
</div>
<br/>
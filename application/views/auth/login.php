<h1 align="center">Login to account</h1>
<div class="generic-form">
    <div class="row">
        <div class="large-10 large-centered columns">
            <?php echo $this->message->display(); ?>
            <?php echo form_open("auth/login"); ?>
            <label for="email">E-mail Address</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
            <?php echo form_error('email','<small class="error">','</small>'); ?>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo set_value('password'); ?>"/>
            <?php echo form_error('password','<small class="error">','</small>'); ?>
            <p><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me on this computer</p>
            <input type="submit" name="submit-button" value="Login to Account" class="button paruto"/>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
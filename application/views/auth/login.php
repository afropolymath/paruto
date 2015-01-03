<h1 align="center">Login to account</h1>
<div class="generic-form">
    <div class="row">
        <div class="large-10 large-centered columns">
            <?= $this->message->display(); ?>
            <?= form_open("auth/login"); ?>
            <label for="email">E-mail Address</label>
            <input type="text" name="email" value="<?= set_value('email'); ?>"/>
            <?= form_error('email','<small class="error">','</small>'); ?>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?= set_value('password'); ?>"/>
            <?= form_error('password','<small class="error">','</small>'); ?>
            <p><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me on this computer</p>
            <input type="submit" name="submit-button" value="Login to Account" class="button paruto"/>
            <?= form_close(); ?>
        </div>
    </div>
</div>
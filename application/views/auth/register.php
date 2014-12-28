<h1 align="center">Sign Up to Paruto</h1>
<div class="generic-form">
    <div class="large-10 large-centered columns">
        <?= $this->message->display(); ?>
        <?= form_open("auth/register"); ?>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?= set_value('first_name',''); ?>" class="mt-form-control radius"/>
        <?= form_error('first_name','<small class="error">','</small>'); ?>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?= set_value('last_name',''); ?>" class="mt-form-control radius"/>
        <?= form_error('last_name','<small class="error">','</small>'); ?>
        <label for="email">E-mail Address</label>
        <input type="text" name="email" value="<?= set_value('email',''); ?>" class="mt-form-control radius"/>
        <?= form_error('email','<small class="error">','</small>'); ?>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?= set_value('password',''); ?>" class="mt-form-control radius"/>
        <?= form_error('password','<small class="error">','</small>'); ?>
        <label for="password_conf">Confirm Password</label>
        <input type="password" name="password_conf" value="<?= set_value('password_conf',''); ?>" class="mt-form-control radius"/>
        <?= form_error('password_conf','<small class="error">','</small>'); ?>

        <label for="username">What would you like to be called?</label>
        <input type="text" name="username" value="<?= set_value('username',''); ?>" class="mt-form-control radius"/>
        <?= form_error('username','<small class="error">','</small>'); ?>

        <label><input type="checkbox" name="agreement"/> I agree with the terms and conditions</label>
        <input type="submit" name="submit-button" value="Create Account" class="button radius"/>
        <?= form_close(); ?>
    </div>
</div>
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<h1>Sign Up for you own StudyPen account</h1>
<div class="generic-form">
    <div class="row">
        <div class="large-10 large-centered columns">
            <?= $this->message->display(); ?>
            <?= form_open("auth/register"); ?>
            <label for="first_name">Full Name</label>
            <input type="text" name="first_name" value="<?= set_value('first_name',''); ?>"/>
            <?= form_error('first_name','<small class="error">','</small>'); ?>
            <label for="last_name">Full Name</label>
            <input type="text" name="last_name" value="<?= set_value('last_name',''); ?>"/>
            <?= form_error('last_name','<small class="error">','</small>'); ?>
            <label for="email">E-mail Address</label>
            <input type="text" name="email" value="<?= set_value('email',''); ?>"/>
            <?= form_error('email','<small class="error">','</small>'); ?>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?= set_value('password',''); ?>"/>
            <?= form_error('password','<small class="error">','</small>'); ?>
            <label for="password_conf">Confirm Password</label>
            <input type="password" name="password_conf" value="<?= set_value('password_conf',''); ?>"/>
            <?= form_error('password_conf','<small class="error">','</small>'); ?>

            <label for="username">Create you pseudonym</label>
            <input type="text" name="username" value="<?= set_value('username',''); ?>"/>
            <?= form_error('username','<small class="error">','</small>'); ?>

            <label><input type="checkbox" name="agreement"/> I agree with the terms and conditions</label>
            <input type="submit" name="submit-button" value="Create Account" class="button"/>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<h1 class="section-header">Your Dashboard</h1>
<?php echo $this->message->display(); ?>
<!-- Tab Menu -->
<dl class="tabs" data-tab>
  <dd class="active"><a href="#stories">Stories</a></dd>
  <dd><a href="#profile">Profile</a></dd>
</dl>

<!-- Tab Content -->
<div class="tabs-content">

  <!-- Stories Tab -->
  <div class="content active" id="stories">
  <?php if(isset($user_stories) && count($user_stories) > 0): ?>
    <div class="alert-box secondary radius">You have created <?php echo count($user_stories); ?> stories. <strong><?php echo anchor('stories/create', 'Create one more'); ?></strong></div>
    <?php foreach($user_stories as $story): ?>
      <div class="profile-story">
        <h2><?php echo anchor('stories/view/'.$story->id, $story->headline); ?></h2>
        <h3>
          <div class="dashboard-actions right">
          <a href="#" class="display-stats">Stats</a>
          <a href="">Edit Story</a>
          <?php echo anchor('stories/delete/'.$story->id, 'Delete Story', [ 'data-reveal-id' => 'confirm-modal', 'data-reveal-ajax' => 'true']); ?>
          </div>
          Authored <em><?php echo time2str($story->date_created); ?></em>. Happening in <a href=""><?php echo $story->state; ?></a>
        </h3>
        <div class="stats">
          <?php $sum = $story->upvote + $story->downvote; ?>
          <?php $score = $sum == 0 ? 0 : $story->upvote/$sum * 100; ?>
          <h1>Score: <?php echo $score; ?>%</h1>
          <div class="progress" style="background: #FF3300">
            <div class="bar" style="width:<?php echo $score; ?>%; background: #3aa044"></div>
          </div>
          <h3><span class="upvote"><?php echo $story->upvote; ?></span><span class="downvote"><?php echo $story->downvote; ?></span></h3>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="alert-box info radius">You have not created any stories. <strong><?php echo anchor('stories/create', 'Create one now'); ?></strong></div>
  <?php endif; ?>
  </div>

  <!-- Profile Tab -->
  <div class="content" id="profile">
    <div class="profile-information">
      <?php echo form_open('users/update/', ['id' => 'save-profile-form']); ?>
      <label for="first_name">First name</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius" value="<?php echo set_value('first_name', $logged_in_user->first_name); ?>" id="first_name"/>
      <div class="first_name-error error-field hide"><ul></ul></div>
      <label for="last_name">Last name</label>
      <input type="text" name="last_name" class="mt-form-control-medium radius" value="<?php echo set_value('last_name', $logged_in_user->last_name); ?>" id="last_name"/>
      <div class="last_name-error error-field hide"><ul></ul></div>
      <label for="username">Pseudonym <em>(This is what we'll call you)</em></label>
      <input type="text" name="username" class="mt-form-control-medium radius" value="<?php echo set_value('username', $logged_in_user->username); ?>" id="username"/>
      <div class="username-error error-field hide"><ul></ul></div>
      <!-- <label for="firstname">Select your profile image</label>
      <div class="image-setting">
        <div class="profile-image"></div>
        <div class="upload-form">
          <input type="file"/>
          <button type="submit" class="button tiny radius" id="create-story" style="margin-top:1em">Save Changes</button>
        </div>
      </div> -->
      <label for="about">A little about me <em>(Optional)</em></label>
      <textarea name="about" class="mt-form-control-medium radius" style="height:200px;" placeholder="A short description about you" id="about"><?php echo set_value('about', $profile->about); ?></textarea>
      <h2>How can people reach you</h2>
      <label for="twitter">Twitter Handle <em>(Optional)</em></label>
      <input type="text" name="twitter" class="mt-form-control-medium radius" id="twitter" value="<?php echo set_value('twitter', $profile->twitter); ?>"/>
      <label for="linkedin">LinkedIn Public Profile Line <em>(Optional)</em></label>
      <input type="text" name="linkedin" class="mt-form-control-medium radius" id="linkedin" value="<?php echo set_value('linkedin', $profile->linkedin); ?>"/>
      <label for="instagram">Instagram <em>(Optional)</em></label>
      <input type="text" name="instagram" class="mt-form-control-medium radius" id="instagram" value="<?php echo set_value('instagram', $profile->instagram); ?>"/>
      <button type="submit" class="button paruto large radius" id="create-story" style="margin-top:1em">Save Changes</button>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
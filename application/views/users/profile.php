<h1 class="section-header">Profile of <?php echo $user->username; ?></h1>
<?php echo $this->message->display(); ?>
<h2>Summary</h2>
<p class="summary-title">Name</p>
<p class="summary-content"><?php echo $user->first_name . " " . $user->last_name ; ?>
<p class="summary-title">About</p>
<p class="summary-content"><?php echo isset($profile->about) ? $profile->about : "No about information"; ?>
<div class="row collapse">
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-twitter"></i> Twitter</p>
    <p class="summary-content"><?php echo isset($profile->twitter) ? anchor("http://" . $profile->twitter) : "<em>Not available</em>"; ?>
  </div>
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-linkedin"></i> LinkedIn</p>
    <p class="summary-content"><?php echo isset($profile->linkedin) ? anchor("http://" . $profile->linkedin) : "<em>Not available</em>"; ?>
  </div>
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-instagram"></i> Instagram</p>
    <p class="summary-content"><?php echo isset($profile->instagram) ? anchor("http://" . $profile->instagram) : "<em>Not available</em>"; ?>
  </div>
</div>
<h2>Recent from this user</h2>
<?php if(isset($user_stories) && count($user_stories) > 0): ?>
  <?php foreach ($user_stories as $story): ?>
    <?php if($story->anonymous != 1): ?>
      <div class="user-story">
        <h3><?php echo $story->headline; ?></h3>
        <?php echo anchor('stories/view/'.$story->id, "View Story &raquo;", ['class' => 'secondary button round']); ?>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php else: ?>
  <div class="alert-box info radius">This user has no recent stories.</div>
<?php endif; ?>
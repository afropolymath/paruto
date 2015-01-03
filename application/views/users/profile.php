<h1 class="section-header">Profile of <?= $this_user->username; ?></h1>
<?= $this->message->display(); ?>
<h2>Summary</h2>
<p class="summary-title">Name</p>
<p class="summary-content"><?= $this_user->first_name . " " . $this_user->last_name ; ?>
<p class="summary-title">About</p>
<p class="summary-content"><?= $this_user_profile->about; ?>
<div class="row collapse">
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-twitter"></i> Twitter</p>
    <p class="summary-content"><?= isset($this_user_profile->twitter) ? anchor("http://" . $this_user_profile->twitter) : "<em>Not available</em>"; ?>
  </div>
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-linkedin"></i> LinkedIn</p>
    <p class="summary-content"><?= isset($this_user_profile->linkedin) ? anchor("http://" . $this_user_profile->linkedin) : "<em>Not available</em>"; ?>
  </div>
  <div class="large-4 columns">
    <p class="summary-title"><i class="fi-social-instagram"></i> Instagram</p>
    <p class="summary-content"><?= isset($this_user_profile->instagram) ? anchor("http://" . $this_user_profile->instagram) : "<em>Not available</em>"; ?>
  </div>
</div>
<h2>Recent from this user</h2>
<? if(isset($this_user_stories) && count($this_user_stories) > 0): ?>
  <? foreach ($this_user_stories as $story): ?>
    <div class="user-story">
      <h3><?= $story->headline; ?></h3>
      <?= anchor('stories/view/'.$story->id, "View Story &raquo;", ['class' => 'secondary button round']); ?>
    </div>
  <? endforeach; ?>
<? else: ?>
  <div class="alert-box info radius">This user has no recent stories.</div>
<? endif; ?>
<h1 class="section-header">Your Dashboard</h1>
<?= $this->message->display(); ?>
<dl class="tabs" data-tab>
  <dd class="active"><a href="#stories">Stories</a></dd>
  <dd><a href="#profile">Profile</a></dd>
  <dd><a href="#settings">Settings</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="stories">
  <? if(isset($user_stories) && count($user_stories) > 0): ?>
    <div class="alert-box secondary radius">You have created <?= count($user_stories); ?> stories. <strong><?= anchor('stories/create', 'Create one more'); ?></strong></div>
    <? foreach($user_stories as $story): ?>
      <div class="profile-story">
        <h2><?= $story->headline; ?></h2>
        <h3>
          <div class="dashboard-actions right">
          <a href="#" class="display-stats">Stats</a>
          <a href="">Comments</a>
          <a href="">Edit Story</a>
          <?= anchor('stories/delete/'.$story->id, 'Delete Story', ['class' => 'delete-story']); ?>
          </div>
          Authored <em><?= time2str($story->created_on); ?></em>. Happening in <a href=""><?= $story->state; ?></a>
        </h3>
        <div class="stats">
          <h1>Score: 90%</h1>
          <div class="progress" style="background: #FF3300">
            <div class="bar" style="width:90%; background: #3aa044"></div>
          </div>
          <h3><span class="upvote">45</span><span class="downvote">9</span></h3>
        </div>
      </div>
    <? endforeach; ?>
  <? else: ?>
    <div class="alert-box info radius">You have not created any stories. <strong><?= anchor('stories/create', 'Create one now'); ?></strong></div>
  <? endif; ?>
  </div>
  <div class="content" id="profile">
    <div class="profile-information">
      <label for="firstname">First name</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius"/>
      <label for="firstname">Last name</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius"/>
      <label for="firstname">Pseudonym</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius"/>
      <label for="firstname">Select your profile image</label>
      <div class="image-setting">
        <div class="profile-image"></div>
        <div class="upload-form">
          <input type="file"/>
          <button type="submit" class="button tiny radius" id="create-story" style="margin-top:1em">Save Changes</button>
        </div>
      </div>
      <label for="firstname">A little about me</label>
      <textarea name="first_name" class="mt-form-control-medium radius" style="height:200px;"></textarea>
      <label for="firstname">Twitter Handle</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius"/>

      <label for="firstname">LinkedIn Public Profile Line</label>
      <input type="text" name="first_name" class="mt-form-control-medium radius"/>
      <button type="submit" class="button paruto large radius" id="create-story" style="margin-top:1em">Save Changes</button>
    </div>
  </div>
  <div class="content" id="settings">
    <h2>Privacy</h2>
    <p><input type="checkbox"/> This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p><h2>Privacy</h2>
    <p><input type="checkbox"/> This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
  </div>
</div>
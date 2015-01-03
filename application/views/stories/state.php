<div style="position: relative">
  <div class="state-select-menu right">
    <a href="#">Filter by state</a>
    <div class="state-select-menu-items">
      <div class="small-3 columns"><?= anchor('stories/state/abia', 'Abia (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('stories/state/adamawa', 'Adamawa (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('stories/state/akwa-ibom', 'Akwa-Ibom (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('#', 'Anambra (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('#', 'Bauchi (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('#', 'Bayelsa (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('#', 'Benue (0)'); ?></div>
      <div class="small-3 columns"><?= anchor('#', 'Borno (0)'); ?></div>
    </div>
  </div>
  <h1 class="section-header">
    Stories from <?= ucwords($state); ?>
  </h1>
</div>
<? if(isset($stories) && count($stories) > 0): ?>
    <? foreach($stories as $story): ?>
    <div class="story-mode">
      <!-- First Character in the name of the state -->
      <div class="state"><?= strtoupper($story->state[0]); ?></div>
      <div class="stats">
        <?= anchor('stories/vote/'.$story->id.'/0', "&nbsp;", ['class' => 'downvote vote-post-trigger']); ?>
        <?= anchor('stories/vote/'.$story->id.'/1', "&nbsp;", ['class' => 'upvote vote-post-trigger']); ?>
      </div>
      <h1><?= anchor('stories/view/'.$story->id, ucwords($story->state) . " - " . $story->headline); ?></h1>
      <? if($story->type === 'image'): ?><img src="<?= $story->image ?>"/><? endif ?>
      <p><?= $story->story; ?></p>
      <div class="meta-information">
        <div class="right actions">
          <?= anchor('stories/view/'.$story->id, 'Entire Story', ['class' => 'button small secondary radius']); ?>
        </div>
        <div class="score"><i class="fi-comment"></i> 0</div>
        <div class="score"><?= "+" . $story->upvote; ?></div>
        <div class="score"><?= "-" . $story->downvote; ?></div>
        <div class="avatar"></div>
        <div class="avatar-information">
          <p class="poster"><em><?= $story->anonymous == 1 ? "Anonymous" : anchor('users/profile/'.$story->user_id, $story->username); ?></em> authored <?= time2str(strtotime($story->date_created), time()); ?></p>
        </div>
      </div>
    </div>
    <? endforeach ?> 
<? else: ?>
    <div class="alert-box info radius">There are currently no stories for this state</div>
<? endif ?>
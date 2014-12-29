<h1 class="section-header">Stories on Paruto</h1>
<? if(isset($stories) && count($stories) > 0): ?>
    <? foreach($stories as $story): ?>
    <div class="story-mode">
      <!-- First Character in the name of the state -->
      <div class="state"><?= $story->state[0]; ?></div>
      <div class="stats">
        <?= anchor('stories/vote/'.$story->id.'/0', "&nbsp;", ['class' => 'downvote vote-post-trigger']); ?>
        <?= anchor('stories/vote/'.$story->id.'/1', "&nbsp;", ['class' => 'upvote vote-post-trigger']); ?>
      </div>
      <h1><?= $story->state . " - " . $story->headline; ?></h1>
      <? if($story->type === 'image'): ?><img src="<?= $story->image ?>"/><? endif ?>
      <p><?= $story->story; ?></p>
      <div class="meta-information">
        <div class="right actions">
          <?= anchor('stories/view/'.$story->id, 'Entire Story', ['class' => 'button small secondary radius']); ?>
          <?= anchor('stories/view/'.$story->id.'#disqus_thread', 'Comments', ['class' => 'button small secondary radius']); ?>
        </div>
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
    <div class="alert-box info radius">There are currently no stories on Paruto</div>
<? endif ?>
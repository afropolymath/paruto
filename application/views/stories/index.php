<h1 class="section-header">Stories on Paruto</h1>
<? if(isset($stories) && count($stories) > 0): ?>
    <? foreach($stories as $story): ?>
    <div class="story-mode">
      <!-- First Character in the name of the state -->
      <div class="state"><?= $story->state[0]; ?></div>
      <div class="stats">
        <a class="downvote"></a>
        <a class="upvote"></a>
      </div>
      <h1><?= $story->state . " - " . $story->headline; ?></h1>
      <? if($story->type === 'image'): ?><img src="<?= $story->image ?>"/><? endif ?>
      <p><?= $story->story; ?></p>
      <div class="meta-information">
        <div class="right actions">
          <a class="button small secondary radius">Comments</a>
          <a class="button small secondary radius">Entire story</a>
        </div>
        <div class="score">0</div>
        <div class="avatar"></div>
        <div class="avatar-information">
          <p class="poster"><em><a href="#">Chidiebere Nnadi</a></em> authored <?= time2str(strtotime($story->created_on), time()); ?></p>
        </div>
      </div>
    </div>
    <? endforeach ?> 
<? else: ?>
    <div class="alert-box info radius">There are currently no stories on Paruto</div>
<? endif ?>
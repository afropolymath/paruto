<h1>Recent Stories</h1>
<? foreach($recent as $story): ?>
<div class="sidebar-story">
  <? $sum = $story->upvote + $story->downvote; ?>
  <? $score = $sum == 0 ? 0 : $story->upvote/$sum * 100; ?>
  <h2><?= anchor('stories/view/'.$story->id, $story->headline); ?></h2>
  <p><?= word_limiter(strip_tags($story->story), 100); ?>...</p>
  <div class="stats"><i class="fi-eye"></i> Viewed <?= $story->views; ?> times</div>
  <div class="stats">Comments</div>
</div>
<? endforeach; ?>
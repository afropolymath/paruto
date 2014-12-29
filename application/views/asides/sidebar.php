<h1>Happening around you</h1>
<? foreach($recent as $story): ?>
<div class="sidebar-story">
  <? $sum = $story->upvote + $story->downvote; ?>
  <? $score = $sum == 0 ? 0 : $story->upvote/$sum * 100; ?>
  <h2><?= anchor('stories/view/'.$story->id, $story->headline); ?></h2>
  <p><?= substr($story->story, 0, 200); ?></p>
  <div class="stats">Viewed <?= $story->views; ?> times</div>
</div>
<? endforeach; ?>
<h1>Recent Stories</h1>
<? foreach($recent as $story): ?>
<div class="sidebar-story">
  <? $sum = $story->upvote + $story->downvote; ?>
  <? $score = $sum == 0 ? 0 : $story->upvote/$sum * 100; ?>
  <h2><?= $story->headline; ?></h2>
  <div class="stats">Viewed <?= $story->views; ?> times</div>
</div>
<? endforeach; ?>
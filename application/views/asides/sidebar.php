<h1>Recent Stories</h1>
<?php foreach($recent as $story): ?>
<div class="sidebar-story">
  <?php $sum = $story->upvote + $story->downvote; ?>
  <?php $score = $sum == 0 ? 0 : $story->upvote/$sum * 100; ?>
  <h2><?php echo anchor('stories/view/'.$story->id, $story->headline); ?></h2>
  <p><?php echo word_limiter(strip_tags($story->story), 100); ?>...</p>
  <div class="stats"><i class="fi-eye"></i> Viewed <?php echo $story->views; ?> times</div>
  <div class="stats">Comments</div>
</div>
<?php endforeach; ?>
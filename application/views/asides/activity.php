<h1>Your Activity</h1>
<?php if(isset($activities) && count($activities) > 0): ?>
  <ul class="activity-list">
  <?php foreach($activities as $activity): ?>
    <li>You <?php echo format_activity($activity); ?> <em><?php echo time2str($activity->date_created)?></em></li>
  <?php endforeach; ?>
    <li><a href="">View my activity history</a></li>
  </ul>
<?php else: ?>
  <div style="padding: 1em">
    <div class="alert-box info radius">You have no recent activity</div>
  </div>
<?php endif; ?>
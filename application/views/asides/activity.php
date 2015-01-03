<h1>Your Activity</h1>
<? if(isset($activities) && count($activities) > 0): ?>
  <ul class="activity-list">
  <? foreach($activities as $activity): ?>
    <li>You <?= format_activity($activity); ?> <em><?= time2str($activity->date_created)?></em></li>
  <? endforeach; ?>
    <li><a href="">View my activity history</a></li>
  </ul>
<? else: ?>
  <div style="padding: 1em">
    <div class="alert-box info radius">You have no recent activity</div>
  </div>
<? endif; ?>
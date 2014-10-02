<h1 class="section-header">Stories on Paruto</h1>
<? if(isset($stories) && count($stories) > 0): ?>
	<? foreach($stories as $story): ?>
	<div class="story-mode">
		<h1><?= $story->headline; ?></h1>
		<? if($story->type === 'image'): ?><img src="<?= $story->image ?>"/><? endif ?>
		<p><?= $story->story; ?></p>
		<div class="meta-information">Posted by User on <?= $story->date_created ?></div>
	</div>
	<? endforeach ?> 
<? else: ?>
	<div class="alert-box info radius">There are currently no stories on Paruto</div>
<? endif ?>
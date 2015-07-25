<div class="story-view">
  <h1><?php echo ucwords($story->state) . " - " . $story->headline; ?></h1>
  <?php if($story->type === 'image'): ?><img src="<?php echo $story->image ?>"/><?php endif ?>
  <p><?php echo $story->story; ?></p>
  <div class="meta-information">
    <div class="score"><?php echo "+" . $story->upvote; ?></div>
    <div class="score"><?php echo "-" . $story->downvote; ?></div>
    <div class="avatar"></div>
    <div class="avatar-information">
      <p class="poster"><em><?php echo $story->anonymous == 1 ? "Anonymous" : anchor('users/profile/'.$author->id, $author->username); ?></em> authored <?php echo time2str(strtotime($story->date_created), time()); ?></p>
    </div>
  </div>
  <div class="story-comments">
    <div id="disqus_thread"></div>
      <script type="text/javascript">
          /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
          var disqus_shortname = 'paruto'; // required: replace example with your forum shortname

          /* * * DON'T EDIT BELOW THIS LINE * * */
          (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
</div>
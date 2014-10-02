<h1 class="section-header">Your Dashboard</h1>
<?= $this->message->display(); ?>
<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel1"><i class="fi-page-multiple"></i> Your Stories</a></dd>
  <dd><a href="#panel2"><i class="fi-torso"></i> Your Profile</a></dd>
  <dd><a href="#panel3"><i class="fi-wrench"></i> Settings</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel1">
    <p>This is the first panel of the basic tab example. This is the first panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel2">
    <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel3">
    <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
  </div>
</div>
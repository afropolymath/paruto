<h1 class="section-header">Create New Story</h1>
<?= form_open('stories/create', ['id' => 'create-story-form']); ?>
<div class="form-create-errors hide"></div>
<label for="headline" class="sr-label">Enter Headline</label>
<input type="text" name="headline" value="<?= set_value('headline'); ?>" class="mt-form-control radius" id="headline" placeholder="Enter your headline"/>
<div class="headline-error error-field hide"><ul></ul></div>
<h2 class="sub-section-header">Location Information</h2>
<label for="type">What state is this happening?</label>
<select name="state" id="state">
	<option value="" selected="selected">- Select -</option>
	<option value="Abuja FCT">Abuja FCT</option>
	<option value="Abia">Abia</option>
	<option value="Adamawa">Adamawa</option>
	<option value="Akwa Ibom">Akwa Ibom</option>
	<option value="Anambra">Anambra</option>
	<option value="Bauchi">Bauchi</option>
	<option value="Bayelsa">Bayelsa</option>
	<option value="Benue">Benue</option>
	<option value="Borno">Borno</option>
	<option value="Cross River">Cross River</option>
	<option value="Delta">Delta</option>
	<option value="Ebonyi">Ebonyi</option>
	<option value="Edo">Edo</option>
	<option value="Ekiti">Ekiti</option>
	<option value="Enugu">Enugu</option>
	<option value="Gombe">Gombe</option>
	<option value="Imo">Imo</option>
	<option value="Jigawa">Jigawa</option>
	<option value="Kaduna">Kaduna</option>
	<option value="Kano">Kano</option>
	<option value="Katsina">Katsina</option>
	<option value="Kebbi">Kebbi</option>
	<option value="Kogi">Kogi</option>
	<option value="Kwara">Kwara</option>
	<option value="Lagos">Lagos</option>
	<option value="Nassarawa">Nassarawa</option>
	<option value="Niger">Niger</option>
	<option value="Ogun">Ogun</option>
	<option value="Ondo">Ondo</option>
	<option value="Osun">Osun</option>
	<option value="Oyo">Oyo</option>
	<option value="Plateau">Plateau</option>
	<option value="Rivers">Rivers</option>
	<option value="Sokoto">Sokoto</option>
	<option value="Taraba">Taraba</option>
	<option value="Yobe">Yobe</option>
	<option value="Zamfara">Zamfara</option>
 	<option value="Outside Nigeria">Outside Nigeria</option>
</select>
<div class="state-error error-field hide"><ul></ul></div>
<!-- Location Finder -->

<!-- a href="#" class="button small radius" id="find-location"><i class="fi-marker"></i>Use my current location</a>
<div class="location-loader"><?= img('assets/img/activity.gif'); ?> <span class="txt">Loading location information...</span></div>
<div class="location-information hide"></div -->

<!-- End Location Finder -->

<h2 class="sub-section-header">Story Content</h2>
<a href="#image-upload" class="media-buttons button radius secondary icon-camera">
	<div class="arrow-image"><div class="arrow-border"></div><div class="main-arrow"></div></div>
	Add an Image
</a>
<a href="#link-input" class="media-buttons button radius secondary icon-link">
	<div class="arrow-image"><div class="arrow-border"></div><div class="main-arrow"></div></div>
	Enter link
</a>
<div class="media-selection">
	<div id="image-upload">
		<label for="media-selection">Select Image</label>
		<input type="file" name="image-content" id="image-content"/>
	</div>
	<div id="link-input">
		<label for="media-selection">Enter the link</label>
		<input type="text" name="link-content" id="link-content"/>
	</div>
</div>
<label for="story">Story Content</label>
<textarea name="story" id="story" class="cke-repl"><?= set_value('content'); ?></textarea>
<div class="story-error error-field hide"><ul></ul></div>
<label for="anonymous" style="margin-top:1em"><input type="checkbox" name="anonymous" id="anonymous"/> Create as anonymous</label>
<button type="submit" class="button paruto large radius" id="create-story" style="margin-top:1em">Publish Story</button>
<?= form_close(); ?>
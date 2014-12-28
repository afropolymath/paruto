<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Paruto<?= isset($title) ? " | $title" : ""; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
        <?= link_tag('lib/foundation/css/foundation.css'); ?>
        <?= link_tag('lib/foundation-icons/foundation-icons.css'); ?>
        <?= link_tag('assets/css/selectric.css'); ?>
        <?= link_tag('assets/css/app.css'); ?>
        <?= js_tag('lib/modernizr/modernizr.js'); ?>
    </head>
    <body >
        <div id="application-message-parser" class="success hidden">Hello everyone. I'm a message</div>
        <input type="hidden" value="<?= site_url(); ?>" class="base-url"/>
        <div class="modal-overlay">
            <p class="loading-message"><?= img('assets/img/ajax_loader.gif'); ?> Loading..</p>
        </div>
        <div class="overlay"></div>
        <section id="header">
            <div class="medium-6 columns">
                <?= img('assets/img/logo.png'); ?>
            </div>
            <div class="medium-6 columns">
                <ul class="header-nav">
                    <li><?= anchor('stories', 'Stream'); ?></li>
                    <li><?= anchor('users/dashboard', 'Dashboard'); ?></li>
                    <li><?= anchor('stories/create', '<i class="fi-plus"></i> Create Story', ['class' => 'click-me']); ?></li>
                </ul>
            </div>
        </section>
        <section id="application-window">
            <div id="ajax-content" class="large-7 <?= !isset($yield_sidebar) ? "large-centered": "large-offset-1" ; ?> columns">
                <?= $yield; ?>
            </div>
            <? if(isset($yield_sidebar)): ?>
            <div id="ajax-sidebar" class="large-3 large-offset-1 columns">
                <div class="side-bar">
                    <?= $yield_sidebar; ?>
                </div>
            </div>
            <? endif; ?>
        </section>
        <section id="footer-section"></section>

        <?= js_tag('lib/jquery/dist/jquery.min.js'); ?>
        <?= js_tag('lib/foundation/js/foundation.min.js'); ?>
        <?= js_tag('lib/foundation/js/foundation/foundation.magellan.js'); ?>
        <?= js_tag('assets/js/ckeditor/ckeditor.js'); ?>
        <?= js_tag('assets/js/ckeditor/adapters/jquery.js'); ?>
        <?= js_tag('assets/js/jquery.selectric.min.js'); ?>
        <?= js_tag('assets/js/app.js'); ?>
    </body>
</html>

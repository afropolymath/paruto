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
        <input type="hidden" value="<?= site_url(); ?>" class="base-url"/>
        <div class="modal-overlay">
            <p class="loading message"><?= img('assets/img/ajax_loader.gif'); ?> Loading..</p>
            <p class="message"></p>
        </div>
        <div class="overlay"></div>
        <section id="header">
            <div class="row">
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
            </div>
        </section>
        <section id="application-window">
            <div class="row">
                <div class="large-9 columns">
                    <?= $yield; ?>
                </div>
                <div class="large-3 columns">
                    <div class="side-bar"></div>
                </div>
            </div>
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

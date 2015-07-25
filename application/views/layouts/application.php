<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Paruto<?php echo isset($title) ? " | $title" : ""; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
        <?php echo link_tag('lib/foundation/css/foundation.css'); ?>
        <?php echo link_tag('lib/foundation-icons/foundation-icons.css'); ?>
        <?php echo link_tag('assets/css/selectric.css'); ?>
        <?php echo link_tag('assets/css/app.css'); ?>
        <?php echo js_tag('lib/modernizr/modernizr.js'); ?>
    </head>
    <body >
        <?php if(isset($logged_in_user)): ?>
        <div id="push-left">
            <ul>
                <li><?php echo anchor('users/profile', '<i class="fi-torso"></i>'); ?></li>
                <li><?php echo anchor('stories/share', '<i class="fi-share"></i>'); ?></li>
                <li><?php echo anchor('stories/create', '<i class="fi-pencil"></i>'); ?></li>
            </ul>
        </div>
        <?php endif; ?>
        <div id="push-forward" <?php echo !isset($logged_in_user) ? 'class="no-push"' : ""; ?>>
            <div id="application-message-parser" class="success hidden">Hello everyone. I'm a message</div>
            <div id="confirm-modal" class="reveal-modal small" data-reveal>

            </div>
            <input type="hidden" value="<?php echo site_url(); ?>" class="base-url"/>
            <div class="modal-overlay">
                <p class="loading-message"><?php echo img('assets/img/ajax_loader.gif'); ?> Loading..</p>
            </div>
            <div class="overlay"></div>
            <section id="header" <?php echo !isset($logged_in_user) ? 'class="no-push"' : ""; ?>>
                <div class="medium-6 columns">
                    <a href="/stories" style="text-decoration:none;"><?php echo img('assets/img/logo.png'); ?></a>
                </div>
                <div class="medium-6 columns">
                    <ul class="header-nav">
                        <li><?php echo anchor('stories', 'Stream'); ?></li>
                        <?php if(isset($logged_in_user) && $logged_in_user != NULL): ?>
                        <li>
                            <?php echo anchor('users/dashboard', "Logged in as <em>" . $logged_in_user->username . "</em> &#x25BE;", ['data-dropdown' => 'drop', 'data-options' => 'align:bottom', 'style' => 'padding-bottom: 14px;']); ?>
                            <ul id="drop" class="tiny f-dropdown" data-dropdown-content>
                                <li><?php echo anchor('users/dashboard', 'Dashboard'); ?></li>
                                <li><?php echo anchor('auth/logout', 'Logout'); ?></li>
                            </ul>

                        </li>
                        <?php else: ?>
                            <li><?php echo anchor('auth/login', '<i class="fi-user"></i> Login', ['class' => 'click-me']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>
            <section id="application-window">
                <div id="ajax-content" class="large-8 <?php echo !isset($yield_sidebar) ? "large-centered": "" ; ?> columns">
                    <?php echo $yield; ?>
                </div>
                <?php if(isset($yield_sidebar)): ?>
                <div id="ajax-sidebar" class="large-3 large-offset-1 columns">
                    <div class="side-bar">
                        <?php echo $yield_sidebar; ?>
                    </div>
                </div>
                <?php endif; ?>
            </section>
            <section id="footer-section"></section>
        </div>

        <?php echo js_tag('lib/jquery/dist/jquery.min.js'); ?>
        <?php echo js_tag('lib/foundation/js/foundation.min.js'); ?>
        <?php echo js_tag('lib/foundation/js/foundation/foundation.magellan.js'); ?>
        <?php echo js_tag('assets/js/ckeditor/ckeditor.js'); ?>
        <?php echo js_tag('assets/js/ckeditor/adapters/jquery.js'); ?>
        <?php echo js_tag('assets/js/jquery.selectric.min.js'); ?>
        <?php echo js_tag('assets/js/app.js'); ?>

        <script type="text/javascript">
        var disqus_shortname = 'paruto'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
        </script>
    </body>
</html>

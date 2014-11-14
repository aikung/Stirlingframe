<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo PUBLICS; ?>foundation/css/foundation.css" />
        <script src="<?php echo PUBLICS; ?>foundation/js/vendor/modernizr.js"></script>

    </head>
    <body>

        <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: true">
            <ul class="title-area">
                <li class="name"><h1><a href="#">Stirlingframe</a></h1></li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <section class="top-bar-section">
                <ul class="left">


                </ul>
                <ul class="right">
                    <!-- Divider -->
                    <!-- Dropdown -->
                    <li class="has-dropdown not-click"><a href="#">Developer</a>
                        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">< Back</a></h5></li>
                            <li><a href="#">Download</a></li>
                            <li><a href="#">Documents</a></li>
                            <li class="divider"></li>
                            <li><a href="#" class="button small">Join me</a></li>
                        </ul>
                    </li>

                    <li class="divider"></li>

                    <!-- Anchor -->
                    <li><a href="http://foundation.zurb.com/docs">Docs</a></li>
                    <li class="divider"></li>

                    <!-- Button -->
                    <li>
                        <a href="#">Download</a>
                    </li>

                    <li class="divider"></li>

                    <li class="has-form">
                        <a href="#" class="button">Getting Started</a>
                    </li>

                    <li class="divider"></li>

                    <!-- Search | has-form wrapper -->
                    <li class="has-form">
                        <div class="row collapse">
                            <div class="large-8 small-9 columns">
                                <input type="text" placeholder="Find...">
                            </div>
                            <div class="large-4 small-3 columns">
                                <a href="#" class="alert button expand">Search</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
        </nav>

        <div class="row">
            <div class="large-12 column">
                <h1><span style="color:#008cba">Stirling</span>frame</h1>
            </div>
            <div class="large-12 column">
                <h1 class="subheader" style="font-size: 1.3em;line-height: 0.5em">low power PHP framework</h1>
            </div>
        </div>
        <div class="row">
            <br/>
            <div class="full">
                <div class="row">
                    <div class="large-4 columns">
                        <img alt="logo" src="<?php echo PUBLICS; ?>images/stirling.png"/>
                    </div>
                    <div class="large-8 columns">
                        <p class="text-justify">
                            <strong data-tooltip aria-haspopup="true" class="has-tip" title="A Stirling engine is a heat engine that operates by cyclic compression and expansion of air or other gas (the working fluid) at different temperatures">Stirlngframe</strong> is a php MVC framework based on 
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="<h4 style='color:white'>Whai is Foundation?</h4>Foundation is the most advanced, responsive front-end framework in the world. The framework is mobile friendly and ready for you to customize it any way you want to use it.">
                                Foundation
                            </span> styles. That provide automation commands includes 
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="In computer programming, create, read, update and delete (as an acronym CRUD or possibly a Backronym) (Sometimes called SCRUD with an 'S' for Search)">
                                CRUD
                            </span> 
                            operations for MySQL database to create a responsive web application. Just type a few line of code and leave all of it to designers. It is easy to learn because it made by a lazy person.
                        </p>
                        <div class="large-3 medium-3 small-12 right">
                            <a href="#" class="button small expanded small-12"><h4 style="color: white;line-height: 0.4em">Download</h4><small>v 0.1.1</small></a>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="large-6">
                    <h2>It is easy to use</h2>
                    <h5 class="subheader">Thanks to CLI applications</h5>
                    
                    
                </div>
            </div>

            <div id="footer" class="row text-right">
                <strong>Stirlingframe</strong> <?php echo CP; ?>
            </div>
        </div>

        <script src="<?php echo PUBLICS; ?>foundation/js/vendor/jquery.js"></script>
        <script src="<?php echo PUBLICS; ?>foundation/js/foundation.min.js"></script>
        <script>
            $(document).foundation({
                tooltip: {
                    selector: '.has-tip',
                    additional_inheritable_classes: [],
                    tooltip_class: '.tooltip',
                    touch_close_text: 'tap to close',
                    disable_for_touch: false
                }
            });

            $(document).ready(function () {
                $('pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });

            $(window).bind("load", function () {
                var footer = $("#footer");
                var pos = footer.position();
                var height = $(window).height();
                height = height - pos.top;
                height = height - footer.height();
                if (height > 0) {
                    footer.css({
                        'margin-top': height + 'px'
                    });
                }
            });
        </script>
    </body>
</html>

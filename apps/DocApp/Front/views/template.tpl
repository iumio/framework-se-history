<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iumio Framework {block name="subtitle"}{/block}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A framework written in PHP 7" />
    <meta name="keywords" content="php, php7, framework, mvc, components, libraries, iumio, iumio-team" />
    <meta name="author" content="FREEHTML5.CO" />

    <!--
  //////////////////////////////////////////////////////

  FREE HTML5 TEMPLATE
  DESIGNED & DEVELOPED by FREEHTML5.CO

  Website: 		http://freehtml5.co/
  Email: 			info@freehtml5.co
  Twitter: 		http://twitter.com/fh5co
  Facebook: 		https://www.facebook.com/fh5co

  //////////////////////////////////////////////////////
   -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Webfonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Animate.css -->
   {css path='public/css/animate' }
    <!-- Icomoon Icon Fonts-->
    {css path='public/css/icomoon' }
    <!-- Simple Line Icons-->
    {css path='public/css/simple-line-icons' }
    <!-- Magnific Popup -->
    {css path='public/css/magnific-popup' }
    <!-- Owl Carousel -->
    {css path='public/css/owl.carousel.min' }
    {css path='public/css/owl.theme.default.min'}
    <!-- Theme Style -->
    {css path='public/css/style'}
    <!-- Modernizr JS -->
    {js path='public/js/modernizr-2.6.2.min'}
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    {js path='public/js/respond-2.6.2.min'}
    <![endif]-->

</head>
<body>

<div id="fh5co-offcanvass">
    <ul>
        <li class="active"><a href="#" data-nav-section="home">Home</a></li>
        <li class=""><a href="{route name="website_index" }#fh5co-faqs" data-nav-section="features">FAQ</a></li>
        <li><a href="/">Documentation</a></li>
        <li><a href="{route name="website_index" }#fh5co-features" data-nav-section="design">Features</a></li>
        <li><a href="{route name="website_index" }#fh5co-products" data-nav-section="design">Team</a></li>
        <li><a href="{route name="website_index" }#fh5co-pricing" data-nav-section="design">Download</a></li>
        <li class=""><a href="#" data-nav-section="testimonies">Contact</a></li>
        <li><a href="https://components.iumio.com/">iumio Components</a></li>
        <li><a href="https://orm.power8.iumio.com/">iumio Power8Orm</a></li>
    </ul>
    <h3 class="fh5co-lead">Connect with us</h3>
    <p class="fh5co-social-icons">
        <!--<a href="#"><i class="icon-twitter"></i></a>-->
        <a href="https://www.facebook.com/iumio.team"><i class="icon-facebook"></i></a>
        <!--<a href="#"><i class="icon-instagram"></i></a>
        <a href="#"><i class="icon-dribbble"></i></a>-->
        <a href="https://github.com/iumio-team"><i class="icon-github"></i></a>
    </p>
</div>

<div id="fh5co-menu" class="navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><span>Menu</span> <i></i></a>
                <img src="{webassets path='public/images/iumio.logo.black.png'}" class="img-responsive" style="padding-top: 13px;" width="150" onclick="location.href='{route name="website_index" }'">
            </div>
        </div>
    </div>
</div>

<div id="fh5co-page">
    <div id="fh5co-wrap">
        {block name="content"}
        <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover;" >
            <div class="fh5co-overlay"></div>
            <div class="fh5co-intro">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 fh5co-text">
                            <h2 class="to-animate intro-animate-1">iumio Framework Documentation</h2>
                            <p class="to-animate intro-animate-2">The next generation of PHP Frameworks.</p>
                            <p class="to-animate intro-animate-2">Welcome on iumio Framework Documentation.</p>
                            <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> Continue</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END .header -->

        <div id="fh5co-main">
            <div id="fh5co-features" data-section="features">


                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                            <h2 class="fh5co-lead to-animate">Explore the iumio Framework Documentation</h2>
                            <p class="fh5co-sub to-animate">With iumio framework, we give you the development tools to build the perfect web app.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="{route name='doc_install'}" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-gears"></i></span>
                                <h3 class="fh5co-feature-lead">Install iumio Framework</h3>
                                <p class="fh5co-feature-text">How to install ?</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-code"></i></span>
                                <h3 class="fh5co-feature-lead">PHP 7</h3>
                                <p class="fh5co-feature-text">Developed under PHP7, the fastest and newest version.</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-eye"></i></span>
                                <h3 class="fh5co-feature-lead">Views</h3>
                                <p class="fh5co-feature-text">Using the Smarty Template Engine.<br>&nbsp;</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-file"></i></span>
                                <h3 class="fh5co-feature-lead">Navigation</h3>
                                <p class="fh5co-feature-text">New routing language named << RT >>.<br>&nbsp; &nbsp;</p>
                            </a>
                        </div>
                        <div class="fh5co-spacer fh5co-spacer-sm"></div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-laptop"></i></span>
                                <h3 class="fh5co-feature-lead">Environment</h3>
                                <p class="fh5co-feature-text">You have 2 environments for your web app : Production and Development</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-gears"></i></span>
                                <h3 class="fh5co-feature-lead">Configuration</h3>
                                <p class="fh5co-feature-text">iumio Framework uses the JSON standard for file configuration.<br>&nbsp;</p>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-power"></i></span>
                                <h3 class="fh5co-feature-lead">Power8Orm</h3>
                                <p class="fh5co-feature-text">An Orm optimized for iumio Framework (Development is in progress)</p>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                            <a href="#" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-folder-open"></i></span>
                                <h3 class="fh5co-feature-lead">Power8Form</h3>
                                <p class="fh5co-feature-text">A form manager optimised for iumio Framework (Development starts later).</p>
                            </a>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                    </div>
                </div>
            </div>
        </div>
        {/block}
    </div>

    <footer id="fh5co-footer" style="">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-md-push-3">
                        <h3 class="fh5co-lead">About</h3>
                        <ul>
                            <li><a href="{route name="website_index" }#fh5co-faqs">FAQ</a></li>
                            <li><a href="{route name="website_index" }#fh5co-features">Features</a></li>
                            <li><a href="https://components.iumio.com">iumio Components</a></li>
                            <li><a href="{route name="website_contact" }">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-4 col-md-push-3">
                        <h3 class="fh5co-lead">Components</h3>
                        <ul>
                            <li><a href="https://orm.power8.iumio.com/">iumio Power8Orm</a></li>
                            <li><a href="#">Documentation</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-4 col-md-push-3">
                        <h3 class="fh5co-lead">More Links</h3>
                        <ul>
                            <li><a href="https://github.com/iumio-team">Github</a></li>
                            <li><a href="https://www.facebook.com/iumio.team">Facebook</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-12 col-md-pull-9">
                        <div class="fh5co-footer-logo"><img src="{webassets path='public/images/iumio.logo.black.png'}" class="img-responsive" width="150"></div>
                        <p class="fh5co-copyright"><small>© 2017. All Rights Reserved. <br>	<a href="https://components.iumio.com/" target="_blank">iumio Components Website</a><br> Theme created by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Images: <a href="http://pexels.com/" target="_blank">Pexels</a></small> <br> <small>Powered by iumio Framework SE</small> </p>
                        <p class="fh5co-social-icons">
                            <!--<a href="#"><i class="icon-twitter"></i></a>-->
                            <a href="https://www.facebook.com/iumio.team"><i class="icon-facebook"></i></a>
                            <a href="https://github.com/iumio-team/iumio-framework"><i class="icon-github"></i></a>
                            <!--<a href="#"><i class="icon-instagram"></i></a>
                            <a href="#"><i class="icon-dribbble"></i></a>
                            <a href="#"><i class="icon-youtube"></i></a>-->
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>


<!-- jQuery -->

{jquery min='yes'}
<!-- jQuery Easing -->
{js path='public/js/jquery.easing.1.3'}
<!-- Bootstrap -->
{bootstrap_js min='yes'}
<!-- Waypoints -->
{js path='public/js/jquery.waypoints.min'}
<!-- Magnific Popup -->
{js path='public/js/jquery.magnific-popup.min'}
<!-- Owl Carousel -->
{js path='public/js/owl.carousel.min'}
<!-- toCount -->
{js path='public/js/jquery.countTo'}
<!-- Main JS -->
{js path='public/js/main' }




</body>
</html>

<?php
/* Smarty version 3.1.31, created on 2017-11-01 20:45:34
  from "/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59fa245e162150_38957033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33e6adc0e0d92ce64e4b89a3f61477c4ff992238' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/template.tpl',
      1 => 1509565409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fa245e162150_38957033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '135110866859fa2458bfc280_96152914';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iumio Framework <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_159844019759fa2458c8fb69_87862180', "subtitle");
?>
</title>
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
   <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/animate'),$_smarty_tpl);?>

    <!-- Icomoon Icon Fonts-->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/icomoon'),$_smarty_tpl);?>

    <!-- Simple Line Icons-->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/simple-line-icons'),$_smarty_tpl);?>

    <!-- Magnific Popup -->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/magnific-popup'),$_smarty_tpl);?>

    <!-- Owl Carousel -->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/owl.carousel.min'),$_smarty_tpl);?>

    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/owl.theme.default.min'),$_smarty_tpl);?>

    <!-- Theme Style -->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::css(array('path'=>'public/css/style'),$_smarty_tpl);?>

    <!-- Modernizr JS -->
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/modernizr-2.6.2.min'),$_smarty_tpl);?>

    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/respond-2.6.2.min'),$_smarty_tpl);?>

    <![endif]-->

</head>
<body>

<div id="fh5co-offcanvass">
    <ul>
        <li class="active"><a href="#" data-nav-section="home">Home</a></li>
        <li class=""><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-faqs" data-nav-section="features">FAQ</a></li>
        <li><a href="/">Documentation</a></li>
        <li><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-features" data-nav-section="design">Features</a></li>
        <li><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-products" data-nav-section="design">Team</a></li>
        <li><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-pricing" data-nav-section="design">Download</a></li>
        <li class=""><a href="" data-nav-section="testimonies">Contact</a></li>
        <li><a href="https://iumio.com/">iumio Components</a></li>
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
                <img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/iumio.logo.black.png'),$_smarty_tpl);?>
" class="img-responsive" style="padding-top: 13px;" width="150" onclick="location.href='<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
'">
            </div>
        </div>
    </div>
</div>

<div id="fh5co-page">
    <div id="fh5co-wrap">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172740247659fa245c616323_67370189', "content");
?>

    </div>

    <footer id="fh5co-footer" style="">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-md-push-3">
                        <h3 class="fh5co-lead">About</h3>
                        <ul>
                            <li><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-faqs">FAQ</a></li>
                            <li><a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_index"),$_smarty_tpl);?>
#fh5co-features">Features</a></li>
                            <li><a href="https://iumio.com">iumio Components</a></li>
                            <li><a href="">Contact</a></li>
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
                        <div class="fh5co-footer-logo"><img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/iumio.logo.black.png'),$_smarty_tpl);?>
" class="img-responsive" width="150"></div>
                        <p class="fh5co-copyright"><small>© 2017. All Rights Reserved. <br>	<a href="https://iumio.com/" target="_blank">iumio Components Website</a><br> Theme created by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Images: <a href="http://pexels.com/" target="_blank">Pexels</a></small> <br> <small>Powered by iumio Framework SE</small> </p>
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

<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::jquery(array('min'=>'yes'),$_smarty_tpl);?>

<!-- jQuery Easing -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/jquery.easing.1.3'),$_smarty_tpl);?>

<!-- Bootstrap -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::btspjs(array('min'=>'yes'),$_smarty_tpl);?>

<!-- Waypoints -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/jquery.waypoints.min'),$_smarty_tpl);?>

<!-- Magnific Popup -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/jquery.magnific-popup.min'),$_smarty_tpl);?>

<!-- Owl Carousel -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/owl.carousel.min'),$_smarty_tpl);?>

<!-- toCount -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/jquery.countTo'),$_smarty_tpl);?>

<!-- Main JS -->
<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::js(array('path'=>'public/js/main'),$_smarty_tpl);?>





</body>
</html>
<?php }
/* {block "subtitle"} */
class Block_159844019759fa2458c8fb69_87862180 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitle' => 
  array (
    0 => 'Block_159844019759fa2458c8fb69_87862180',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "subtitle"} */
/* {block "content"} */
class Block_172740247659fa245c616323_67370189 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_172740247659fa245c616323_67370189',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header id="fh5co-hero" data-section="home" role="banner" style="background: url(<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/landscape.jpg'),$_smarty_tpl);?>
) top left; background-size: cover;" >
            <div class="fh5co-overlay"></div>
            <div class="fh5co-intro">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 fh5co-text">
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
                            <a href="<?php ob_start();
echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('nane'=>'doc_install'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
" class="fh5co-feature to-animate block-feature">
                                <span class="fh5co-feature-icon"><i class="icon-gear"></i></span>
                                <h3 class="fh5co-feature-lead">Installation</h3>
                                <p class="fh5co-feature-text">How to install iumio Framework<br>&nbsp;</p>
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



            <!--<div id="fh5co-features-2" data-section="design">
                <div class="fh5co-features-2-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                                <h2 class="fh5co-lead to-animate">Better design</h2>
                                <p class="fh5co-sub to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                            <div class="col-md-4 fh5co-text-wrap">
                                <div class="row text-center">
                                    <div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-3">
                                        <span class="fh5co-icon"><i class="icon-screen-desktop"></i></span>
                                        <h4 class="fh5co-uppercase-sm">Cross platform support</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-4">
                                        <span class="fh5co-icon"><i class="icon-anchor"></i></span>
                                        <h4 class="fh5co-uppercase-sm">Prototyping tools</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-md-push-4 fh5co-text-wrap">
                                <div class="row text-center">
                                    <div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-5">
                                        <span class="fh5co-icon"><i class="icon-rocket"></i></span>
                                        <h4 class="fh5co-uppercase-sm">Powerful design</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-6">
                                        <span class="fh5co-icon"><i class="icon-people"></i></span>
                                        <h4 class="fh5co-uppercase-sm">User Collaboration</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-md-pull-4 fh5co-image animate-object features-2-animate-2">
                                <p class="text-center">
                                    <img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/iphone_blank_2.png'),$_smarty_tpl);?>
" class="" alt="Outline Free HTML5 Responsive Bootstrap Template">
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>-->


            <!--<div id="fh5co-testimony" data-section="testimonies">
                <div class="container">
                    <div class="row animate-box">

                        <div class="owl-carousel">

                            <div class="item">
                                <div class="col-md-3 col-sm-3 col-xs-4 col-xxs-12">
                                    <figure class="fh5co-vcard"><img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/user.jpg'),$_smarty_tpl);?>
" alt="Free HTML5 Template by FREEHTML5.co" class="img-responsive"></figure>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8 col-xxs-12">
                                    <blockquote>
                                        <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                    <p class="fh5co-author fh5co-uppercase-sm"><span>Gustav Barrow</span>, XYZ Inc.</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-md-3 col-sm-3 col-xs-4 col-xxs-12">
                                    <figure class="fh5co-vcard"><img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/user_2.jpg'),$_smarty_tpl);?>
" alt="Free HTML5 Template by FREEHTML5.co" class="img-responsive"></figure>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8 col-xxs-12">
                                    <blockquote>
                                        <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                    <p class="fh5co-author fh5co-uppercase-sm"><span>Gustav Barrow</span>, XYZ Inc.</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-md-3 col-sm-3 col-xs-4 col-xxs-12">
                                    <figure class="fh5co-vcard"><img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/user_3.jpg'),$_smarty_tpl);?>
" alt="Free HTML5 Template by FREEHTML5.co" class="img-responsive"></figure>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8 col-xxs-12">
                                    <blockquote>
                                        <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                    <p class="fh5co-author fh5co-uppercase-sm"><span>Gustav Barrow</span>, XYZ Inc.</p>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>-->


            <div id="fh5co-pricing" data-section="pricing">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                            <h2 class="fh5co-lead animate-single pricing-animate-1">Download iumio Framework</h2>
                            <p class="fh5co-sub animate-single pricing-animate-2">You can choose as you want and as you need</p>
                        </div>

                        <div class="col-md-3 to-animate">
                            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_download",'params'=>array("edition"=>"SE")),$_smarty_tpl);?>
" class="fh5co-figure active pricing-feature">
                                <span class="fh5co-price"><span><strong>SE</strong></span></span>
                                <h3 class="fh5co-figure-lead">Standard Edition</h3>
                                <p class="fh5co-figure-text">The complete edition for your web app</p>
                                <p class="fh5co-figure-text download">Download it</p>
                            </a>
                        </div>
                        <div class="col-md-3 to-animate">
                            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_download",'params'=>array("edition"=>"PE")),$_smarty_tpl);?>
" class="fh5co-figure">
                                <span class="fh5co-price"><span><strong>PE</strong></span></span>
                                <h3 class="fh5co-figure-lead">Performance Edition</h3>
                                <p class="fh5co-figure-text">The fastest edition of iumio Framework</p>
                                <p class="fh5co-figure-text download">Development start later</p>
                            </a>
                        </div>
                        <div class="col-md-3 to-animate">
                            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_download",'params'=>array("edition"=>"SU")),$_smarty_tpl);?>
" class="fh5co-figure">
                                <span class="fh5co-price"><span><strong>SU</strong></span></span>
                                <h3 class="fh5co-figure-lead">Secutity Edition</h3>
                                <p class="fh5co-figure-text">The security is a priority for this edition</p>
                                <p class="fh5co-figure-text download">Development start later</p>
                            </a>
                        </div>
                        <div class="col-md-3 to-animate">
                            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>"website_download",'params'=>array("edition"=>"API")),$_smarty_tpl);?>
" class="fh5co-figure">
                                <span class="fh5co-price"><span><strong>API</strong></span></span>
                                <h3 class="fh5co-figure-lead">API Edition</h3>
                                <p class="fh5co-figure-text">Create your universal API <br>&nbsp;</p>
                                <p class="fh5co-figure-text download">Development start later</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div id="fh5co-faqs"  data-section="faqs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                            <h2 class="fh5co-lead animate-single faqs-animate-1">Frequently Ask Questions</h2>
                            <p class="fh5co-sub animate-single faqs-animate-2">Before to search on the Internet, look here :)</p>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="faq-accordion active to-animate">
                        <span class="faq-accordion-icon-toggle active"><i class="icon-arrow-down"></i></span>
                        <h3>What is iumio Framework ?</h3>
                        <div class="faq-body" style="display: block;">
                            <p>iumio Framework is a Framework written in PHP 7. This framework would be to offer a lot of components to create your web app faster and perfectly</p>
                        </div>
                    </div>
                    <div class="faq-accordion to-animate">
                        <span class="faq-accordion-icon-toggle"><i class="icon-arrow-down"></i></span>
                        <h3>Is iumio Framework Free?</h3>
                        <div class="faq-body">
                            <p>iumio Framework is an open source project with MIT Licence. Free for all editions. Refer to MIT Licence to have more details</p>
                        </div>
                    </div>
                    <div class="faq-accordion to-animate">
                        <span class="faq-accordion-icon-toggle"><i class="icon-arrow-down"></i></span>
                        <h3>What architecture iumio Framework uses ?</h3>
                        <div class="faq-body">
                            <p>iumio Framework is based on MVC architecture (Model View Controller). The most of project uses this architecture.</p>
                        </div>
                    </div>
                    <div class="faq-accordion to-animate">
                        <span class="faq-accordion-icon-toggle"><i class="icon-arrow-down"></i></span>
                        <h3>What is iumio Components ?</h3>
                        <div class="faq-body">
                            <p>iumio Components is a set of Component written in PHP7 (Maybe others laguages after).  The goal is to create a multiple components to improve the developer's life.</p>
                        </div>
                    </div>
                    <!--<div class="faq-accordion to-animate">
                        <span class="faq-accordion-icon-toggle"><i class="icon-arrow-down"></i></span>
                        <h3>What languages are available?</h3>
                        <div class="faq-body">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                    </div>
                    <div class="faq-accordion to-animate">
                        <span class="faq-accordion-icon-toggle"><i class="icon-arrow-down"></i></span>
                        <h3>I have technical problem, who do I email?</h3>
                        <div class="faq-body">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div id="fh5co-subscribe">
                <div class="container">
                    <div class="row animate-box">
                        <form action="#" method="post">
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->

        </div>
        <?php
}
}
/* {/block "content"} */
}

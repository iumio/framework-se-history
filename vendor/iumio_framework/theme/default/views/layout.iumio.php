<!DOCTYPE HTML>
<!--
	IUMIO theme by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>IUMIO <?= $this->env.' '.$this->code ?></title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="57x57" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="//<?= HOST ?>/components/theme/default/assets/images/favicon.ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="//<?= HOST ?>/components/theme/default/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="//<?= HOST ?>/components/theme/default/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="//<?= HOST ?>/components/theme/default/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="//<?= HOST ?>/components/theme/default/assets/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <a href="index.html" class="logo"><strong>IUMIO </strong> <span><?= $this->env ?></span></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="/iumio_dev.php">DEV MODE</a></li>
            <li><a href="/iumio_preprod.php">PREPROD MODE</a></li>
            <li><a href="/iumio_prod.php">PROD MODE</a></li>
            <li><a href="#">CONFIG</a></li>
            <li><a href="#">PROFILER</a></li>

        </ul>
        <ul class="actions vertical">
            <li><a href="#" class="button special fit">CONTACT IUMIO SUPPORT</a></li>
            <li><a href="https://iumio.com" class="button fit">IUMIO WEBSITE</a></li>
        </ul>
    </nav>

    <!-- Banner -->"
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h1>IUMIO <?= $this->env.' '.$this->code.' '.$this->codeTitle ?></h1>
            </header>
            <div class="content">
                <p><?= $this->explain ?><br />
                  <?= $this->solution ?></p>

            </div>
        </div>
    </section>

    <!-- Main -->
    <div id="main">

        <!-- One -->
        <section id="one" class="tiles">
            <article>
									<span class="image">
										<img src="//<?= HOST ?>/components/theme/default/assets/images/pic01.jpg" alt="" />
									</span>
                <header class="major">
                <h3><a href="#" class="link">PHP</a></h3>
                <p>Developed full PHP7</p>
                    </header>
            </article>
            <article>
									<span class="image">
										<img src="//<?= HOST ?>/components/theme/default/assets/images/pic02.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Views</a></h3>
                    <p>Mustache engine template</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="//<?= HOST ?>/components/theme/default/assets/images/pic03.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Navigation</a></h3>
                    <p>New Routing File (RT)</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="//<?= HOST ?>/components/theme/default/assets/images/pic04.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Environment</a></h3>
                    <p>3 Environments (DEV, PREPROD, PROD)</p>
                </header>
            </article>
        </section>

        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Iumio</h2>
                </header>
                <p style="font-size: 16px;font-weight: 600">Developed in PHP7</p>
                <p>Iumio is easier to use. You can manipulate this framework as you want. You are the only one to make a decision : choose Iumio. @ Developers are the best @</p>
            </div>
        </section>

    </div>

    <!-- Contact -->
    <section id="contact">
        <div class="inner">
            <section class="split">
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-envelope"></span>
                        <h3>Email</h3>
                        <a href="#">danyrafina@gmail.com</a>
                    </div>
                </section>
            </section>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="icons">
                <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                <!--<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>-->
                <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
                <!--<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>-->
            </ul>
            <ul class="copyright">
                <li>&copy; 2017 Iumio Framework</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="//<?= HOST ?>/components/theme/default/assets/js/jquery.min.js"></script>
<script src="//<?= HOST ?>/components/theme/default/assets/js/jquery.scrolly.min.js"></script>
<script src="//<?= HOST ?>/components/theme/default/assets/js/jquery.scrollex.min.js"></script>
<script src="//<?= HOST ?>/components/theme/default/assets/js/skel.min.js"></script>
<script src="//<?= HOST ?>/components/theme/default/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="//<?= HOST ?>/components/theme/default/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="//<?= HOST ?>/components/theme/default/assets/js/main.js"></script>

</body>
</html>
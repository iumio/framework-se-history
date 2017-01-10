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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/css/ie8.css" /><![endif]-->
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
            <li><a href="dev.php">DEV MODE</a></li>
            <li><a href="preprod.php">PREPROD MODE</a></li>
            <li><a href="prod.php">PROD MODE</a></li>
            <li><a href="landing.html">CONFIG</a></li>
            <li><a href="generic.html">PROFILER</a></li>

        </ul>
        <ul class="actions vertical">
            <li><a href="#" class="button special fit">CONTACT IUMIO SUPPORT</a></li>
            <li><a href="#" class="button fit">IUMIO WEBSITE</a></li>
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
										<img src="/vendor/iumio_framework/themes/default/images/pic01.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Aliquam</a></h3>
                    <p>Ipsum dolor sit amet</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="/vendor/iumio_framework/themes/default/images/pic02.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Tempus</a></h3>
                    <p>feugiat amet tempus</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="/vendor/iumio_framework/themes/default/images/pic03.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Magna</a></h3>
                    <p>Lorem etiam nullam</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="/vendor/iumio_framework/themes/default/images/pic04.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Ipsum</a></h3>
                    <p>Nisl sed aliquam</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="/vendor/iumio_framework/themes/default/images/pic05.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Consequat</a></h3>
                    <p>Ipsum dolor sit amet</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="/vendor/iumio_framework/themes/default/images/pic06.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="landing.html" class="link">Etiam</a></h3>
                    <p>Feugiat amet tempus</p>
                </header>
            </article>
        </section>

        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Massa libero</h2>
                </header>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et feugiat tempus.</p>
                <ul class="actions">
                    <li><a href="landing.html" class="button next">Get Started</a></li>
                </ul>
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
                        <a href="#">information@untitled.tld</a>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-phone"></span>
                        <h3>Phone</h3>
                        <span>(000) 000-0000 x12387</span>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-home"></span>
                        <h3>Address</h3>
                        <span>1234 Somewhere Road #5432<br />
										Nashville, TN 00000<br />
										United States of America</span>
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
                <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/jquery.min.js"></script>
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/jquery.scrolly.min.js"></script>
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/jquery.scrollex.min.js"></script>
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/skel.min.js"></script>
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="//<?= HOST ?>/vendor/iumio_framework/theme/default/assets/js/main.js"></script>

</body>
</html>
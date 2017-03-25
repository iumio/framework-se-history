<!DOCTYPE HTML>
<?php  use iumioFramework\Core\Requirement\iumioUltimaCore; ?>
<!--
	iumio theme by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>iumio <?= ucfirst(strtolower($this->env)).' '.$this->code ?></title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= HOST_CURRENT ?>/components/theme/default/assets/images/favicon.ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?= HOST_CURRENT ?>/components/theme/default/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="<?= HOST_CURRENT ?>/components/theme/default/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="<?= HOST_CURRENT ?>/components/theme/default/assets/css/ie8.css" /><![endif]-->
    <style type="text/css">
        body, html
        {
            font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
        }
        #wrapper {
            padding-top: 0em;
        }
        #banner.major {
            height: 135vh;
        }
        .timeline {
            list-style-type: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .li {
            transition: all 200ms ease-in;
        }

        .timestamp {
            margin-bottom: 20px;
            padding: 0px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-weight: 100;
        }

        .status {
            padding: 15px 40px;
            display: flex;
            justify-content: center;
            border-top: 2px solid #D6DCE0;
            position: relative;
            transition: all 200ms ease-in;
        }
        .status h4 {
            font-weight: 600;
        }
        .status:before {
            content: "";
            width: 25px;
            height: 25px;
            background-color: white;
            border-radius: 25px;
            border: 1px solid #ddd;
            position: absolute;
            top: -15px;
            left: 50%;
            transition: all 200ms ease-in;
        }

        .li.complete .status {
            border-top: 2px solid #66DC71;
        }
        .li.complete .status:before {
            background-color: #66DC71;
            border: none;
            transition: all 200ms ease-in;
        }
        .li.complete .status h4 {
            color: #66DC71;
        }

        @media (min-device-width: 320px) and (max-device-width: 700px) {
            .timeline {
                list-style-type: none;
                display: block;
            }

            .li {
                transition: all 200ms ease-in;
                display: flex;
                width: inherit;
            }

            .timestamp {
                width: 100px;
            }

            .status:before {
                left: -8%;
                top: 30%;
                transition: all 200ms ease-in;
            }
        }
    </style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <a href="index.php" class="logo"> <img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/iumio-horizontal-white.png" style="width: 15%"><!--<strong>iumio </strong> <span>FRAMEWORK</span>--></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="<?= HOST_CURRENT ?>/iumio_dev.php">Dev Mode</a></li>
            <li><a href="<?= HOST_CURRENT ?>/iumio_preprod.php">Preprod Mode</a></li>
            <li><a href="<?= HOST_CURRENT ?>/iumio_prod.php">Prod Mode</a></li>
            <li><a href="#">Config</a></li>
            <li><a href="#">Profiler</a></li>

        </ul>
        <ul class="actions vertical">
            <li><a href="#" class="button special fit">Contact iumio support</a></li>
            <li><a href="https://framework.iumio.com" class="button fit">iumio Website</a></li>
            <li><a href="https://docs.framework.iumio.com/" class="button fit">iumio Documentation</a></li>
        </ul>
    </nav>

    <!-- Banner -->"
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h1>iumio <?= ucfirst(strtolower($this->env)).' '.$this->code.' '.$this->codeTitle ?></h1>
            </header>
            <div class="content">
                <p><?= $this->explain ?><br />
                  <?= $this->solution ?></p>

            </div>
            <!--------->
            <ul class="timeline" id="timeline">
                <li class="li complete">
                    <div class="timestamp">
                        <span class="author"><?= iumioUltimaCore::getInfo("VERSION_EDITION") ?></span>
                        <span class="date">version <?= iumioUltimaCore::getInfo("VERSION") ?> <?= iumioUltimaCore::getInfo("VERSION_STAGE") ?></span>
                    </div>
                    <div class="status">
                        <h4>Actual version</h4>
                    </div>
                </li>
            </ul>
            <!------>
        </div>
    </section>

    <!-- Main -->
    <div id="main">

        <!-- One -->
        <section id="one" class="tiles">
            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic01.jpg" alt="" />
									</span>
                <header class="major">
                <h3><a href="#" class="link">PHP</a></h3>
                <p>Developed full PHP7</p>
                    </header>
            </article>
            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic02.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Views</a></h3>
                    <p>Mustache engine template</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic03.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Navigation</a></h3>
                    <p>New Routing File (RT)</p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic04.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Environment</a></h3>
                    <p>3 Environments (DEV, PREPROD, PROD)</p>
                </header>
            </article>

            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic05.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="http://www.doctrine-project.org/" class="link">ORM</a></h3>
                    <p>Used ORM named <a href="http://www.doctrine-project.org/">Doctrine 2</a></p>
                </header>
            </article>
            <article>
									<span class="image">
										<img src="<?= HOST_CURRENT ?>/components/theme/default/assets/images/pic06.jpg" alt="" />
									</span>
                <header class="major">
                    <h3><a href="#" class="link">Configuration files</a></h3>
                    <p>Used JSON format as configuration files</p>
                </header>
            </article>
        </section>

        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>iumio Framework</h2>
                </header>
                <p style="font-size: 16px;font-weight: 600">Developed in PHP7</p>
                <p>iumio is easier to use. You can manipulate this framework as you want. You are the only one to make a decision : choose iumio for your future project. <br> <em>"iumio Framework, The next generation PHP Framework"</em></p>
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
                <li>&copy; 2017 iumio Framework</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/jquery.min.js"></script>
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/jquery.scrolly.min.js"></script>
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/jquery.scrollex.min.js"></script>
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/skel.min.js"></script>
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="<?= HOST_CURRENT ?>/components/theme/default/assets/js/main.js"></script>

</body>
</html>
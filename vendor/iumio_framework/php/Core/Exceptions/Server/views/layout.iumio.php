<!DOCTYPE HTML>
<html>
<head>
    <title><?= $this->code.' '.strtolower(ucfirst($this->codeTitle)).' - iumio '.(strtolower($this->env)) ?></title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/manifest.json">
    <link rel="mask-icon" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">


    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="<?= WEB_FRAMEWORK ?>theme/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/main.css" />
    <?= \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getCssTaskBar() ?>
    <!--[if lte IE 9]><link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/ie8.css" /><![endif]-->
    <style type="text/css">
        body, html
        {
            font-family: "Roboto Slab", "Times New Roman", serif;
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
        <a href="#" class="logo"> <img src="<?= WEB_FRAMEWORK ?>theme/assets/images/iumio-horizontal-white.png" style="width: 15%"><!--<strong>iumio </strong> <span>FRAMEWORK</span>--></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="<?= HOST_CURRENT ?>/Dev.php">Development</a></li>
            <li><a href="<?= HOST_CURRENT ?>/Prod.php">Production</a></li>
            <li><a href="<?= (new \iumioFramework\Masters\iumioUltimaMaster())->generateRoute("iumio_manager_index", null, "ManagerApp", true) ?>">Manager</a></li>

        </ul>
        <ul class="actions vertical">
            <li><a href="https://framework.iumio.com#contact" class="button special fit">Contact</a></li>
            <li><a href="https://framework.iumio.com" class="button fit">iumio website</a></li>
            <li><a href="https://docs.framework.iumio.com/" class="button fit">iumio documentation</a></li>
        </ul>
    </nav>

    <!-- Banner -->
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h2><?= $this->code.' '.$this->codeTitle ?> - <?= ucfirst(strtolower($this->env)) ?></h2>
            </header>
            <div class="content">
                <p><?= $this->explain ?><br />
                  <?= $this->solution ?></p>

            </div>
        </div>
    </section>
    <!-- Main -->
    <!-- Footer -->

    <footer id="footer">
        <div class="inner">
            <ul class="copyright">
                <?php  use iumioFramework\Core\Requirement\iumioUltimaCore; ?>
                <li>&copy; <?= date('Y') ?> <a href="https://framework.iumio.com/">iumio Framework</a></li><li>The next generation of PHP frameworks</li><li><?= iumioUltimaCore::getInfo("VERSION_EDITION").' '.iumioUltimaCore::getInfo("VERSION") ?></li>
            </ul>
        </div>
    </footer>

    <?= (\iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() != "#none")? \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() : "" ?>

    <!-- Scripts -->
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.min.js"></script>
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.scrolly.min.js"></script>
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.scrollex.min.js"></script>
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/skel.min.js"></script>
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="<?= WEB_FRAMEWORK ?>theme/assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="<?= WEB_FRAMEWORK ?>theme/assets/js/main.js"></script>
    <?php \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getJsTaskBar() ?>
</body>
</html>
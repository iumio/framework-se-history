<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= WEB_FRAMEWORK ?>assets/images/favicon.ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= WEB_FRAMEWORK ?>assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= WEB_FRAMEWORK ?>assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="<?= WEB_FRAMEWORK ?>assets/images/favicon.ico/manifest.json">
    <link rel="mask-icon" href="<?= WEB_FRAMEWORK ?>assets/images/favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $this->code.' '.strtolower(ucfirst($this->codeTitle)).' - iumio '.(strtolower($this->env)) ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?= WEB_LIBS.'bootstrap/' ?>css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?= WEB_LIBS.'iumio_manager/' ?>css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?= WEB_LIBS.'iumio_manager/' ?>css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <link href="<?= WEB_LIBS.'iumio_manager/' ?>css/index.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= WEB_LIBS.'iumio_manager/' ?>css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="<?= WEB_LIBS.'font-awesome/' ?>css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?= WEB_LIBS.'/iumio_manager/' ?>css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

            <div class="sidebar" data-color="blue" data-image="<?= WEB_FRAMEWORK.'img/' ?>iumio_img_theme.jpeg">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="https://framework.iumio.com" class="simple-text">
                            <img class="img-responsive" src="<?= WEB_FRAMEWORK.'img/' ?>logo_white.png" />
                            <h6>Error <?= $this->code ?></h6>
                        </a>
                    </div>
            <ul class="nav">
                <li class="">
                    <a href="<?= HOST_CURRENT ?>">
                        <i class="pe-7s-link"></i>
                        <p>Development</p>
                    </a>
                </li>
                <li>
                    <a href="<?= HOST_CURRENT ?>/Prod.php">
                        <i class="pe-7s-play"></i>
                        <p>Production</p>
                    </a>
                </li>
                <li>
                    <a href="<?= (new \iumioFramework\Masters\iumioUltimaMaster())->generateRoute("iumio_manager_index", null, "ManagerApp", true) ?>">
                        <i class="pe-7s-edit"></i>
                        <p>Manager</p>
                    </a>
                </li>
                <li>
                    <a href="https://framework.iumio.com/contact">
                        <i class="pe-7s-phone"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li>
                    <a href="https://framework.iumio.com">
                        <i class="pe-7s-world"></i>
                        <p>Website</p>
                    </a>
                </li>
                <li>
                    <a href="https://docs.framework.iumio.com/">
                        <i class="pe-7s-news-paper"></i>
                        <p>Documentation</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed <?= $this->color_class_checked ?>">
            <div class="container-fluid">
                <div class="navbar-header w100">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-center center-block w100 fw900" href="#"><?= $this->code.' '.$this->codeTitle ?> - <?= ucfirst(strtolower($this->env)) ?> - URL : <?= $_SERVER['REQUEST_URI'] ?>

                    </a>
                </div>
                <div class="collapse navbar-collapse text-center ">
                    <ul class="nav navbar-nav center-block text-center w100">
                        <li class="text-center w100">  <h5>Generated : <?php echo $this->time->format("l, F d ").' at '.$this->time->format("H:i:s") ?></h5></li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">An Error was generated</h4>
                                <p class="category fs16">UIDIE : <strong><?= $this->uidie ?></strong></p>
                                <p class="category fs16">Code : <?= $this->code ?> | Type : <?= $this->codeTitle ?></p>
                                <p class="category fs16">Generated : <?php echo $this->time->format("l, F d ").' at '.$this->time->format("H:i:s") ?></p>
                                <p class="category fs16">Method : <?php echo  $_SERVER['REQUEST_METHOD'] ?></p>
                                <p class="category fs16">Referer IP : [ <?php echo  $this->client_ip ?>]</p>
                            </div>
                            <div class="content text-center">
                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Explain</p><?= $this->explain ?></h5>
                                </div>

                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Solution</p><?= $this->solution ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : <?= $this->code ?> | Type : <?= $this->codeTitle ?></p>
                            </div>
                            <div class="content text-center">
                                <?php foreach ($this->getTrace() as $one) { ?>
                                    <div class="content text-center card-content-new">
                                        <?php if (isset($one['file'])) { ?>
                                        <div class="typo-line">
                                            <span class="break-word"><p class="category">File</p><?= ((isset($one['file']))? $one['file'] : "*") ?></span>
                                        </div>
                                        <?php } ?>
                                        <div class="typo-line">
                                            <span class="break-word"><p class="category">Function <?= (isset($one['line']))? "& Line" : "" ?></p><?= $one['class'].$one['type']. $one['function'] ?> <?= (isset($one['line']))? "on line ".$one['line'] : "" ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Error Logs</h4>
                                <p class="category">Last logs error</p>
                            </div>
                            <div class="content">
                                <ul class="errorlastlog" attr-href="<?php $master = new \iumioFramework\Masters\iumioUltimaMaster(); echo $master->generateRoute("iumio_manager_logs_get", null, "ManagerApp") ?>">

                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <?= date('Y') ?> <a href="https://framework.iumio.com">iumio Framework</a>, an <a href="https://iumio.com/">iumio Component</a>
                </p>
            </div>
        </footer>
        <?= (\iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() != "#none")? \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() : "" ?>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="<?= WEB_LIBS.'/jquery/' ?>jquery.js" type="text/javascript"></script>
<script src="<?= WEB_LIBS.'/bootstrap/' ?>js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?= WEB_LIBS.'/iumio_manager/' ?>js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Notifications Plugin    -->
<script src="<?= WEB_LIBS.'/iumio_manager/' ?>js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?= WEB_LIBS.'/iumio_manager/' ?>js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="<?= WEB_LIBS.'/iumio_manager/' ?>js/demo.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="<?= WEB_LIBS.'/iumio_manager/' ?>js/main.js"></script>

<?php \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getJsTaskBar() ?>

</html>
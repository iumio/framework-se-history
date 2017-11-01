<?php
/* Smarty version 3.1.31, created on 2017-11-01 16:59:48
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/autoloadermanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f9ef74e251f4_48326213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc60c56540555fe7f4861b3f9804ed572e67882d' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/autoloadermanager.tpl',
      1 => 1507506917,
      2 => 'file',
    ),
    '9636b9e2ab66ecd95945621d4c4590b795da12c8' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/template.tpl',
      1 => 1507506917,
      2 => 'file',
    ),
    '4272bd7fa29d23e51bc8a3ce682dda047a1aa35c' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl',
      1 => 1508520329,
      2 => 'file',
    ),
    '78362d8cd43c7d647ff958f8ace607fc042c7b9c' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/toogle.tpl',
      1 => 1507506917,
      2 => 'file',
    ),
    'a5da643199f93f99cf8e3ae6d0c04bfae146dc8f' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/footer.tpl',
      1 => 1500930134,
      2 => 'file',
    ),
    'a4b5ca6d0f16492b5758e12dc35e02e3583c9161' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/modal.tpl',
      1 => 1497258153,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_59f9ef74e251f4_48326213 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="http://iumio.framework.in:8888/components/libs/iumio_manager/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://iumio.framework.in:8888/components/libs/iumio_manager/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://iumio.framework.in:8888/components/libs/iumio_manager/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="http://iumio.framework.in:8888/components/libs/iumio_manager/img/favicon/manifest.json">
    <link rel="mask-icon" href="http://iumio.framework.in:8888/components/libs/iumio_manager/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>iumio Manager</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href='http://iumio.framework.in:8888/components/libs/bootstrap/css/bootstrap.min.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/animate.css/animate.min.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/light-bootstrap-dashboard.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/demo.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/index.css' rel='stylesheet' />

    <!--     Fonts and icons     -->
    <link href='http://iumio.framework.in:8888/components/libs/font-awesome/css/font-awesome.min.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/light-bootstrap-dashboard.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/pe-icon-7-stroke.css' rel='stylesheet' />

</head>

<body>


    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="http://iumio.framework.in:8888/components/libs/iumio_framework/img/iumio_img_theme.jpeg">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive img-responsive-iumio-framework" src="http://iumio.framework.in:8888/components/libs/iumio_framework/img/iumio.logo.white.framework.png" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav sidebar-list">
        <li class="">
            <a href="/_manager/dashboard">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/apps">
                <i class="pe-7s-config"></i>
                <p>Apps</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/cache">
                <i class="pe-7s-back-2"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/compile">
                <i class="pe-7s-angle-right"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/assets">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/smarty">
                <i class="pe-7s-note2"></i>
                <p>Smarty</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/routing">
                <i class="pe-7s-link"></i>
                <p>Routing</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/logs">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/databases">
                <i class="pe-7s-paperclip"></i>
                <p>Databases</p>
            </a>
        </li>
        <li class="active">
            <a href="/_manager/autoloader">
                <i class="pe-7s-magic-wand"></i>
                <p>Engine Autoloader</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/hosts">
                <i class="pe-7s-target"></i>
                <p>Hosts</p>
            </a>
        </li>
    </ul>
</div>
</div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle toggle-iumio-manager" data-toggle="collapse" data-target="#navigation-example-2" style="padding-top: 17px;">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
                    <a class="navbar-brand" href="#">Autoloader Manager</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
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
                                <h4 class="title">Autoloader statistics</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content autoloaderStats" attr-href="/_manager/autoloader/get/statistics">
                                <ul>
                                    <li>Class for dev  : <span class="class-auto-dev">0</span> </li>
                                    <li>Class for prod : <span class="class-auto-prod">0</span></li>
                                    <li>Uniques Files  : <span class="uni-auto">0</span></li>
                                    <li>Master classes : <span class="mast-auto">0</span></li>
                                    <li>App classes    : <span class="app-auto">0</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Actions</h4>
                                    <p class="category">Manage autoloader ClassMap</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderdev"  attr-href="/_manager/autoloader/build/dev ">Rebuild dev</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderprod"  attr-href="/_manager/autoloader/build/prod">Build prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn clearautoloaderprod"  attr-href="/_manager/autoloader/clear/prod">Clear prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderall"  attr-href="/_manager/autoloader/build/all">Build all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
            <footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
            &copy; 2017 <a href="https://framework.iumio.com">iumio Framework</a>, The next generation of PHP frameworks
        </p>
    </div>
</footer>

        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalManager" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalManagerTitle"></h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn-valid btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<!--   Core JS Files   -->
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/jquery/jquery.js'></script>
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/bootstrap/js/bootstrap.min.js'></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/bootstrap-checkbox-radio-switch.js'></script>
<!--  Notifications Plugin    -->
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/bootstrap-notify.js'></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/light-bootstrap-dashboard.js'></script>

<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/demo.js'></script>

<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/main.js'></script>

</body>
</html><?php }
}

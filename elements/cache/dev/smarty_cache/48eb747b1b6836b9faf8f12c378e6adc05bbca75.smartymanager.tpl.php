<?php
/* Smarty version 3.1.32-dev-1, created on 2017-06-04 01:01:31
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/smartymanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59333fcb581fe6_80856597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11dc170af87665ac57c82823b3e80d45257bae06' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/smartymanager.tpl',
      1 => 1496523793,
      2 => 'file',
    ),
    '9636b9e2ab66ecd95945621d4c4590b795da12c8' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/template.tpl',
      1 => 1496393730,
      2 => 'file',
    ),
    '4272bd7fa29d23e51bc8a3ce682dda047a1aa35c' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl',
      1 => 1496530225,
      2 => 'file',
    ),
    'a5da643199f93f99cf8e3ae6d0c04bfae146dc8f' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/footer.tpl',
      1 => 1495050134,
      2 => 'file',
    ),
    'a4b5ca6d0f16492b5758e12dc35e02e3583c9161' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/modal.tpl',
      1 => 1495658020,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_59333fcb581fe6_80856597 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/animate.min.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/light-bootstrap-dashboard.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/demo.css' rel='stylesheet' />
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/index.css' rel='stylesheet' />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://iumio.framework.in:8888/components/libs/iumio_manager/css/pe-icon-7-stroke.css' rel='stylesheet' />

</head>

<body>


    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="http://iumio.framework.in:8888/components/libs/iumio_framework/img/iumio_img_theme.jpeg">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive" src="http://iumio.framework.in:8888/components/libs/iumio_framework/img/logo_white.png" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav">
        <li class="">
            <a href="/_manager/dashboard">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/apps">
                <i class="pe-7s-user"></i>
                <p>App</p>
            </a>
        </li>
        <li class="" style="background-color: silver">
            <a href="#">
                <i class="pe-7s-user"></i>
                <p>Base App (Later)</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/cache">
                <i class="pe-7s-light"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/compile">
                <i class="pe-7s-comment"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="">
            <a href="/_manager/assets">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="active">
            <a href="/_manager/smarty">
                <i class="pe-7s-note2"></i>
                <p>Smarty Manager</p>
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
    </ul>
</div>
</div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Smarty Manager</a>
                    </div>

                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">List of smarty configurations</h4>
                                    <p class="category">Referer to smarty.json</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>Config name</th>
                                        <th>Debug</th>
                                        <th>Cache</th>
                                        <th>Console</th>
                                        <th>Edit</th>
                                        </thead>
                                        <tbody class="smartyconfigs" attr-href="/_manager/smarty/get/all">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://framework.iumio.com">iumio Framework</a>, The next generation of PHP frameworks
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
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/demo.js'></script>

<script type='text/javascript' src='http://iumio.framework.in:8888/components/libs/iumio_manager/js/main.js'></script>

</body>
</html><?php }
}

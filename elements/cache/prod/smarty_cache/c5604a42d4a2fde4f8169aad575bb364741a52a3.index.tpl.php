<?php
/* Smarty version 3.1.31, created on 2017-12-29 21:37:10
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a46a776e2e692_28121561',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    'a77c97f74e3f537a29905648901029a87e484fba' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl',
      1 => 1514579732,
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
      1 => 1511554541,
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
      1 => 1511948740,
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
function content_5a46a776e2e692_28121561 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li class="active">
            <a href="/index.php/_manager/dashboard">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/apps">
                <i class="pe-7s-config"></i>
                <p>Apps</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/cache">
                <i class="pe-7s-back-2"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/compile">
                <i class="pe-7s-angle-right"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/assets">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/smarty">
                <i class="pe-7s-note2"></i>
                <p>Smarty</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/routing">
                <i class="pe-7s-link"></i>
                <p>Routing</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/logs">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/databases">
                <i class="pe-7s-paperclip"></i>
                <p>Databases</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/autoloader">
                <i class="pe-7s-magic-wand"></i>
                <p>Engine Autoloader</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/hosts">
                <i class="pe-7s-target"></i>
                <p>Hosts</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/services">
                <i class="pe-7s-settings"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/deployer">
                <i class="pe-7s-check"></i>
                <p>Deployer</p>
            </a>
        </li>
        <li class="">
            <a href="/index.php/_manager/api">
                <i class="pe-7s-airplay"></i>
                <p>API</p>
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
                        <a class="navbar-brand" href="#">Dashboard</a>
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
                        <div class="col-md-6">
                            <div class="h350 card">
                                <div class="header">
                                    <h4 class="title">iumio Framework instance</h4>
                                    <p class="category">Informations about iumio Framework instance</p>
                                </div>
                                
                                <div class="content"  style="overflow: auto;padding-left: 40px;max-height: 220px;">
                                    <ul class="break-word col-md-12">
                                        <li><?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::finfo(array('name'=>'VERSION_EDITION'),$_smarty_tpl);?>
 </li>

                                        <li>Version : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::finfo(array('name'=>'VERSION_STAGE'),$_smarty_tpl);?>
 <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::finfo(array('name'=>'VERSION'),$_smarty_tpl);?>
 </li>

                                        <li>Build number : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::finfo(array('name'=>'VERSION_ID'),$_smarty_tpl);?>
 </li>

                                        <li>Installation date : <?php echo $_smarty_tpl->tpl_vars['fi']->value->installation;?>
</li>

                                        <?php if (isset($_smarty_tpl->tpl_vars['fi']->value->deployment)) {?><li>Deployment date : <?php echo $_smarty_tpl->tpl_vars['fi']->value->deployment;?>
</li><?php }?>

                                        <li>Main location installed : <?php echo $_smarty_tpl->tpl_vars['fi']->value->location;?>
</li>

                                        <li>Default environment : <?php echo $_smarty_tpl->tpl_vars['fi']->value->default_env;?>
</li>

                                    </ul>

                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Server Informations</h4>
                                    <p class="category">Informations about server instance</p>
                                </div>
                                <div class="content" style="overflow: auto;padding-left: 40px;max-height: 220px;">
                                    
                                    <ul class="col-md-12">
                                        <li>Server : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::sinfo(array('name'=>'SERVER_SOFTWARE'),$_smarty_tpl);?>
</li>
                                        <li>PHP version : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::sinfo(array('name'=>'PHP_VERSION'),$_smarty_tpl);?>
</li>
                                        <li>Domain : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::sinfo(array('name'=>'SERVER_NAME'),$_smarty_tpl);?>
</li>
                                        <li>Protocol : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::sinfo(array('name'=>'SERVER_PROTOCOL'),$_smarty_tpl);?>
</li>
                                        <li>Port : <?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::sinfo(array('name'=>'SERVER_PORT'),$_smarty_tpl);?>
</li>
                                        <li>Use SSL : <?php if ($_smarty_tpl->tpl_vars['https']->value) {?> Yes <?php } else { ?> No <?php }?> </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Logs events</h4>
                                    <p class="category">Last events logs for <strong><?php echo $_smarty_tpl->tpl_vars['env']->value;?>
</strong> (10)</p>
                                </div>
                                <div class="content" style="overflow: auto;max-height: 220px">
                                    <ul class="lastlog elemcard" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_get'),$_smarty_tpl);?>
">

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">iumio Framework Statistics</h4>
                                    <p class="category">Statistics about iumio Framework instance</p>
                                </div>
                                <div class="content dashboardStats elemcard"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_dashboard_get_statistics'),$_smarty_tpl);?>
" style="overflow: auto;padding-left: 40px">
                                    <ul class="col-md-6">
                                        <li>Apps  : <span class="dashb-app">0</span> </li>
                                        <li>Apps enabled : <span class="dashb-appena">0</span></li>
                                        <li>Apps prefixed  : <span class="dashb-apppre">0</span></li>
                                        <li>Routes  : <span class="dashb-route">0</span></li>
                                        <li>Routes disabled : <span class="dashb-routedisa">0</span></li>
                                        <li>Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                        <li>Databases connected : <span class="dashb-dbco">0</span></li>

                                    </ul>
                                    <ul class="col-md-6">
                                        <li>
                                            <strong>Dev</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-dev">0</span></li>
                                                <li>Events : <span class="dashb-err-dev">0</span></li>
                                                <li>Critical events (500) : <span class="dashb-errcri-dev">0</span></li>
                                                <li>Others events : <span class="dashb-erroth-dev">0</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Prod</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-prod">0</span></li>
                                                <li>Events : <span class="dashb-err-prod">0</span></li>
                                                <li>Critical events (500) : <span class="dashb-errcri-prod">0</span></li>
                                                <li>Others events : <span class="dashb-erroth-prod">0</span></li>
                                            </ul>
                                        </li>


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
            &copy; 2017 <a href="https://framework.iumio.com">iumio Framework</a>, let's create more simply
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

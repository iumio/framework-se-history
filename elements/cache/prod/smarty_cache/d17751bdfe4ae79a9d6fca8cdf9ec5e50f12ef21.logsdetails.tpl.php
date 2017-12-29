<?php
/* Smarty version 3.1.31, created on 2017-12-29 21:37:13
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a46a7796d8101_00986707',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    'ada821d1d88d4f1a33da533c7ac3b7d4cbb6464f' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl',
      1 => 1514579824,
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
    'a4b5ca6d0f16492b5758e12dc35e02e3583c9161' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/modal.tpl',
      1 => 1497258153,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_5a46a7796d8101_00986707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/htdocs/iumio-framework/vendor/libs/smarty/smarty/libs/plugins/modifier.date_format.php';
?><!doctype html>
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
        <li class="active">
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
        <nav class="navbar navbar-default navbar-fixed <?php if ($_smarty_tpl->tpl_vars['details']->value['code'] == 500) {?>navbar-ct-red<?php } elseif ($_smarty_tpl->tpl_vars['details']->value['code'] == 200) {?>navbar-ct-green<?php } else { ?>navbar-ct-orange<?php }?>">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Event with uidie [<?php echo $_smarty_tpl->tpl_vars['details']->value['uidie'];?>
] generated <?php echo $_smarty_tpl->tpl_vars['details']->value['time'];?>
</a>
                    <button type="button" class="navbar-toggle toggle-iumio-manager" data-toggle="collapse" data-target="#navigation-example-2" style="margin-top: 30px!important;margin-right: 20px!important;">
                        Menu
                    </button>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Event characteristics</h4>
                                <p></p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-config"></i> UIDIE : <strong><?php echo $_smarty_tpl->tpl_vars['details']->value['uidie'];?>
</strong></p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-target"></i> Event code : <?php echo $_smarty_tpl->tpl_vars['details']->value['code'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['code_title'];?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-clock"></i> Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['time'],"%A, %B %e, %Y at %r");?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-magnet"></i> Method : <?php echo $_smarty_tpl->tpl_vars['details']->value['method'];?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-server"></i> Environment : <?php echo $_smarty_tpl->tpl_vars['env']->value;?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-link"></i> Path :  <?php echo $_smarty_tpl->tpl_vars['details']->value['uri'];?>
 </p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-user"></i> Referer IP : { <?php echo $_smarty_tpl->tpl_vars['details']->value['client_ip'];?>
 }</p>
                                <hr>
                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['type_error']) && $_smarty_tpl->tpl_vars['details']->value['type_error'] != null) {?> <p class="category fs16"><i class="pe-7s-close-circle"></i> Type : <?php echo $_smarty_tpl->tpl_vars['details']->value['type_error'];?>
</p><hr/><?php }?>
                            </div>
                            <div class="content text-center">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Event details</h4>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['details']->value['code'] != 200) {?>
                            <div class="content" style="padding-top: 0px">
                                <hr>
                                <p class="category fs16"><i class="pe-7s-info"></i> Message :  <span class="fw900 break-word"><?php echo $_smarty_tpl->tpl_vars['details']->value['explain'];?>
</span></h5></p>
                                <hr>
                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['file_error']) && $_smarty_tpl->tpl_vars['details']->value['file_error'] != null) {?>
                                <p class="category fs16 "><i class="pe-7s-paperclip"></i> File :  <span class="fs16 filelink "><?php echo $_smarty_tpl->tpl_vars['details']->value['file_error'];?>
</span></p>

                                <hr>
                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['line_error']) && $_smarty_tpl->tpl_vars['details']->value['line_error'] != null) {?>
                                <p class="category fs16 "><i class="pe-7s-target"></i> Line :  <span class="fw900"><?php echo $_smarty_tpl->tpl_vars['details']->value['line_error'];?>
</span></p>
                                <hr>
                                <?php }?>

                                <p class="category fs16 "><i class="pe-7s-magic-wand"></i> Solution :  <span class=""><?php echo $_smarty_tpl->tpl_vars['details']->value['solution'];?>
</span></p>
                                <hr>
                            </div>
                            <?php } else { ?>
                                <div class="content" style="padding-top: 0px">
                                    <hr>
                                    <p class="category fs16"><i class="pe-7s-info"></i> Message :  The request for URL  <strong><?php echo $_smarty_tpl->tpl_vars['details']->value['uri'];?>
</strong> was a success</span></h5></p>
                                    <hr>
                                </div>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : <?php echo $_smarty_tpl->tpl_vars['details']->value['code'];?>
 | Type : <?php echo $_smarty_tpl->tpl_vars['details']->value['code_title'];?>
</p>
                            </div>
                            <div class="content text-center">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['details']->value['trace'], 'one');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
?>
                                <div class="content text-center card-content-new">
                                   <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">File</p><?php echo $_smarty_tpl->tpl_vars['one']->value->file;?>
</span>
                                    </div>
                                   <?php }?>
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">Function  <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>& Line<?php }?></p><?php if (isset($_smarty_tpl->tpl_vars['one']->value->class)) {
echo $_smarty_tpl->tpl_vars['one']->value->class;
echo $_smarty_tpl->tpl_vars['one']->value->type;
}
echo $_smarty_tpl->tpl_vars['one']->value->function;?>
  <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>on line <?php echo $_smarty_tpl->tpl_vars['one']->value->line;
}?></span>
                                    </div>
                                </div>
                                <hr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php $_smarty_tpl->_subTemplateRender('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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

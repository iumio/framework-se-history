<?php
/* Smarty version 3.1.32-dev-1, created on 2017-05-19 18:32:25
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_591f1e19bd5307_19814396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4272bd7fa29d23e51bc8a3ce682dda047a1aa35c' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl',
      1 => 1495211450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591f1e19bd5307_19814396 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="sidebar" data-color="blue" data-image="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::img_iumio(array('name'=>'iumio_img_theme.jpeg'),$_smarty_tpl);?>
">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive" src="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::img_iumio(array('name'=>'logo_white.png'),$_smarty_tpl);?>
" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav">
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "dashboard") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_index'),$_smarty_tpl);?>
">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "appmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_app_manager'),$_smarty_tpl);?>
">
                <i class="pe-7s-user"></i>
                <p>App</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "basemanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_base_app_manager'),$_smarty_tpl);?>
">
                <i class="pe-7s-user"></i>
                <p>Base App</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "assetsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager'),$_smarty_tpl);?>
">
                <i class="pe-7s-note2"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "smartymanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_smarty_manager'),$_smarty_tpl);?>
">
                <i class="pe-7s-note2"></i>
                <p>Smarty Manager</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "logsmanager") {?>active<?php }?>">
            <a href="typography.html">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "http") {?>active<?php }?>">
            <a href="icons.html">
                <i class="pe-7s-science"></i>
                <p>HTTP Listener</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "maps") {?>active<?php }?>">
            <a href="maps.html">
                <i class="pe-7s-map-marker"></i>
                <p>Maps</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "notification") {?>active<?php }?>">
            <a href="notifications.html">
                <i class="pe-7s-bell"></i>
                <p>Notifications</p>
            </a>
        </li>
    </ul>
</div>
</div><?php }
}

<?php
/* Smarty version 3.1.31, created on 2017-08-28 08:34:27
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a3b973170e87_16219001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4272bd7fa29d23e51bc8a3ce682dda047a1aa35c' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl',
      1 => 1500928260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a3b973170e87_16219001 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '75144270959a3b972a2c4e6_07097016';
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
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_index','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "appmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_app_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-user"></i>
                <p>App</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "cachemanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_cache_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-light"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "compilemanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_compile_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-comment"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "assetsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "smartymanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_smarty_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-note2"></i>
                <p>Smarty Manager</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "routingmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_routing_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-diamond"></i>
                <p>Routing Manager</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "logsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "databasesmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_databases_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-paperclip"></i>
                <p>Databases</p>
            </a>
        </li>
    </ul>
</div>
</div><?php }
}

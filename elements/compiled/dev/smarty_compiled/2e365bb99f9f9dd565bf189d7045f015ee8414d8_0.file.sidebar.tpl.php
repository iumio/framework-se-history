<?php
/* Smarty version 3.1.31, created on 2018-01-25 19:23:20
  from "/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a6a20986df497_65743615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e365bb99f9f9dd565bf189d7045f015ee8414d8' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/partials/sidebar.tpl',
      1 => 1514927420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6a20986df497_65743615 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="sidebar" data-color="blue">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive img-responsive-iumio-framework" src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::imgiumio(array('name'=>'iumio.logo.white.framework.png'),$_smarty_tpl);?>
" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav sidebar-list">
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "dashboard") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_index','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "appmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_app_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-config"></i>
                <p>Apps</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "cachemanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_cache_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-back-2"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "compilemanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_compile_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-angle-right"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "assetsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "smartymanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_smarty_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-note2"></i>
                <p>Smarty</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "routingmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_routing_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-link"></i>
                <p>Routing</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "logsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "databasesmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_databases_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-paperclip"></i>
                <p>Databases</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "autoloadermanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-magic-wand"></i>
                <p>Engine Autoloader</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "hostsmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_hosts_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-target"></i>
                <p>Hosts</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "servicesmanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_services_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-settings"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "deployermanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_deployer_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-check"></i>
                <p>Deployer</p>
            </a>
        </li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['selected']->value == "apimanager") {?>active<?php }?>">
            <a href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_api_manager','component'=>'yes'),$_smarty_tpl);?>
">
                <i class="pe-7s-airplay"></i>
                <p>API</p>
            </a>
        </li>
    </ul>
</div>
</div>
<?php }
}

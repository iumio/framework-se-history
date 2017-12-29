<?php
/* Smarty version 3.1.31, created on 2017-12-29 21:37:06
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/appmanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a46a772508dc5_15037664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16c321bd71390f44372955b27069d31a6d109829' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/appmanager.tpl',
      1 => 1514579732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/toogle.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_5a46a772508dc5_15037664 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '18922354095a46a771666933_11788461';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1385246385a46a77171d487_63762657', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_1385246385a46a77171d487_63762657 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_1385246385a46a77171d487_63762657',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->cached->hashes['18922354095a46a771666933_11788461'] = true;
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <?php $_smarty_tpl->_subTemplateRender('file:partials/toogle.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                        <a class="navbar-brand" href="#">App Manager</a>
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
                                    <h4 class="title">Apps statistics</h4>
                                    <p class="category">Statistics</p>
                                </div>
                                <div class="content dashboardStats" attr-href="<?php echo '/*%%SmartyNocache:18922354095a46a771666933_11788461%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_dashboard_get_statistics\'),$_smarty_tpl);?>
/*/%%SmartyNocache:18922354095a46a771666933_11788461%%*/';?>
">
                                    <ul>
                                        <li>Apps  : <span class="dashb-app">0</span> </li>
                                        <li>Apps enabled : <span class="dashb-appena">0</span></li>
                                        <li>Apps prefixed  : <span class="dashb-apppre">0</span></li>
                                        <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                        <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                        <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                        <li class="iumiohidden">Requests successful : <span class="dashb-reqsuc">0</span></li>
                                        <li class="iumiohidden">Errors : <span class="dashb-err">0</span></li>
                                        <li class="iumiohidden">Critical Errors (Error 500) : <span class="dashb-errcri">0</span></li>
                                        <li class="iumiohidden">Others Errors : <span class="dashb-erroth">0</span></li>
                                        <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Options</h4>
                                    <p class="category">Create and import an app</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-6">
                                            <a class="btn-default btn createapp"  attr-href="<?php echo '/*%%SmartyNocache:18922354095a46a771666933_11788461%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_app_manager_create_app\'),$_smarty_tpl);?>
/*/%%SmartyNocache:18922354095a46a771666933_11788461%%*/';?>
">Create a new app</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn-default btn importapp"  attr-href="<?php echo '/*%%SmartyNocache:18922354095a46a771666933_11788461%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_app_manager_import_app\'),$_smarty_tpl);?>
/*/%%SmartyNocache:18922354095a46a771666933_11788461%%*/';?>
">Import an app</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">List of your apps</h4>
                                    <p class="category">Referer to apps.json</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Enabled</th>
                                        <th>Prefix</th>
                                        <th>Namespace</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Export</th>
                                        </thead>
                                        <tbody class="applist" attr-href="<?php echo '/*%%SmartyNocache:18922354095a46a771666933_11788461%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_app_manager_get_simple_apps\'),$_smarty_tpl);?>
/*/%%SmartyNocache:18922354095a46a771666933_11788461%%*/';?>
">
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $_smarty_tpl->_subTemplateRender('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        </div>
    </div>
<?php
}
}
/* {/block "principal"} */
}

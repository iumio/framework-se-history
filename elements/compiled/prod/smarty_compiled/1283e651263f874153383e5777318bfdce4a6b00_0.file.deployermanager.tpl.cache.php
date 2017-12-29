<?php
/* Smarty version 3.1.31, created on 2017-12-29 21:45:50
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/deployermanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a46a97e17d4d4_50833841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1283e651263f874153383e5777318bfdce4a6b00' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/deployermanager.tpl',
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
function content_5a46a97e17d4d4_50833841 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '787431195a46a97d63b386_12671618';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_892883665a46a97d6bb139_44347459', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_892883665a46a97d6bb139_44347459 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_892883665a46a97d6bb139_44347459',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->cached->hashes['787431195a46a97d63b386_12671618'] = true;
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

                    <a class="navbar-brand" href="#">Deployer Manager</a>
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
                    <?php if ($_smarty_tpl->tpl_vars['default_env']->value === "dev") {?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Options</h4>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                            <p class="text-center text-deploy-iumio"></p>
                                            <a class="btn-default btn deployprod btn-success" style="width: 170px!important;" attr-href="<?php echo '/*%%SmartyNocache:787431195a46a97d63b386_12671618%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_deployer_manager_process_deploy\'),$_smarty_tpl);?>
/*/%%SmartyNocache:787431195a46a97d63b386_12671618%%*/';?>
">Deploy to production</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Deployment requirements</h4>
                                    <p class="category">Things required to deploy properly</p>
                                </div>
                                <div class="content iumio-overflow-x">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody class="requirements-deployment" attr-current-default-env="<?php echo '/*%%SmartyNocache:787431195a46a97d63b386_12671618%%*/<?php echo $_smarty_tpl->tpl_vars[\'default_env\']->value;?>
/*/%%SmartyNocache:787431195a46a97d63b386_12671618%%*/';?>
" attr-href="<?php echo '/*%%SmartyNocache:787431195a46a97d63b386_12671618%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_deployer_manager_requirements_deploy\'),$_smarty_tpl);?>
/*/%%SmartyNocache:787431195a46a97d63b386_12671618%%*/';?>
">
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history refresh-req-deploy"></i> Updated <span class="last_up_req_deploy">0</span> minutes ago -
                                        </div>
                                        <a class="text-info iumioDeployReload">Reload requirements</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Status</h4>
                                    <p class="category">Deploy properly your application to production environment</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                           <h3 class="text-success">Your(s) application(s) is already deployed.</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="header">
                                    <h4 class="title">Informations</h4>
                                    <p class="category">You can undeployed your application to switch to development environement</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                            <a class="btn-default btn switchdeploy btn-success" attr-href="<?php echo '/*%%SmartyNocache:787431195a46a97d63b386_12671618%%*/<?php echo iumioFramework\\Core\\Additionnal\\Template\\ViewBasePlugin::route(array(\'name\'=>\'iumio_manager_deployer_manager_switch_deploy\'),$_smarty_tpl);?>
/*/%%SmartyNocache:787431195a46a97d63b386_12671618%%*/';?>
">Switch to dev</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

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

<?php
/* Smarty version 3.1.31, created on 2018-01-29 15:51:15
  from "/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/deployermanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a6f34e35617e6_05180082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5babaa9ff92b6a6041a4ae441b69dc2e29007e96' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/deployermanager.tpl',
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
function content_5a6f34e35617e6_05180082 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7622465915a6f34e1991096_09570365', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_7622465915a6f34e1991096_09570365 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_7622465915a6f34e1991096_09570365',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php $_smarty_tpl->_subTemplateRender('file:partials/toogle.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
                                            <a class="btn-default btn deployprod btn-success" style="width: 170px!important;" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_deployer_manager_process_deploy'),$_smarty_tpl);?>
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
                                            <tbody class="requirements-deployment" attr-current-default-env="<?php echo $_smarty_tpl->tpl_vars['default_env']->value;?>
" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_deployer_manager_requirements_deploy'),$_smarty_tpl);?>
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
                                            <a class="btn-default btn switchdeploy btn-success" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_deployer_manager_switch_deploy'),$_smarty_tpl);?>
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
            <?php $_smarty_tpl->_subTemplateRender('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        </div>
    </div>
<?php
}
}
/* {/block "principal"} */
}

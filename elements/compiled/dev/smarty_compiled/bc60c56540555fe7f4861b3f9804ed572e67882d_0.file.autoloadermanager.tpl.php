<?php
/* Smarty version 3.1.31, created on 2017-09-28 22:27:02
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/autoloadermanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59cd5b16799d65_85950508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc60c56540555fe7f4861b3f9804ed572e67882d' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/autoloadermanager.tpl',
      1 => 1506179315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_59cd5b16799d65_85950508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_214435869059cd5b16033811_02288238', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_214435869059cd5b16033811_02288238 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_214435869059cd5b16033811_02288238',
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
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
                            <div class="content autoloaderStats" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_get_statistics'),$_smarty_tpl);?>
">
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
                                            <a class="btn-default btn buildautoloaderdev"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_manager_build','params'=>array("env"=>"dev")),$_smarty_tpl);?>
 ">Rebuild dev</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderprod"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_manager_build','params'=>array("env"=>"prod")),$_smarty_tpl);?>
">Build prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn clearautoloaderprod"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_manager_clear','params'=>array("env"=>"prod")),$_smarty_tpl);?>
">Clear prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderall"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_autoloader_manager_build','params'=>array("env"=>"all")),$_smarty_tpl);?>
">Build all</a>
                                        </div>
                                    </div>
                                </div>
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
<?php
}
}
/* {/block "principal"} */
}

<?php
/* Smarty version 3.1.31, created on 2017-09-03 19:14:00
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/assetsmanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ac3858d499b7_06805904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fe7e7930e1626181c81f8d3d0d3091f25092d65' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/assetsmanager.tpl',
      1 => 1500901036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_59ac3858d499b7_06805904 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77952476859ac385872ab41_01402406', "principal");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_77952476859ac385872ab41_01402406 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_77952476859ac385872ab41_01402406',
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
                        <a class="navbar-brand" href="#">Assets Manager</a>

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
                                    <h4 class="title">Options</h4>
                                    <p class="category">Publish and Clear</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishallassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_publish','params'=>array("appname"=>"_all","env"=>"all")),$_smarty_tpl);?>
 ">Publish all</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishalldevassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_publish','params'=>array("appname"=>"_all","env"=>"dev")),$_smarty_tpl);?>
">Publish all dev</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishallprodassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_publish','params'=>array("appname"=>"_all","env"=>"prod")),$_smarty_tpl);?>
">Publish all prod</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearallassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_clear','params'=>array("appname"=>"_all","env"=>"all")),$_smarty_tpl);?>
">Clear all</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearalldevassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_clear','params'=>array("appname"=>"_all","env"=>"dev")),$_smarty_tpl);?>
">Clear all dev</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearallprodassets"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_clear','params'=>array("appname"=>"_all","env"=>"prod")),$_smarty_tpl);?>
">Clear all prod</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">List of your app assets</h4>
                                    <p class="category">Referer to web assets components</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead >
                                        <th>ID</th>
                                        <th>App name</th>
                                        <th>Have assets</th>
                                        <th>Permission dev</th>
                                        <th>Permission prod</th>
                                        <th>Status dev</th>
                                        <th>Status prod</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody class="getAllAssets" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_assets_manager_get_all'),$_smarty_tpl);?>
">

                                        </tbody>
                                    </table>

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

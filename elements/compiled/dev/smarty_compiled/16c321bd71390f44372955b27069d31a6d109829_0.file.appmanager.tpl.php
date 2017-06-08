<?php
/* Smarty version 3.1.32-dev-1, created on 2017-06-08 08:16:56
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/appmanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_5938ebd8ba0c76_91848681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16c321bd71390f44372955b27069d31a6d109829' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/appmanager.tpl',
      1 => 1495780661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_5938ebd8ba0c76_91848681 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8166309285938ebd83b15d7_41258558', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_8166309285938ebd83b15d7_41258558 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_8166309285938ebd83b15d7_41258558',
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
                    <a class="navbar-brand" href="#">App Manager</a>
                    <a class="btn-default btn createapp"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_app_manager_create_app'),$_smarty_tpl);?>
">Create a new app</a>
                </div>

            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of your app</h4>
                                <p class="category">Referer to apps.json</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Is default</th>
                                    <th>Namespace</th>
                                    <th>Swich to default</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody class="applist" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_app_manager_get_simple_apps'),$_smarty_tpl);?>
">
                                    <!--<tr>
                                        <td>0</td>
                                        <td>DakotaRice</td>
                                        <td>Yes</td>
                                        <td>A/A</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>MinervaHooper</td>
                                        <td>No</td>
                                        <td>B/B</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>-->
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

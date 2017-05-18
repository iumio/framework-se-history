<?php
/* Smarty version 3.1.32-dev-1, created on 2017-05-18 19:21:43
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_591dd82730adb6_67242308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a77c97f74e3f537a29905648901029a87e484fba' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl',
      1 => 1495050456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_591dd82730adb6_67242308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1140685440591dd825f1d537_66293684', "principal");
?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_1140685440591dd825f1d537_66293684 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_1140685440591dd825f1d537_66293684',
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
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">iumio Framework</h4>
                                    <p class="category">Characteristics</p>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Framework edition : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::f_info(array('name'=>'VERSION_EDITION'),$_smarty_tpl);?>
 </li>

                                        <li>Actual version : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::f_info(array('name'=>'VERSION_STAGE'),$_smarty_tpl);?>
 <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::f_info(array('name'=>'VERSION'),$_smarty_tpl);?>
 </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Server</h4>
                                    <p class="category">Informations</p>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>PHP version : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'PHP_VERSION'),$_smarty_tpl);?>
</li>
                                        <li>Domain : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'SERVER_NAME'),$_smarty_tpl);?>
</li>
                                    </ul>

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

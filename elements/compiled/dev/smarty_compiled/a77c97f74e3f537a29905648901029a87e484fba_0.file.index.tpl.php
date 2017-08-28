<?php
/* Smarty version 3.1.31, created on 2017-08-24 19:28:05
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_599f0ca5528869_44547639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a77c97f74e3f537a29905648901029a87e484fba' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/index.tpl',
      1 => 1500928019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_599f0ca5528869_44547639 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_694923945599f0ca437ada3_52257936', "principal");
?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_694923945599f0ca437ada3_52257936 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_694923945599f0ca437ada3_52257936',
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
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                        </ul>
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

                                        <li>Installation date : <?php echo $_smarty_tpl->tpl_vars['fi']->value->installation;?>
</li>

                                        <li>User install : <?php echo $_smarty_tpl->tpl_vars['fi']->value->user;?>
</li>

                                        <li>Base location install : <?php echo $_smarty_tpl->tpl_vars['fi']->value->location;?>
</li>

                                        <li>Base OS install : <?php echo $_smarty_tpl->tpl_vars['fi']->value->os;?>
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
                                        <li>Server : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'SERVER_SOFTWARE'),$_smarty_tpl);?>
</li>
                                        <li>PHP version : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'PHP_VERSION'),$_smarty_tpl);?>
</li>
                                        <li>Domain : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'SERVER_NAME'),$_smarty_tpl);?>
</li>
                                        <li>User Agent : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'HTTP_USER_AGENT'),$_smarty_tpl);?>
</li>
                                        <li>Protocol : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'SERVER_PROTOCOL'),$_smarty_tpl);?>
</li>
                                        <li>Port : <?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::s_info(array('name'=>'SERVER_PORT'),$_smarty_tpl);?>
</li>
                                        <li>Use SSL : <?php if ($_smarty_tpl->tpl_vars['https']->value) {?> Yes <?php } else { ?> No <?php }?> </li>
                                     </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Logs</h4>
                                    <p class="category">Last logs error</p>
                                </div>
                                <div class="content">
                                    <ul class="lastlog" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_logs_get'),$_smarty_tpl);?>
">

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

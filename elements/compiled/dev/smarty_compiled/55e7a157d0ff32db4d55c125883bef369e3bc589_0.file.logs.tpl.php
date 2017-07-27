<?php
/* Smarty version 3.1.32-dev-1, created on 2017-07-27 13:48:25
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_5979d309f0a893_46960899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e7a157d0ff32db4d55c125883bef369e3bc589' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl',
      1 => 1501156065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_5979d309f0a893_46960899 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21014394095979d30950fa45_63823203', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_21014394095979d30950fa45_63823203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_21014394095979d30950fa45_63823203',
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
                    <a class="navbar-brand" href="#">Logs Manager</a>
                    <a class="btn-default btn clearlogs"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_clear'),$_smarty_tpl);?>
" attr-env="<?php echo $_smarty_tpl->tpl_vars['env']->value;?>
">Clear logs</a>
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
                                <h4 class="title">Logs list for <?php echo $_smarty_tpl->tpl_vars['env']->value;?>
 enviromnment </h4>
                                <p class="category">Referer to <?php echo $_smarty_tpl->tpl_vars['env']->value;?>
.log.json</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>UIDIE</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Method</th>
                                    <th>Explain</th>
                                    </thead>
                                    <tbody class="logslist" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_get_all'),$_smarty_tpl);?>
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

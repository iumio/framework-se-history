<?php
/* Smarty version 3.1.31, created on 2017-09-03 19:15:26
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ac38aedaa543_57909134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e7a157d0ff32db4d55c125883bef369e3bc589' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl',
      1 => 1504458783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_59ac38aedaa543_57909134 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '178436230159ac38ae72fc30_02878874';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_28657816159ac38ae7840d8_59088273', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_28657816159ac38ae7840d8_59088273 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_28657816159ac38ae7840d8_59088273',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
                                <h4 class="title">Logs statistics</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content dashboardStats" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'iumio_manager_dashboard_get_statistics'),$_smarty_tpl);?>
">
                                <ul>
                                    <li class="iumiohidden">Apps  : <span class="dashb-app">0</span> </li>
                                    <li class="iumiohidden">Apps enabled : <span class="dashb-appena">0</span></li>
                                    <li class="iumiohidden">App prefixed  : <span class="dashb-apppre">0</span></li>
                                    <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                    <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                    <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                    <li>Requests successful : <span class="dashb-reqsuc">0</span></li>
                                    <li>Errors : <span class="dashb-err">0</span></li>
                                    <li>Critical Errors (Error 500) : <span class="dashb-errcri">0</span></li>
                                    <li>Others Errors : <span class="dashb-erroth">0</span></li>
                                    <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
            <?php $_smarty_tpl->_subTemplateRender('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        </div>
    </div>
<?php
}
}
/* {/block "principal"} */
}

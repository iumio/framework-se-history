<?php
/* Smarty version 3.1.31, created on 2017-09-29 11:31:08
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ce12dcca1f18_36336455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e7a157d0ff32db4d55c125883bef369e3bc589' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logs.tpl',
      1 => 1506584317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_59ce12dcca1f18_36336455 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_146568393359ce12dc5086f4_65277305', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_146568393359ce12dc5086f4_65277305 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_146568393359ce12dc5086f4_65277305',
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
                    <a class="btn-default btn clearlogs"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_clear','params'=>array('env'=>"dev")),$_smarty_tpl);?>
" attr-env="dev">Clear logs - dev</a>
                    <a class="btn-default btn clearlogs"  attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_clear','params'=>array('env'=>"prod")),$_smarty_tpl);?>
" attr-env="prod">Clear logs - prod</a>
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
                                <h4 class="title">Logs statistics for Dev environment</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content dashboardStats" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_dashboard_get_statistics'),$_smarty_tpl);?>
">
                                <ul>
                                    <li class="iumiohidden">Apps  : <span class="dashb-app">0</span> </li>
                                    <li class="iumiohidden">Apps enabled : <span class="dashb-appena">0</span></li>
                                    <li class="iumiohidden">App prefixed  : <span class="dashb-apppre">0</span></li>
                                    <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                    <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                    <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                    <li>Requests successful : <span class="dashb-reqsuc-dev">0</span></li>
                                    <li>Errors : <span class="dashb-err-dev">0</span></li>
                                    <li>Critical Errors (500) : <span class="dashb-errcri-dev">0</span></li>
                                    <li>Others Errors : <span class="dashb-erroth-dev">0</span></li>
                                    <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs statistics for Prod environment</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content dashboardStats2" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_dashboard_get_statistics'),$_smarty_tpl);?>
">
                                <ul>
                                    <li class="iumiohidden">Apps  : <span class="dashb-app">0</span> </li>
                                    <li class="iumiohidden">Apps enabled : <span class="dashb-appena">0</span></li>
                                    <li class="iumiohidden">App prefixed  : <span class="dashb-apppre">0</span></li>
                                    <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                    <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                    <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                    <li>Requests successful : <span class="dashb-reqsuc-prod">0</span></li>
                                    <li>Errors : <span class="dashb-err-prod">0</span></li>
                                    <li>Critical Errors (500) : <span class="dashb-errcri-prod">0</span></li>
                                    <li>Others Errors : <span class="dashb-erroth-prod">0</span></li>
                                    <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs list for Dev environment (<span class="iumiocountlog">0</span>)</h4>
                                <p class="category">Referer to dev.log.json</p>
                            </div>
                            <div class="content table-responsive table-full-width iumio-unlimited-log-display">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>UIDIE</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Method</th>
                                    </thead>
                                    <tbody class="logslist" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_get_all','params'=>array('env'=>"dev")),$_smarty_tpl);?>
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
                                <div class="col-md-12 text-center loader-iumio-m pulse animated" style="display: none">
                                    <i class="fa fa-search fa-3x center-block text-center"></i>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs list for Prod environment (<span class="iumiocountlog2">0</span>)</h4>
                                <p class="category">Referer to prod.log.json</p>
                            </div>
                            <div class="content table-responsive table-full-width iumio-unlimited-log-display2">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>UIDIE</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Method</th>
                                    </thead>
                                    <tbody class="logslist2" attr-href="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::route(array('name'=>'iumio_manager_logs_manager_get_all','params'=>array('env'=>"prod")),$_smarty_tpl);?>
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
                                <div class="col-md-12 text-center loader-iumio-m2 pulse animated" style="display: none">
                                    <i class="fa fa-search fa-3x center-block text-center"></i>
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

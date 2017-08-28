<?php
/* Smarty version 3.1.31, created on 2017-08-24 19:59:39
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_599f140b070fd9_75524753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ada821d1d88d4f1a33da533c7ac3b7d4cbb6464f' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl',
      1 => 1503080125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_599f140b070fd9_75524753 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/htdocs/iumio-framework/vendor/libs/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_858752279599f140b0250c0_26401066', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_858752279599f140b0250c0_26401066 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_858752279599f140b0250c0_26401066',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed <?php if ($_smarty_tpl->tpl_vars['details']->value->code == 500) {?>navbar-ct-red<?php } else { ?>navbar-ct-orange<?php }?>">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logs Manager  - UIDIE : <?php echo $_smarty_tpl->tpl_vars['details']->value->uidie;?>
 - <?php echo $_smarty_tpl->tpl_vars['details']->value->code;?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value->code_title;?>
</a>
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
                                <h4 class="title">Error details</h4>
                                <p class="category fs16">UIDIE : <strong><?php echo $_smarty_tpl->tpl_vars['details']->value->uidie;?>
</p>
                                <p class="category fs16">Environment : <strong><?php echo $_smarty_tpl->tpl_vars['env']->value;?>
</p>
                                <p class="category fs16">Code : <?php echo $_smarty_tpl->tpl_vars['details']->value->code;?>
 | Type : <?php echo $_smarty_tpl->tpl_vars['details']->value->code_title;?>
</p>
                                <p class="category fs16">Generated : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value->time->date,"%A, %B %e, %Y at %r");?>
</p>
                                <p class="category fs16">Method : <?php echo $_smarty_tpl->tpl_vars['details']->value->method;?>
</p>
                                <p class="category fs16 ">Referer IP : [ <?php echo $_smarty_tpl->tpl_vars['details']->value->client_ip;?>
]</p>
                                <p class="category fs16 break-word">Referer URI :  <?php echo $_smarty_tpl->tpl_vars['details']->value->referer;?>
</p>
                            </div>
                            <div class="content text-center">
                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Explain</p><?php echo $_smarty_tpl->tpl_vars['details']->value->explain;?>
</h5>
                                </div>

                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Solution</p><?php echo $_smarty_tpl->tpl_vars['details']->value->solution;?>
</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : <?php echo $_smarty_tpl->tpl_vars['details']->value->code;?>
 | Type : <?php echo $_smarty_tpl->tpl_vars['details']->value->code_title;?>
</p>
                            </div>
                            <div class="content text-center">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['details']->value->trace, 'one');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
?>
                                <div class="content text-center card-content-new">
                                   <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">File</p><?php echo $_smarty_tpl->tpl_vars['one']->value->file;?>
</span>
                                    </div>
                                   <?php }?>
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">Function  <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>& Line<?php }?></p><?php echo $_smarty_tpl->tpl_vars['one']->value->class;
echo $_smarty_tpl->tpl_vars['one']->value->type;
echo $_smarty_tpl->tpl_vars['one']->value->function;?>
  <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>on line <?php echo $_smarty_tpl->tpl_vars['one']->value->line;
}?></span>
                                    </div>
                                </div>
                                <hr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


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

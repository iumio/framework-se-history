<?php
/* Smarty version 3.1.31, created on 2017-12-29 21:37:13
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a46a779499508_60306814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ada821d1d88d4f1a33da533c7ac3b7d4cbb6464f' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/BaseApps/ManagerApp/Front/views/logsdetails.tpl',
      1 => 1514579824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/sidebar.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
),false)) {
function content_5a46a779499508_60306814 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/htdocs/iumio-framework/vendor/libs/smarty/smarty/libs/plugins/modifier.date_format.php';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_modifier_date_format\')) require_once \'/Applications/MAMP/htdocs/iumio-framework/vendor/libs/smarty/smarty/libs/plugins/modifier.date_format.php\';
?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '1310893945a46a77930b740_59849082';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9729373735a46a7793caea3_89946418', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_9729373735a46a7793caea3_89946418 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_9729373735a46a7793caea3_89946418',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->cached->hashes['1310893945a46a77930b740_59849082'] = true;
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if ($_smarty_tpl->tpl_vars[\'details\']->value[\'code\'] == 500) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
navbar-ct-red<?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php } elseif ($_smarty_tpl->tpl_vars[\'details\']->value[\'code\'] == 200) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
navbar-ct-green<?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php } else { ?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
navbar-ct-orange<?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Event with uidie [<?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'uidie\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
] generated <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'time\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</a>
                    <button type="button" class="navbar-toggle toggle-iumio-manager" data-toggle="collapse" data-target="#navigation-example-2" style="margin-top: 30px!important;margin-right: 20px!important;">
                        Menu
                    </button>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Event characteristics</h4>
                                <p></p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-config"></i> UIDIE : <strong><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'uidie\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</strong></p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-target"></i> Event code : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'code\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
 <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'code_title\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-clock"></i> Date : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'details\']->value[\'time\'],"%A, %B %e, %Y at %r");?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-magnet"></i> Method : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'method\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-server"></i> Environment : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'env\']->value;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-link"></i> Path :  <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'uri\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
 </p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-user"></i> Referer IP : { <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'client_ip\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
 }</p>
                                <hr>
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'details\']->value[\'type_error\']) && $_smarty_tpl->tpl_vars[\'details\']->value[\'type_error\'] != null) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
 <p class="category fs16"><i class="pe-7s-close-circle"></i> Type : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'type_error\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p><hr/><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                            </div>
                            <div class="content text-center">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Event details</h4>
                            </div>
                            <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if ($_smarty_tpl->tpl_vars[\'details\']->value[\'code\'] != 200) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                            <div class="content" style="padding-top: 0px">
                                <hr>
                                <p class="category fs16"><i class="pe-7s-info"></i> Message :  <span class="fw900 break-word"><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'explain\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span></h5></p>
                                <hr>
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'details\']->value[\'file_error\']) && $_smarty_tpl->tpl_vars[\'details\']->value[\'file_error\'] != null) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                <p class="category fs16 "><i class="pe-7s-paperclip"></i> File :  <span class="fs16 filelink "><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'file_error\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span></p>

                                <hr>
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>


                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'details\']->value[\'line_error\']) && $_smarty_tpl->tpl_vars[\'details\']->value[\'line_error\'] != null) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                <p class="category fs16 "><i class="pe-7s-target"></i> Line :  <span class="fw900"><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'line_error\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span></p>
                                <hr>
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>


                                <p class="category fs16 "><i class="pe-7s-magic-wand"></i> Solution :  <span class=""><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'solution\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span></p>
                                <hr>
                            </div>
                            <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php } else { ?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                <div class="content" style="padding-top: 0px">
                                    <hr>
                                    <p class="category fs16"><i class="pe-7s-info"></i> Message :  The request for URL  <strong><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'uri\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</strong> was a success</span></h5></p>
                                    <hr>
                                </div>
                            <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'code\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
 | Type : <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'details\']->value[\'code_title\'];?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p>
                            </div>
                            <div class="content text-center">
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars[\'details\']->value[\'trace\'], \'one\');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars[\'one\']->value) {
?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                <div class="content text-center card-content-new">
                                   <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'one\']->value->file)) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">File</p><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'one\']->value->file;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span>
                                    </div>
                                   <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>

                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">Function  <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'one\']->value->file)) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
& Line<?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</p><?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'one\']->value->class)) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'one\']->value->class;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'one\']->value->type;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'one\']->value->function;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
  <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php if (isset($_smarty_tpl->tpl_vars[\'one\']->value->file)) {?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
on line <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php echo $_smarty_tpl->tpl_vars[\'one\']->value->line;?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';
echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php }?>/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>
</span>
                                    </div>
                                </div>
                                <hr>
                                <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php echo '/*%%SmartyNocache:1310893945a46a77930b740_59849082%%*/<?php $_smarty_tpl->_subTemplateRender(\'file:partials/footer.tpl\', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
/*/%%SmartyNocache:1310893945a46a77930b740_59849082%%*/';?>


        </div>
        
    </div>
<?php
}
}
/* {/block "principal"} */
}

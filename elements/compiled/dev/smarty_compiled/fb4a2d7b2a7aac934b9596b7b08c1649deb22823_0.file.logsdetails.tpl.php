<?php
/* Smarty version 3.1.31, created on 2018-01-29 14:16:25
  from "/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/logsdetails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a6f1ea986e2f6_41917862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb4a2d7b2a7aac934b9596b7b08c1649deb22823' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework-se/vendor/iumio_framework/BaseApps/ManagerApp/Front/views/logsdetails.tpl',
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
function content_5a6f1ea986e2f6_41917862 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/htdocs/iumio-framework-se/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16455266315a6f1ea9771c82_23604862', "principal");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "principal"} */
class Block_16455266315a6f1ea9771c82_23604862 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'principal' => 
  array (
    0 => 'Block_16455266315a6f1ea9771c82_23604862',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="wrapper">
        <?php $_smarty_tpl->_subTemplateRender('file:partials/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed <?php if ($_smarty_tpl->tpl_vars['details']->value['code'] == 500) {?>navbar-ct-red<?php } elseif ($_smarty_tpl->tpl_vars['details']->value['code'] == 200) {?>navbar-ct-green<?php } else { ?>navbar-ct-orange<?php }?>">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Event with uidie [<?php echo $_smarty_tpl->tpl_vars['details']->value['uidie'];?>
] generated <?php echo $_smarty_tpl->tpl_vars['details']->value['time'];?>
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
                                <p class="category fs16"><i class="pe-7s-config"></i> UIDIE : <strong><?php echo $_smarty_tpl->tpl_vars['details']->value['uidie'];?>
</strong></p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-target"></i> Event code : <?php echo $_smarty_tpl->tpl_vars['details']->value['code'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['code_title'];?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-clock"></i> Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['time'],"%A, %B %e, %Y at %r");?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-magnet"></i> Method : <?php echo $_smarty_tpl->tpl_vars['details']->value['method'];?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-server"></i> Environment : <?php echo $_smarty_tpl->tpl_vars['env']->value;?>
</p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-link"></i> Path :  <?php echo $_smarty_tpl->tpl_vars['details']->value['uri'];?>
 </p>
                                <hr>
                                <p class="category fs16"><i class="pe-7s-user"></i> Referer IP : { <?php echo $_smarty_tpl->tpl_vars['details']->value['client_ip'];?>
 }</p>
                                <hr>
                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['type_error']) && $_smarty_tpl->tpl_vars['details']->value['type_error'] != null) {?> <p class="category fs16"><i class="pe-7s-close-circle"></i> Type : <?php echo $_smarty_tpl->tpl_vars['details']->value['type_error'];?>
</p><hr/><?php }?>
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
                            <?php if ($_smarty_tpl->tpl_vars['details']->value['code'] != 200) {?>
                            <div class="content" style="padding-top: 0px">
                                <hr>
                                <p class="category fs16"><i class="pe-7s-info"></i> Message :  <span class="fw900 break-word"><?php echo $_smarty_tpl->tpl_vars['details']->value['explain'];?>
</span></h5></p>
                                <hr>
                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['file_error']) && $_smarty_tpl->tpl_vars['details']->value['file_error'] != null) {?>
                                <p class="category fs16 "><i class="pe-7s-paperclip"></i> File :  <span class="fs16 filelink "><?php echo $_smarty_tpl->tpl_vars['details']->value['file_error'];?>
</span></p>

                                <hr>
                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['details']->value['line_error']) && $_smarty_tpl->tpl_vars['details']->value['line_error'] != null) {?>
                                <p class="category fs16 "><i class="pe-7s-target"></i> Line :  <span class="fw900"><?php echo $_smarty_tpl->tpl_vars['details']->value['line_error'];?>
</span></p>
                                <hr>
                                <?php }?>

                                <p class="category fs16 "><i class="pe-7s-magic-wand"></i> Solution :  <span class=""><?php echo $_smarty_tpl->tpl_vars['details']->value['solution'];?>
</span></p>
                                <hr>
                            </div>
                            <?php } else { ?>
                                <div class="content" style="padding-top: 0px">
                                    <hr>
                                    <p class="category fs16"><i class="pe-7s-info"></i> Message :  The request for URL  <strong><?php echo $_smarty_tpl->tpl_vars['details']->value['uri'];?>
</strong> was a success</span></h5></p>
                                    <hr>
                                </div>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : <?php echo $_smarty_tpl->tpl_vars['details']->value['code'];?>
 | Type : <?php echo $_smarty_tpl->tpl_vars['details']->value['code_title'];?>
</p>
                            </div>
                            <div class="content text-center">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['details']->value['trace'], 'one');
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
                                        <span class="break-word"><p class="category">Function  <?php if (isset($_smarty_tpl->tpl_vars['one']->value->file)) {?>& Line<?php }?></p><?php if (isset($_smarty_tpl->tpl_vars['one']->value->class)) {
echo $_smarty_tpl->tpl_vars['one']->value->class;
echo $_smarty_tpl->tpl_vars['one']->value->type;
}
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

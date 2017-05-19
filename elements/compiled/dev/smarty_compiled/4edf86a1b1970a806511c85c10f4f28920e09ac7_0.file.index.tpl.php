<?php
/* Smarty version 3.1.32-dev-1, created on 2017-05-19 11:05:20
  from "/Applications/MAMP/htdocs/iumio-framework/apps/BAApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_591eb55010ccd4_84518333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4edf86a1b1970a806511c85c10f4f28920e09ac7' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/BAApp/Front/views/index.tpl',
      1 => 1495184714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591eb55010ccd4_84518333 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_620753451591eb550108361_08181129', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_620753451591eb550108361_08181129 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_620753451591eb550108361_08181129',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<p>This is your app </p>
<?php
}
}
/* {/block "parameters"} */
}

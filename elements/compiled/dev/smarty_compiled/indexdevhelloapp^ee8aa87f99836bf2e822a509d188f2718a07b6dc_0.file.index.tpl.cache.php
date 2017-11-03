<?php
/* Smarty version 3.1.31, created on 2017-11-03 16:19:37
  from "/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59fc8909194070_85961067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee8aa87f99836bf2e822a509d188f2718a07b6dc' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl',
      1 => 1508869286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fc8909194070_85961067 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '116644805259fc89090930d5_02773424';
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_92430361259fc890917e160_98657032', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_92430361259fc890917e160_98657032 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_92430361259fc890917e160_98657032',
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

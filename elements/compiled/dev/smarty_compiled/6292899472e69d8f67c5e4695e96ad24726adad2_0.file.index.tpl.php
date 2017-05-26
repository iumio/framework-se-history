<?php
/* Smarty version 3.1.32-dev-1, created on 2017-05-26 07:42:06
  from "/Applications/MAMP/htdocs/iumio-framework/apps/TestApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_5927c02e6ae069_17603974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6292899472e69d8f67c5e4695e96ad24726adad2' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/TestApp/Front/views/index.tpl',
      1 => 1495777321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5927c02e6ae069_17603974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5663198115927c02e6ac167_21002901', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_5663198115927c02e6ac167_21002901 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_5663198115927c02e6ac167_21002901',
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

<?php
/* Smarty version 3.1.31, created on 2017-10-23 12:14:45
  from "/Applications/MAMP/htdocs/iumio-framework/apps/TesteApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59edc11599c333_58285190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89c819741bff62cd8c5d6abc6c4b9a84a9e537c1' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/TesteApp/Front/views/index.tpl',
      1 => 1508753681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59edc11599c333_58285190 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_106475751359edc115999876_50067720', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_106475751359edc115999876_50067720 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_106475751359edc115999876_50067720',
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

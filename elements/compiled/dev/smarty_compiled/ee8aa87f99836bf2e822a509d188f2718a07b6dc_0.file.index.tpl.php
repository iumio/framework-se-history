<?php
/* Smarty version 3.1.31, created on 2017-09-08 17:02:53
  from "/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59b2b11d0d9988_19987193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee8aa87f99836bf2e822a509d188f2718a07b6dc' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl',
      1 => 1504882969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b2b11d0d9988_19987193 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_171080309759b2b11d0d6bb3_59162546', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_171080309759b2b11d0d6bb3_59162546 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_171080309759b2b11d0d6bb3_59162546',
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

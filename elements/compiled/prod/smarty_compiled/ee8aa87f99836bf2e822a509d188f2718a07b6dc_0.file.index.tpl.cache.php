<?php
/* Smarty version 3.1.31, created on 2017-09-03 19:15:42
  from "/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ac38be473288_37507513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee8aa87f99836bf2e822a509d188f2718a07b6dc' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/HelloApp/Front/views/index.tpl',
      1 => 1504369835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ac38be473288_37507513 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '67993085159ac38be417369_67934305';
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_138323931559ac38be471807_77771964', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_138323931559ac38be471807_77771964 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_138323931559ac38be471807_77771964',
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

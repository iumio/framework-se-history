<?php
/* Smarty version 3.1.32-dev-1, created on 2017-06-07 23:47:24
  from "/Applications/MAMP/htdocs/iumio-framework/apps/WApp/Front/views/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_5938746c65fc89_84924404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa4350336f7b89a2189ccd54c8d19aade621cd85' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/WApp/Front/views/index.tpl',
      1 => 1496871833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5938746c65fc89_84924404 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '5250795035938746c5f7c44_53253994';
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6450972375938746c654bf2_91651285', "parameters");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "parameters"} */
class Block_6450972375938746c654bf2_91651285 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'parameters' => 
  array (
    0 => 'Block_6450972375938746c654bf2_91651285',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<p>This is your app <a href="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>'default_test_parameter','params'=>array("hi"=>"test")),$_smarty_tpl);?>
">With param : test</a></p>
<?php
}
}
/* {/block "parameters"} */
}

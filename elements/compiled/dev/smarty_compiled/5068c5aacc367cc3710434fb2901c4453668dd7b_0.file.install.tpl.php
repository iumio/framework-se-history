<?php
/* Smarty version 3.1.31, created on 2017-11-10 07:22:56
  from "/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/install.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a0545c09b48f5_11624130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5068c5aacc367cc3710434fb2901c4453668dd7b' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/install.tpl',
      1 => 1508999202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0545c09b48f5_11624130 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7548890425a0545c005a4c3_79288882', "subtitle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_961531935a0545c005d1f4_62427594', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "subtitle"} */
class Block_7548890425a0545c005a4c3_79288882 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitle' => 
  array (
    0 => 'Block_7548890425a0545c005a4c3_79288882',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 - Contact <?php
}
}
/* {/block "subtitle"} */
/* {block 'content'} */
class Block_961531935a0545c005d1f4_62427594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_961531935a0545c005d1f4_62427594',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <header id="fh5co-hero" data-section="home" role="banner" style="background: url(<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/landscape.jpg'),$_smarty_tpl);?>
) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1 fadeInUp animated">How to install iumio Framework</h2>
                        <p class="to-animate intro-animate-2 fadeInUp animated">Here, you can see how to install the framework perfectly</p>
                        <p class="to-animate intro-animate-3 fadeInUp animated"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> See the installation process</a></p>
                    </div>


                </div>
            </div>
        </div>
    </header>
    <!-- END .header -->

    <div id="fh5co-main">
        <div id="fh5co-features" data-section="features">
            <br>
            <br>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                       <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    </div>


                    <div class="clearfix visible-sm-block"></div>



                </div>
            </div>

        </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}

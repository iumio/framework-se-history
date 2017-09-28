<?php
/* Smarty version 3.1.31, created on 2017-09-25 22:18:06
  from "/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c9647ee49c30_40433936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b42990499c9c24e06175d97251e016bca797763a' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/contact.tpl',
      1 => 1506279145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c9647ee49c30_40433936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_37457897859c9647db1cc60_06906327', "subtitle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129690963159c9647db261f3_87459044', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "subtitle"} */
class Block_37457897859c9647db1cc60_06906327 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitle' => 
  array (
    0 => 'Block_37457897859c9647db1cc60_06906327',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 - Contact <?php
}
}
/* {/block "subtitle"} */
/* {block 'content'} */
class Block_129690963159c9647db261f3_87459044 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_129690963159c9647db261f3_87459044',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <header id="fh5co-hero" data-section="home" role="banner" style="background: url(<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::webassets(array('path'=>'public/images/landscape.jpg'),$_smarty_tpl);?>
) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1">Contact</h2>
                        <p class="to-animate intro-animate-2">Tell us what you mean.</p>
                        <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> Continue</a></p>
                    </div>
                    <div class="col-md-6 text-right fh5co-intro-img to-animate intro-animate-4">
                        <img src="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::webassets(array('path'=>'public/images/iphone_6_3.png'),$_smarty_tpl);?>
" alt="Iphone">
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
                    <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                        <h2 class="fh5co-lead to-animate">Contact us</h2>
                        <p class="fh5co-sub to-animate">A problem ? A question? Or would you like to join us? Fill out the form and we will contact you as soon as possible</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                        <form method="POST" action="<?php echo iumioFramework\Core\Additionnal\Template\iumioViewBasePlugin::route(array('name'=>"website_submit_contact"),$_smarty_tpl);?>
">
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-12"><input type="text" placeholder="Name" class="form-control" name="name" required="required"/> </div>

                                <div class="col-md-6 col-sm-12"><input type="email" placeholder="Email" class="form-control" name="email" required="required"/> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-sm-12"><input type="text" placeholder="Subject" class="form-control" name="subject" required="required"/> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-sm-12"><textarea placeholder="Say us" class="form-control" name="message" required="required"></textarea> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-6"><button type="submit" class="btn btn-primary btn-block">Send</button> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6"><button type="reset" class="btn btn-primary btn-block">Reset</button> </div>
                            </div>
                        </form>
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

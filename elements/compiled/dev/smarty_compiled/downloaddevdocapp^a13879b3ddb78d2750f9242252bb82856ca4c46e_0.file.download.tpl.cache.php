<?php
/* Smarty version 3.1.31, created on 2017-11-01 20:02:48
  from "/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59fa1a58260757_54162765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a13879b3ddb78d2750f9242252bb82856ca4c46e' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/apps/DocApp/Front/views/download.tpl',
      1 => 1509562966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fa1a58260757_54162765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '154972418059fa1a574fd2c9_95532110';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_186705531259fa1a575608c8_56368252', "subtitle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_53934996959fa1a57571a03_60348593', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'template.tpl');
}
/* {block "subtitle"} */
class Block_186705531259fa1a575608c8_56368252 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'subtitle' => 
  array (
    0 => 'Block_186705531259fa1a575608c8_56368252',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 - Download iumio Framework <?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
 <?php
}
}
/* {/block "subtitle"} */
/* {block 'content'} */
class Block_53934996959fa1a57571a03_60348593 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_53934996959fa1a57571a03_60348593',
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
                        <h2 class="to-animate intro-animate-1"><?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
</h2>
                        <p class="to-animate intro-animate-2"><?php echo $_smarty_tpl->tpl_vars['edition_slogan']->value;?>
</p>
                        <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> Continue</a></p>
                    </div>
                    <div class="col-md-6 text-right fh5co-intro-img to-animate intro-animate-4">
                        <img src="<?php echo iumioFramework\Core\Additionnal\Template\ViewBasePlugin::webassets(array('path'=>'public/images/iphone_6_3.png'),$_smarty_tpl);?>
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
                <h2 class="fh5co-lead to-animate"><?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
</h2>
                <p class="fh5co-sub to-animate">Why to download this edition ?</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['edition_features']->value, 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
?>
                    <li> <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
 </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </div>


            <div class="clearfix visible-sm-block"></div>



        </div>
    </div>

    <div id="fh5co-pricing" data-section="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                    <h2 class="fh5co-lead animate-single pricing-animate-1">Download iumio Framework <?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
</h2>
                    <p class="fh5co-sub animate-single pricing-animate-2">You can choose as you want and what you need</p>
                </div>

                <div class="col-md-12 to-animate">
                    <a href="#" class="fh5co-figure active pricing-feature" disabled="disabled">
                        <span class="fh5co-price"><span><strong><?php echo $_smarty_tpl->tpl_vars['short_edition']->value;?>
</strong></span></span>
                        <h3 class="fh5co-figure-lead"><?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
</h3>
                        <p class="fh5co-figure-text"><?php if ($_smarty_tpl->tpl_vars['edition_availability']->value == 1) {?><span class="green">Available</span><?php } else { ?><span class="red">Not available</span><?php }?></p>

                        <?php if ($_smarty_tpl->tpl_vars['edition_availability']->value == 1) {?>
                            <p class="fh5co-figure-text"><?php echo $_smarty_tpl->tpl_vars['edition_url']->value['version_stage'];?>
 version - Published <?php echo $_smarty_tpl->tpl_vars['edition_url']->value['version_published_date'];?>
</p>

                            <div class="row center-block">
                            <div class="col-md-4" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['edition_url']->value['tar.gz'];?>
', '_blank')"><i class="icon-file-zip-o"></i> Version <?php echo $_smarty_tpl->tpl_vars['edition_url']->value['version'];?>
 Tar.gz file</div>
                            <div class="col-md-4" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['edition_url']->value['zip'];?>
', '_blank')"><i class="icon-file-zip-o"></i> Version <?php echo $_smarty_tpl->tpl_vars['edition_url']->value['version'];?>
 .zip file</div>
                            <div class="col-md-4" onclick="window.open('https://github.com/iumio-team/iumio-framework/', '_blank')"><i class="icon-github"></i> Download on Github</div>
                        </div>
                        <?php }?>
                    </a>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}

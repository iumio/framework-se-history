<?php
/* Smarty version 3.1.31, created on 2017-12-10 16:04:06
  from "/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/Core/Additional/TaskBar/views/iumioTaskBar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2d4ce691ea85_76450516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01ae7cd703eb02b5e06ed3bc06798a0f6a4563ba' => 
    array (
      0 => '/Applications/MAMP/htdocs/iumio-framework/vendor/iumio_framework/php/Core/Additional/TaskBar/views/iumioTaskBar.tpl',
      1 => 1512918244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2d4ce691ea85_76450516 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_debug_print_var')) require_once '/Applications/MAMP/htdocs/iumio-framework/vendor/libs/smarty/smarty/libs/plugins/modifier.debug_print_var.php';
if (isset($_smarty_tpl->tpl_vars['iumiotaskbar']->value) && !empty($_smarty_tpl->tpl_vars['iumiotaskbar']->value)) {?>
    <!-- iumioTaskBar component -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['css'], ENT_QUOTES, 'UTF-8');?>
" />
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['css_icon'], ENT_QUOTES, 'UTF-8');?>
" />
    <div id="iumioTaskBarBlank"></div>
    <ul class="iumioTaskBar">
        <li class="flogo iumioTaskBarPulse"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['logo'], ENT_QUOTES, 'UTF-8');?>
"/> </li>
        <li><a class="active" href="#"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['ve'], ENT_QUOTES, 'UTF-8');?>
 - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['env'], ENT_QUOTES, 'UTF-8');?>
</strong></a></li>
        <li><a href="#" class="active"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['call_app'], ENT_QUOTES, 'UTF-8');?>
</strong></a></li>
        <li>
            <a href="#" id="iumioTaskBarRequests" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['get_logs'], ENT_QUOTES, 'UTF-8');?>
"><i class="pe-7s-refresh icon-iumio-task"></i> <span class="iumio-taskbar-text">No requests</span></a>

        </li>
        <li id="iumioTaskBarAssets" class="iumioTaskBarDropdown"><a href="#"><i class="pe-7s-file icon-iumio-task"></i>  <span class="iumio-taskbar-text">Assets</span></a>
            <ul class="iumioTaskBarDropdownContent">
                <li>
                    <table class="iumioTaskbarTable">
                        <thead>
                        <tr>
                            <th colspan="3">Assets Manager - Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="iumioTaskBarAssetsPublishAll"    attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['publish_assets_all'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsPublishDev"    attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['publish_assets_dev'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsPublishProd"   attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['publish_assets_prod'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish prod</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearAll"  attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['clear_assets_all'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearDev"  attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['clear_assets_dev'], ENT_QUOTES, 'UTF-8');?>
" > <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearProd" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['clear_assets_prod'], ENT_QUOTES, 'UTF-8');?>
" > <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear prod</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </li>
        <li><a href="#" id="iumioTaskBarEnaDisApp" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['all_simple_apps'], ENT_QUOTES, 'UTF-8');?>
"><i class="pe-7s-switch icon-iumio-task"></i> <span class="iumio-taskbar-text">Change status</span></a></li>
        <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['manager'], ENT_QUOTES, 'UTF-8');?>
">Go to manager</a></li>
        <li id="iumioTaskBarCacheClear" class="iumioTaskBarDropdown"><a href="#" ><i class="pe-7s-back icon-iumio-task"></i> <span class="iumio-taskbar-text">Cache</span></a>
            <ul class="iumioTaskBarDropdownContent">
                <li>
                    <table class="iumioTaskbarTable">
                        <thead>
                        <tr>
                            <th colspan="3">Cache Manager - Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="iumioTaskBarCacheClearAll" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['cache_clear_all'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarCacheClearDev" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['cache_clear_dev'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarCacheClearProd" attr-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['cache_clear_prod'], ENT_QUOTES, 'UTF-8');?>
"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear prod</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </li>
        <li style="float: right; list-style: none" class="active" id="iumioTaskBarReduce"><a class="pe-7s-left-arrow" style="font-size: 15px"></a></li>
    </ul>
    <ul class="iumioTaskBar iumioTaskBarVSmall" style="display: none; width: 114px; padding: 0px 0px 0 0;">
        <li class="flogo iumioTaskBarPulse"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['logo'], ENT_QUOTES, 'UTF-8');?>
"/> </li>
        <li id="iumioTaskBarRestore" style="color: black;list-style: none; "><a class="pe-7s-right-arrow" style="font-size: 15px"></a></li>
    </ul>
    <?php echo '<script'; ?>
 type='text/javascript' src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['js'], ENT_QUOTES, 'UTF-8');?>
"><?php echo '</script'; ?>
>
    <!-- END iumioTaskBar component -->
<?php }
if (isset($_smarty_tpl->tpl_vars['debug_smarty_display']->value) && $_smarty_tpl->tpl_vars['debug_smarty_display']->value == 'on') {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, '_smarty_debug', 'debug_output', null);?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>iumio Framework - Smarty Debug Console</title>
        <style type="text/css">
            
            body, h1, h2, h3, td, th, p {
                font-family: sans-serif;
                font-weight: normal;
                font-size: 0.9em;
                margin: 1px;
                padding: 0;
            }

            h1 span
            {
                position: relative;
                bottom: 7px;
                padding-left: 12px;
            }

            h1 {
                margin: 0;
                text-align: left;
                padding: 2px;
                background-color: #1F77D0;
                color: white;
                font-weight: bold;
                font-size: 1.2em;
                padding: 15px 15px;
            }

            h1 img
            {
                position: relative;
                top:2px;
            }

            h2 {
                background-color: white;
                color: black;
                font-weight: bold;
                padding: 2px;
                border-bottom: 1px solid silver;
                text-align: center;
            }
            h3 {
                text-align: left;
                font-weight: bold;
                color: black;
                font-size: 0.7em;
                padding: 2px;
            }

            body {
                width: 100%;
            }

            p, table, div {
                background: white;
            }

            p {
                margin: 0;
                font-style: italic;
                text-align: center;
            }

            table {
                width: 100%;
            }

            th, td {
                font-family: monospace;
                vertical-align: top;
                text-align: left;
                padding: 10px 10px 10px 10px;
                font-size: 15px;
            }

            td {
                color: green;
            }

            .odd {
                background-color: #eeeeee;
            }

            .even {
                background-color: #fafafa;
            }

            .exectime {
                font-size: 0.8em;
                font-style: italic;
            }

            #bold div {
                color: black;
                font-weight: bold;
            }
            #blue h3 {
                color: blue;
            }
            #normal div {
                color: black;
                font-weight: normal;
            }
            #table_assigned_vars th {
                color: blue;
                font-weight: bold;
            }

            #table_config_vars th {
                color: maroon;
            }

            div.template
            {
                border-bottom: 1px solid silver;
                padding: 10px 10px 10px 10px;
            }

            .brand
            {
                font-weight: 400;
                padding: 15px 15px;
                font-size: 15px;
                color: #777;
            }

            .nok
            {
                padding: 10px 10px 10px 10px;
                text-align: center;
            }

            .tbl-template
            {
                border: 1px solid silver;
            }

            .tbl-template td,th
            {
                border: 1px solid silver;

            }
            .tbl-template tr td,th
            {
                text-align: center;
            }

            .template
            {
                word-break: break-all;
            }
            
        </style>
    </head>
    <body>

    <h1><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['iumiotaskbar']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" width="40"/> <span>iumio Framework - Smarty <?php echo htmlspecialchars(Smarty::SMARTY_VERSION, ENT_QUOTES, 'UTF-8');?>
 Debug Console</span></h1>
    <?php if (isset($_smarty_tpl->tpl_vars['template_name']->value)) {?>
        <h2 class="brand"><strong>Debug for : <?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['template_name']->value);?>
</strong></h2>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['template_data']->value)) {?>
        <h2 class="brand"><strong>Total Time :  <?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['execution_time']->value), ENT_QUOTES, 'UTF-8');?>
 second(s)</strong></h2>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['template_data']->value)) {?>
        <h2 class="brand">Included templates &amp; config files (load time in seconds)</h2>
        <div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['template_data']->value, 'template');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
?>
                <div class="template">
                <span class="template">Template : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['template']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                <br>&nbsp;&nbsp;
                        <table class="tbl-template">
                            <thead>
                            <tr>
                                <th>
Compile time (s)
                                </th>
                                 <th>
Render time (s)
                                </th>
                                 <th>
Cache time (s)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['compile_time']), ENT_QUOTES, 'UTF-8');?>
 </td>
                                 <td><?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['render_time']), ENT_QUOTES, 'UTF-8');?>
</td>
                                 <td><?php echo htmlspecialchars(sprintf("%.5f",$_smarty_tpl->tpl_vars['template']->value['render_time']), ENT_QUOTES, 'UTF-8');?>
</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </div>
    <?php }?>

    <h2 class="brand">Assigned template variables</h2>

    <table id="table_assigned_vars">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assigned_vars']->value, 'vars');
$_smarty_tpl->tpl_vars['vars']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vars']->key => $_smarty_tpl->tpl_vars['vars']->value) {
$_smarty_tpl->tpl_vars['vars']->iteration++;
$__foreach_vars_1_saved = $_smarty_tpl->tpl_vars['vars'];
?>
        <tr class="<?php if ($_smarty_tpl->tpl_vars['vars']->iteration%2 == 0) {?>odd<?php } else { ?>even<?php }?>">
            <td><h3><font color=blue>$<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vars']->key, ENT_QUOTES, 'UTF-8');?>
</font></h3>
                <?php if (isset($_smarty_tpl->tpl_vars['vars']->value['nocache'])) {?><b>Nocache</b></br><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['vars']->value['scope'])) {?><b>Origin:</b> <?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value['scope']);
}?>
            </td>
            <td><h3>Value</h3><?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value['value'],10,80);?>
</td>
            <td><?php if (isset($_smarty_tpl->tpl_vars['vars']->value['attributes'])) {?><h3>Attributes</h3><?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value['attributes']);?>
 <?php }?></td>
            <?php
$_smarty_tpl->tpl_vars['vars'] = $__foreach_vars_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </table>

    <h2 class="brand">Assigned config file variables</h2>

    <table id="table_config_vars">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['config_vars']->value, 'vars');
$_smarty_tpl->tpl_vars['vars']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vars']->key => $_smarty_tpl->tpl_vars['vars']->value) {
$_smarty_tpl->tpl_vars['vars']->iteration++;
$__foreach_vars_2_saved = $_smarty_tpl->tpl_vars['vars'];
?>
            <tr class="<?php if ($_smarty_tpl->tpl_vars['vars']->iteration%2 == 0) {?>odd<?php } else { ?>even<?php }?>">
                <td><h3><font color=blue>#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vars']->key, ENT_QUOTES, 'UTF-8');?>
#</font></h3>
                    <?php if (isset($_smarty_tpl->tpl_vars['vars']->value['scope'])) {?><b>Origin:</b> <?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value['scope']);
}?>
                </td>
                <td><?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['vars']->value['value'],10,80);?>
</td>
            </tr>

        <?php
$_smarty_tpl->tpl_vars['vars'] = $__foreach_vars_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        <?php if (empty($_smarty_tpl->tpl_vars['config_vars']->value)) {?>
            <tr>
                <td colspan="2" class="nok">No configurations</td>
            </tr>
        <?php }?>

    </table>
    </body>
    </html>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
echo '<script'; ?>
 type="text/javascript">
    <?php $_smarty_tpl->_assignInScope('id', '__Smarty__');
?>
    <?php if ($_smarty_tpl->tpl_vars['display_mode']->value) {
$_smarty_tpl->_assignInScope('id', md5(((string)$_smarty_tpl->tpl_vars['offset']->value).((string)$_smarty_tpl->tpl_vars['template_name']->value)));
}?>
    _smarty_console = window.open("", "console<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
", "width=1024,height=600,left=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offset']->value, ENT_QUOTES, 'UTF-8');?>
,top=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offset']->value, ENT_QUOTES, 'UTF-8');?>
,resizable,scrollbars=yes");
    _smarty_console.document.write("<?php echo strtr($_smarty_tpl->tpl_vars['debug_output']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");
    _smarty_console.document.close();
<?php echo '</script'; ?>
>
<?php }
}
}

{if isset($iumiotaskbar) && !empty($iumiotaskbar)}
    <!-- iumioTaskBar component -->
    <link rel="stylesheet" href="{$iumiotaskbar['css']}" />
    <link rel="stylesheet" href="{$iumiotaskbar['css_icon']}" />
    <div id="iumioTaskBarBlank"></div>
    <ul class="iumioTaskBar">
        <li class="flogo iumioTaskBarPulse"><img src="{$iumiotaskbar['logo']}"/> </li>
        <li><a class="active" href="#"><strong>{$iumiotaskbar['ve']} - {$iumiotaskbar['env']}</strong></a></li>
        <li><a href="#" class="active"><strong>{$iumiotaskbar['call_app']}</strong></a></li>
        <li>
            <a href="#" id="iumioTaskBarRequests" attr-href="{$iumiotaskbar['get_logs']}"><i class="pe-7s-refresh icon-iumio-task"></i> <span class="iumio-taskbar-text">No requests</span></a>

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
                            <td class="iumioTaskBarAssetsPublishAll"    attr-href="{$iumiotaskbar['publish_assets_all']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsPublishDev"    attr-href="{$iumiotaskbar['publish_assets_dev']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsPublishProd"   attr-href="{$iumiotaskbar['publish_assets_prod']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Publish prod</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearAll"  attr-href="{$iumiotaskbar['clear_assets_all']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearDev"  attr-href="{$iumiotaskbar['clear_assets_dev']}" > <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarAssetsClearProd" attr-href="{$iumiotaskbar['clear_assets_prod']}" > <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear prod</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </li>
        <li><a href="#" id="iumioTaskBarEnaDisApp" attr-href="{$iumiotaskbar['all_simple_apps']}"><i class="pe-7s-switch icon-iumio-task"></i> <span class="iumio-taskbar-text">Change status</span></a></li>
        <li><a href="{$iumiotaskbar['manager']}">Go to manager</a></li>
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
                            <td class="iumioTaskBarCacheClearAll" attr-href="{$iumiotaskbar['cache_clear_all']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear all environment</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarCacheClearDev" attr-href="{$iumiotaskbar['cache_clear_dev']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear dev</td>
                        </tr>
                        <tr>
                            <td class="iumioTaskBarCacheClearProd" attr-href="{$iumiotaskbar['cache_clear_prod']}"> <i class="pe-7s-angle-right icon-iumio-task"></i> &nbsp; Clear prod</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </li>
        <li style="float: right; list-style: none" class="active" id="iumioTaskBarReduce"><a class="pe-7s-left-arrow" style="font-size: 16px"></a></li>
    </ul>
    <ul class="iumioTaskBar iumioTaskBarVSmall" style="display: none; width: 114px; padding: 0px 0px 0 0;">
        <li class="flogo iumioTaskBarPulse"><img src="{$iumiotaskbar['logo']}"/> </li>
        <li id="iumioTaskBarRestore" style="color: black;list-style: none; "><a class="pe-7s-right-arrow" style="font-size: 16px"></a></li>
    </ul>
    <script type='text/javascript' src="{$iumiotaskbar['js']}"></script>
    <!-- END iumioTaskBar component -->
{/if}
{if isset($debug_smarty_display) && $debug_smarty_display == 'on'}
{capture name='_smarty_debug' assign=debug_output}
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>iumio Framework - Smarty Debug Console</title>
        <style type="text/css">
            {literal}
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
            {/literal}
        </style>
    </head>
    <body>

    <h1><img src="{$iumiotaskbar['logo']}" width="40"/> <span>iumio Framework - Smarty {Smarty::SMARTY_VERSION} Debug Console</span></h1>
    {if isset($template_name)}
        <h2 class="brand"><strong>Debug for : {$template_name|debug_print_var nofilter}</strong></h2>
    {/if}
    {if !empty($template_data)}
        <h2 class="brand"><strong>Total Time :  {$execution_time|string_format:"%.5f"} second(s)</strong></h2>
    {/if}
    {if !empty($template_data)}
        <h2 class="brand">Included templates &amp; config files (load time in seconds)</h2>
        <div>
            {foreach $template_data as $template}
                <div class="template">
                <span class="template">Template : {$template.name}</span>
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
                                <td>{$template['compile_time']|string_format:"%.5f"} </td>
                                 <td>{$template['render_time']|string_format:"%.5f"}</td>
                                 <td>{$template['render_time']|string_format:"%.5f"}</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            {/foreach}
        </div>
    {/if}

    <h2 class="brand">Assigned template variables</h2>

    <table id="table_assigned_vars">
        {foreach $assigned_vars as $vars}
        <tr class="{if $vars@iteration % 2 eq 0}odd{else}even{/if}">
            <td><h3><font color=blue>${$vars@key}</font></h3>
                {if isset($vars['nocache'])}<b>Nocache</b></br>{/if}
                {if isset($vars['scope'])}<b>Origin:</b> {$vars['scope']|debug_print_var nofilter}{/if}
            </td>
            <td><h3>Value</h3>{$vars['value']|debug_print_var:10:80 nofilter}</td>
            <td>{if isset($vars['attributes'])}<h3>Attributes</h3>{$vars['attributes']|debug_print_var nofilter} {/if}</td>
            {/foreach}
    </table>

    <h2 class="brand">Assigned config file variables</h2>

    <table id="table_config_vars">
        {foreach $config_vars as $vars}
            <tr class="{if $vars@iteration % 2 eq 0}odd{else}even{/if}">
                <td><h3><font color=blue>#{$vars@key}#</font></h3>
                    {if isset($vars['scope'])}<b>Origin:</b> {$vars['scope']|debug_print_var nofilter}{/if}
                </td>
                <td>{$vars['value']|debug_print_var:10:80 nofilter}</td>
            </tr>

        {/foreach}
        {if empty($config_vars)}
            <tr>
                <td colspan="2" class="nok">No configurations</td>
            </tr>
        {/if}

    </table>
    </body>
    </html>
{/capture}
<script type="text/javascript">
    {$id = '__Smarty__'}
    {if $display_mode}{$id = "$offset$template_name"|md5}{/if}
    _smarty_console = window.open("", "console{$id}", "width=1024,height=600,left={$offset},top={$offset},resizable,scrollbars=yes");
    _smarty_console.document.write("{$debug_output|escape:'javascript' nofilter}");
    _smarty_console.document.close();
</script>
{/if}

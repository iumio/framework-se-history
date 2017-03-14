<?php

class __IumioTemp_541088966ea560202f9eb3a7995a4177 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!doctype html>
';
        $buffer .= $indent . '<html class="no-js" lang="en">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <meta charset="utf-8">
';
        $buffer .= $indent . '    <meta http-equiv="x-ua-compatible" content="ie=edge">
';
        $buffer .= $indent . '    <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
';
        $buffer .= $indent . '    <meta name="description" content="">
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width, initial-scale=1">
';
        $buffer .= $indent . '    <link rel="apple-touch-icon" href="apple-touch-icon.png">
';
        $buffer .= $indent . '    <!-- Place favicon.ico in the root directory -->
';
        $buffer .= $indent . '    <link rel="stylesheet" href="css/vendor.css">
';
        $buffer .= $indent . '    <!-- Theme initialization -->
';
        $buffer .= $indent . '    <script>
';
        $buffer .= $indent . '        var themeSettings = (localStorage.getItem(\'themeSettings\')) ? JSON.parse(localStorage.getItem(\'themeSettings\')) :
';
        $buffer .= $indent . '        {};
';
        $buffer .= $indent . '        var themeName = themeSettings.themeName || \'\';
';
        $buffer .= $indent . '        if (themeName)
';
        $buffer .= $indent . '        {
';
        $buffer .= $indent . '            document.write(\'<link rel="stylesheet" id="theme-style" href="css/app-\' + themeName + \'.css">\');
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '        else
';
        $buffer .= $indent . '        {
';
        $buffer .= $indent . '            document.write(\'<link rel="stylesheet" id="theme-style" href="css/app.css">\');
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '    </script>
';
        $buffer .= $indent . '</head>';

        return $buffer;
    }
}

<?php

class __IumioTemp_9320d203ff2b39a8b6a48d177e20251b extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!doctype html>
';
        $buffer .= $indent . '<html lang="en">
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <meta charset="utf-8" />
';
        $buffer .= $indent . '    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
';
        $buffer .= $indent . '    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <title>Light Bootstrap Dashboard by Creative Tim</title>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <meta content=\'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\' name=\'viewport\' />
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!-- Bootstrap core CSS     -->
';
        $buffer .= $indent . '    <link href="';
        $value = $this->resolveValue($context->find('bootstrap(\'css\', \'min\')'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" rel="stylesheet" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!-- Animation library for notifications   -->
';
        $buffer .= $indent . '    <link href="assets/css/animate.min.css" rel="stylesheet"/>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!--  Light Bootstrap Table core CSS    -->
';
        $buffer .= $indent . '    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!--  CSS for Demo Purpose, don\'t include it in your project     -->
';
        $buffer .= $indent . '    <link href="assets/css/demo.css" rel="stylesheet" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!--     Fonts and icons     -->
';
        $buffer .= $indent . '    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
';
        $buffer .= $indent . '    <link href=\'http://fonts.googleapis.com/css?family=Roboto:400,700,300\' rel=\'stylesheet\' type=\'text/css\'>
';
        $buffer .= $indent . '    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</head>';

        return $buffer;
    }
}

<?php

class __IumioTemp_292399440a76092b3c5ab53ab3dbb480 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
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
        // 'bootstrap' section
        $value = $context->find('bootstrap');
        $buffer .= $this->section48f04079ae1c374440062a5e81a10314($context, $indent, $value);
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

    private function section48f04079ae1c374440062a5e81a10314(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'min';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'min';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

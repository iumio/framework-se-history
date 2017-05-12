<?php

class __iumioTemp_de137fc220d0fed0e7f520e4a999deb3 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!DOCTYPE HTML>
';
        $buffer .= $indent . '<!--
';
        $buffer .= $indent . '	iumio Starter by TEMPLATED
';
        $buffer .= $indent . '	templated.co @templatedco
';
        $buffer .= $indent . '	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
';
        $buffer .= $indent . '-->
';
        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <title>iumio Starter Theme</title>
';
        $buffer .= $indent . '    <meta charset="utf-8" />
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width, initial-scale=1" />
';
        $buffer .= $indent . '    <link rel="stylesheet" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section8ad2cc96bd1df02d7f0ada40760c4a2f($context, $indent, $value);
        $buffer .= '" />
';
        $buffer .= $indent . '    <link rel="stylesheet" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section4522171fdba561ef779f06da271d4000($context, $indent, $value);
        $buffer .= '" />
';
        $buffer .= $indent . '</head>';

        return $buffer;
    }

    private function section8ad2cc96bd1df02d7f0ada40760c4a2f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/css/index.css';
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
                
                $buffer .= 'public/css/index.css';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4522171fdba561ef779f06da271d4000(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/css/font-awesome.min.css';
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
                
                $buffer .= 'public/css/font-awesome.min.css';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

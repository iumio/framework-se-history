<?php

class __iumioTemp_d0c3b7d5324353aa5425d8d18f05056a extends Mustache_Template
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
        $buffer .= $indent . '    <link rel="apple-touch-icon" sizes="180x180" href="';
        // 'img_im' section
        $value = $context->find('img_im');
        $buffer .= $this->sectionE722f87dc87d5668d8e57cdb27f0f2d1($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="icon" type="image/png" sizes="32x32" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionE1c174034ebd1c16a0a48498b8c0989b($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="icon" type="image/png" sizes="16x16" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionB0326c145a1472ee5dacf474d31b9fae($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="manifest" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section1ee97096ae0acd56ddfbe0008d1086b8($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="mask-icon" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionFc980d9fd61130da3f84e1f25fca9d8c($context, $indent, $value);
        $buffer .= '" color="#5bbad5">
';
        $buffer .= $indent . '    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <title>iumio Manager</title>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <meta content=\'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\' name=\'viewport\' />
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width" />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        // 'btsp_css' section
        $value = $context->find('btsp_css');
        $buffer .= $this->section48f04079ae1c374440062a5e81a10314($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        // 'css_im' section
        $value = $context->find('css_im');
        $buffer .= $this->sectionE7cb6e7c864fafff9c666f84b23da8f0($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        // 'css_im' section
        $value = $context->find('css_im');
        $buffer .= $this->sectionBc11f1e73351919d0a566b55a32d3f71($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        // 'css_im' section
        $value = $context->find('css_im');
        $buffer .= $this->section2df2192ce462c90fceac0eae3680e44a($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!--     Fonts and icons     -->
';
        $buffer .= $indent . '    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
';
        $buffer .= $indent . '    <link href=\'http://fonts.googleapis.com/css?family=Roboto:400,700,300\' rel=\'stylesheet\' type=\'text/css\'>
';
        $buffer .= $indent . '    ';
        // 'css_im' section
        $value = $context->find('css_im');
        $buffer .= $this->section4c008a1a257e92289381be5c3c8fdaf1($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</head>';

        return $buffer;
    }

    private function sectionE722f87dc87d5668d8e57cdb27f0f2d1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/img/favicon/apple-touch-icon.png';
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
                
                $buffer .= 'public/img/favicon/apple-touch-icon.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE1c174034ebd1c16a0a48498b8c0989b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/img/favicon/favicon-32x32.png';
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
                
                $buffer .= 'public/img/favicon/favicon-32x32.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB0326c145a1472ee5dacf474d31b9fae(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/img/favicon/favicon-16x16.png';
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
                
                $buffer .= 'public/img/favicon/favicon-16x16.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1ee97096ae0acd56ddfbe0008d1086b8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/img/favicon/manifest.json';
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
                
                $buffer .= 'public/img/favicon/manifest.json';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFc980d9fd61130da3f84e1f25fca9d8c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/img/favicon/safari-pinned-tab.svg';
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
                
                $buffer .= 'public/img/favicon/safari-pinned-tab.svg';
                $context->pop();
            }
        }
    
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

    private function sectionE7cb6e7c864fafff9c666f84b23da8f0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'animate.min';
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
                
                $buffer .= 'animate.min';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBc11f1e73351919d0a566b55a32d3f71(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'light-bootstrap-dashboard';
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
                
                $buffer .= 'light-bootstrap-dashboard';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2df2192ce462c90fceac0eae3680e44a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'demo';
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
                
                $buffer .= 'demo';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4c008a1a257e92289381be5c3c8fdaf1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'pe-icon-7-stroke';
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
                
                $buffer .= 'pe-icon-7-stroke';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

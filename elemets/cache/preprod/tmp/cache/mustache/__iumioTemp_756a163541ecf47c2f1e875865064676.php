<?php

class __iumioTemp_756a163541ecf47c2f1e875865064676 extends Mustache_Template
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
        $buffer .= $this->section62e2ea0ec6c4b6c0c0f6967fb1a3f945($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="icon" type="image/png" sizes="32x32" href="';
        // 'img_im' section
        $value = $context->find('img_im');
        $buffer .= $this->sectionBa74afcd80ba50fb78bb95a8c5f6312f($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="icon" type="image/png" sizes="16x16" href="';
        // 'img_im' section
        $value = $context->find('img_im');
        $buffer .= $this->section7f546708764e60d3b785c1a881736422($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="manifest" href="';
        // 'img_im' section
        $value = $context->find('img_im');
        $buffer .= $this->sectionA54a9747e239915f0f253e2327f9e09a($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <link rel="mask-icon" href="';
        // 'img_im' section
        $value = $context->find('img_im');
        $buffer .= $this->section66395e4623d989083c271d59c9c5e2d7($context, $indent, $value);
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

    private function section62e2ea0ec6c4b6c0c0f6967fb1a3f945(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'favicon/apple-touch-icon.png';
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
                
                $buffer .= 'favicon/apple-touch-icon.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBa74afcd80ba50fb78bb95a8c5f6312f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'favicon/favicon-32x32.png';
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
                
                $buffer .= 'favicon/favicon-32x32.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7f546708764e60d3b785c1a881736422(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'favicon/favicon-16x16.png';
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
                
                $buffer .= 'favicon/favicon-16x16.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA54a9747e239915f0f253e2327f9e09a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'favicon/manifest.json';
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
                
                $buffer .= 'favicon/manifest.json';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section66395e4623d989083c271d59c9c5e2d7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'favicon/safari-pinned-tab.svg';
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
                
                $buffer .= 'favicon/safari-pinned-tab.svg';
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

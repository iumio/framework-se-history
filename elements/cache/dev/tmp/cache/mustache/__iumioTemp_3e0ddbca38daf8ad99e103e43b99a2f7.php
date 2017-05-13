<?php

class __iumioTemp_3e0ddbca38daf8ad99e103e43b99a2f7 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        if ($partial = $this->mustache->loadPartial('head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<div class="wrapper">
';
        if ($partial = $this->mustache->loadPartial('sidebar')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    <div class="main-panel">
';
        $buffer .= $indent . '        <nav class="navbar navbar-default navbar-fixed">
';
        $buffer .= $indent . '            <div class="container-fluid">
';
        $buffer .= $indent . '                <div class="navbar-header">
';
        $buffer .= $indent . '                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
';
        $buffer .= $indent . '                        <span class="sr-only">Toggle navigation</span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                    </button>
';
        $buffer .= $indent . '                    <a class="navbar-brand" href="#">Dashboard</a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </nav>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="content">
';
        $buffer .= $indent . '            <div class="container-fluid">
';
        $buffer .= $indent . '                <div class="row">
';
        $buffer .= $indent . '                    <div class="col-md-6">
';
        $buffer .= $indent . '                        <div class="card">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">iumio Framework</h4>
';
        $buffer .= $indent . '                                <p class="category">Characteristics</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <ul>
';
        $buffer .= $indent . '                                    <li>Framework edition : ';
        // 'f_info' section
        $value = $context->find('f_info');
        $buffer .= $this->section40b10a403040baeda4a7bc4de1a0b171($context, $indent, $value);
        $buffer .= ' </li>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    <li>Actual version : ';
        // 'f_info' section
        $value = $context->find('f_info');
        $buffer .= $this->section08581fe9606df79ad4c5dcf6ed1b5fe9($context, $indent, $value);
        $buffer .= ' ';
        // 'f_info' section
        $value = $context->find('f_info');
        $buffer .= $this->section52e9a48de0489c90064bb035968f10ca($context, $indent, $value);
        $buffer .= ' </li>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                </ul>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <div class="col-md-6">
';
        $buffer .= $indent . '                        <div class="card">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">Server</h4>
';
        $buffer .= $indent . '                                <p class="category">Informations</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <ul>
';
        $buffer .= $indent . '                                    <li>PHP version : ';
        // 's_info' section
        $value = $context->find('s_info');
        $buffer .= $this->section939b64146ffbdc09deba66ffcd47ea44($context, $indent, $value);
        $buffer .= '</li>
';
        $buffer .= $indent . '                                    <li>Domain : ';
        // 's_info' section
        $value = $context->find('s_info');
        $buffer .= $this->section96e8a907e1d0a4c9d984bfa6f04e3153($context, $indent, $value);
        $buffer .= '</li>
';
        $buffer .= $indent . '                                </ul>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        if ($partial = $this->mustache->loadPartial('jsinclude')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>
';

        return $buffer;
    }

    private function section40b10a403040baeda4a7bc4de1a0b171(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'VERSION_EDITION';
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
                
                $buffer .= 'VERSION_EDITION';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section08581fe9606df79ad4c5dcf6ed1b5fe9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'VERSION_STAGE';
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
                
                $buffer .= 'VERSION_STAGE';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section52e9a48de0489c90064bb035968f10ca(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'VERSION';
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
                
                $buffer .= 'VERSION';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section939b64146ffbdc09deba66ffcd47ea44(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'PHP_VERSION';
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
                
                $buffer .= 'PHP_VERSION';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section96e8a907e1d0a4c9d984bfa6f04e3153(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'SERVER_NAME';
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
                
                $buffer .= 'SERVER_NAME';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

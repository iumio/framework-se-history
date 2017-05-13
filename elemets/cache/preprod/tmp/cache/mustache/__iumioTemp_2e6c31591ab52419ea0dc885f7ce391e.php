<?php

class __iumioTemp_2e6c31591ab52419ea0dc885f7ce391e extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<div class="sidebar" data-color="blue" data-image="';
        // 'img_iumio' section
        $value = $context->find('img_iumio');
        $buffer .= $this->section0ebd625f54ee6903c3e59d2dd39f8a80($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '<div class="sidebar-wrapper">
';
        $buffer .= $indent . '    <div class="logo">
';
        $buffer .= $indent . '        <a href="https://framework.iumio.com" class="simple-text">
';
        $buffer .= $indent . '            <img class="img-responsive" src="';
        // 'img_iumio' section
        $value = $context->find('img_iumio');
        $buffer .= $this->section330496e0f95902faece59f94cac8cc07($context, $indent, $value);
        $buffer .= '" />
';
        $buffer .= $indent . '            <h6>Manager</h6>
';
        $buffer .= $indent . '        </a>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <ul class="nav">
';
        $buffer .= $indent . '        <li class="active">
';
        $buffer .= $indent . '            <a href="';
        // 'route' section
        $value = $context->find('route');
        $buffer .= $this->sectionC2f3ab21b3f308f4867c5d374523f920($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                <i class="pe-7s-graph"></i>
';
        $buffer .= $indent . '                <p>Dashboard</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="';
        // 'route' section
        $value = $context->find('route');
        $buffer .= $this->section6acca58c92bb8db99906b553ce450836($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                <i class="pe-7s-user"></i>
';
        $buffer .= $indent . '                <p>App Manager</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="';
        // 'route' section
        $value = $context->find('route');
        $buffer .= $this->sectionAa0d113efd7e2d4a390b6208623c020c($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                <i class="pe-7s-user"></i>
';
        $buffer .= $indent . '                <p>Base App Manager</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="table.html">
';
        $buffer .= $indent . '                <i class="pe-7s-note2"></i>
';
        $buffer .= $indent . '                <p>Assets Manager</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="typography.html">
';
        $buffer .= $indent . '                <i class="pe-7s-news-paper"></i>
';
        $buffer .= $indent . '                <p>Logs</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="icons.html">
';
        $buffer .= $indent . '                <i class="pe-7s-science"></i>
';
        $buffer .= $indent . '                <p>HTTP Listener</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="maps.html">
';
        $buffer .= $indent . '                <i class="pe-7s-map-marker"></i>
';
        $buffer .= $indent . '                <p>Maps</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '        <li>
';
        $buffer .= $indent . '            <a href="notifications.html">
';
        $buffer .= $indent . '                <i class="pe-7s-bell"></i>
';
        $buffer .= $indent . '                <p>Notifications</p>
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '    </ul>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function section0ebd625f54ee6903c3e59d2dd39f8a80(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'iumio_img_theme.jpeg';
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
                
                $buffer .= 'iumio_img_theme.jpeg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section330496e0f95902faece59f94cac8cc07(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'logo_white.png';
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
                
                $buffer .= 'logo_white.png';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC2f3ab21b3f308f4867c5d374523f920(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'iumio_manager_index';
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
                
                $buffer .= 'iumio_manager_index';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6acca58c92bb8db99906b553ce450836(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'iumio_manager_app_manager';
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
                
                $buffer .= 'iumio_manager_app_manager';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAa0d113efd7e2d4a390b6208623c020c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'iumio_manager_base_app_manager';
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
                
                $buffer .= 'iumio_manager_base_app_manager';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

<?php

class __IumioTemp_71516ad16f700196acc66a9f2a06c1a3 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<div class="sidebar" data-color="blue" data-image="';
        // 'img_fgm' section
        $value = $context->find('img_fgm');
        $buffer .= $this->section1f3d1205d886fde1bad3674eb0fc1521($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '<div class="sidebar-wrapper">
';
        $buffer .= $indent . '    <div class="logo">
';
        $buffer .= $indent . '        <a href="http://www.creative-tim.com" class="simple-text">
';
        $buffer .= $indent . '            Creative Tim
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
        $buffer .= $indent . '            <a href="dashboard.html">
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
        $buffer .= $indent . '            <a href="user.html">
';
        $buffer .= $indent . '                <i class="pe-7s-user"></i>
';
        $buffer .= $indent . '                <p>User Profile</p>
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
        $buffer .= $indent . '                <p>Table List</p>
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
        $buffer .= $indent . '                <p>Typography</p>
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
        $buffer .= $indent . '                <p>Icons</p>
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
        $buffer .= $indent . '        <li class="active-pro">
';
        $buffer .= $indent . '            <a href="upgrade.html">
';
        $buffer .= $indent . '                <i class="pe-7s-rocket"></i>
';
        $buffer .= $indent . '                <p>Upgrade to PRO</p>
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

    private function section1f3d1205d886fde1bad3674eb0fc1521(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'iumio_theme_img.jpg';
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
                
                $buffer .= 'iumio_theme_img.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

<?php

class __iumioTemp_36759e754bc4ae86657b5d66feb8f57c extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        // 'taskbar_css' section
        $value = $context->find('taskbar_css');
        $buffer .= $this->section354c93888006e220bb907be6cec58815($context, $indent, $value);
        // 'iumio_taskbar' section
        $value = $context->find('iumio_taskbar');
        $buffer .= $this->section354c93888006e220bb907be6cec58815($context, $indent, $value);
        $buffer .= $indent . '<div id="footer-wrapper">
';
        $buffer .= $indent . '    <footer id="footer"><p>Footer...</p></footer>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section354c93888006e220bb907be6cec58815(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = '';
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
                
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

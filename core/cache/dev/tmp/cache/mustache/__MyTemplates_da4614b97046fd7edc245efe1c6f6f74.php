<?php

class __MyTemplates_da4614b97046fd7edc245efe1c6f6f74 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $value = $this->resolveValue($context->find('hello'), $context);
        $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);

        return $buffer;
    }
}

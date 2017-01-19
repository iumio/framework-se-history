<?php

class __MyTemplates_5a2ab8ff579ac0dd2742dd9fdd41b852 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $value = $this->resolveValue($context->find('hello'), $context);
        $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ' ';
        $value = $this->resolveValue($context->find('d'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);

        return $buffer;
    }
}

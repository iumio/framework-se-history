<?php

class __iumioTemp_d50d8de0bead83f692f20c01f424e65f extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<div id="footer-wrapper">
';
        $buffer .= $indent . '    <footer id="footer"><p>Footer...</p></footer>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }
}

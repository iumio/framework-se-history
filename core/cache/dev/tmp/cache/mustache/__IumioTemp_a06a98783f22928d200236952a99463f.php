<?php

class __IumioTemp_a06a98783f22928d200236952a99463f extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<div id="right" class="column">
';
        $buffer .= $indent . '    <h3>Right heading</h3>
';
        $buffer .= $indent . '    <p><script>generateText(1)</script></p>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }
}

<?php

class __iumioTemp_22b5e2055af5fa011653d114a1d94519 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        if ($partial = $this->mustache->loadPartial('head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<header id="header"><p>Welcome</p></header>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<div id="container">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <main id="center" class="column">
';
        $buffer .= $indent . '        <article>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <h1>Your parameter is ';
        $value = $this->resolveValue($context->find('sent'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h1>
';
        $buffer .= $indent . '            <p><script>generateText(50)</script></p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        </article>
';
        $buffer .= $indent . '    </main>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('menuleft')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('menuright')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

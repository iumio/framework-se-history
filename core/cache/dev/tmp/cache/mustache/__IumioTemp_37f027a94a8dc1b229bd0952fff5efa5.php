<?php

class __IumioTemp_37f027a94a8dc1b229bd0952fff5efa5 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<header id="header"><p>Bienvenue</p></header>
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
        $buffer .= $indent . '            <h1>';
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
        $buffer .= $indent . '    <nav id="left" class="column">
';
        $buffer .= $indent . '        <h3>Left heading</h3>
';
        $buffer .= $indent . '        <ul>
';
        $buffer .= $indent . '            <li><a href="#">Link 1</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 2</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 3</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 4</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 5</a></li>
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '        <h3>Left heading</h3>
';
        $buffer .= $indent . '        <ul>
';
        $buffer .= $indent . '            <li><a href="#">Link 1</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 2</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 3</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 4</a></li>
';
        $buffer .= $indent . '            <li><a href="#">Link 5</a></li>
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </nav>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="right" class="column">
';
        $buffer .= $indent . '        <h3>Right heading</h3>
';
        $buffer .= $indent . '        <p><script>generateText(1)</script></p>
';
        $buffer .= $indent . '    </div>
';
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

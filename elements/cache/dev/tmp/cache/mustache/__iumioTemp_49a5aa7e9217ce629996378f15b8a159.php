<?php

class __iumioTemp_49a5aa7e9217ce629996378f15b8a159 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<footer class="footer">
';
        $buffer .= $indent . '    <div class="container-fluid">
';
        $buffer .= $indent . '        <p class="copyright pull-right">
';
        $buffer .= $indent . '            &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://framework.iumio.com">iumio Framework</a>, The next generation of PHP frameworks
';
        $buffer .= $indent . '        </p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</footer>';

        return $buffer;
    }
}

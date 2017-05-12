<?php

class __iumioTemp_2b6101c5c09f6e6c6a5a78af4f1b008b extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!-- Footer -->
';
        $buffer .= $indent . '<footer id="footer">
';
        $buffer .= $indent . '    <div class="inner">
';
        $buffer .= $indent . '        <div class="flex">
';
        $buffer .= $indent . '            <div class="copyright">
';
        $buffer .= $indent . '                &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a> Modified by iumio.
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <ul class="icons">
';
        $buffer .= $indent . '                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
';
        $buffer .= $indent . '                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
';
        $buffer .= $indent . '                <li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
';
        $buffer .= $indent . '                <li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
';
        $buffer .= $indent . '                <li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
';
        $buffer .= $indent . '            </ul>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</footer>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Scripts -->
';
        $buffer .= $indent . '<script src="';
        // 'jquery' section
        $value = $context->find('jquery');
        $buffer .= $this->section354c93888006e220bb907be6cec58815($context, $indent, $value);
        $buffer .= 'j"></script>
';
        $buffer .= $indent . '<script src="assets/js/skel.min.js"></script>
';
        $buffer .= $indent . '<script src="assets/js/util.js"></script>
';
        $buffer .= $indent . '<script src="assets/js/main.js"></script>
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

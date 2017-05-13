<?php

class __iumioTemp_965986ab34d9db44e201bf80d711fc6a extends Mustache_Template
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
        // 'jquery' section
        $value = $context->find('jquery');
        $buffer .= $this->section354c93888006e220bb907be6cec58815($context, $indent, $value);
        $buffer .= $indent . '<script src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section54ba93c43403b27a38b6d7d702646503($context, $indent, $value);
        $buffer .= '"></script>
';
        $buffer .= $indent . '<script src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionE47b6b447a6fc745d9b1d77cf0e66ec7($context, $indent, $value);
        $buffer .= '"></script>
';
        $buffer .= $indent . '<script src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section04525f83b7023fe2a5e04b5f6a205bb0($context, $indent, $value);
        $buffer .= '"></script>
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

    private function section54ba93c43403b27a38b6d7d702646503(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/js/skel.min.js';
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
                
                $buffer .= 'public/js/skel.min.js';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE47b6b447a6fc745d9b1d77cf0e66ec7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/js/util.js';
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
                
                $buffer .= 'public/js/util.js';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section04525f83b7023fe2a5e04b5f6a205bb0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/js/main.js';
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
                
                $buffer .= 'public/js/main.js';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

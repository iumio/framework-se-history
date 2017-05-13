<?php

class __iumioTemp_738bc1b021891c28a4f9c70344c75fdf extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!--   Core JS Files   -->
';
        // 'jquery' section
        $value = $context->find('jquery');
        $buffer .= $this->section354c93888006e220bb907be6cec58815($context, $indent, $value);
        // 'btsp_js' section
        $value = $context->find('btsp_js');
        $buffer .= $this->section48f04079ae1c374440062a5e81a10314($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<!--  Checkbox, Radio & Switch Plugins -->
';
        // 'js_im' section
        $value = $context->find('js_im');
        $buffer .= $this->section2f048b9ec9d9dc65ff5aa08ea2e50b5c($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<!--  Notifications Plugin    -->
';
        // 'js_im' section
        $value = $context->find('js_im');
        $buffer .= $this->section38ba127be96e87582b3f11a9be0f0829($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
';
        // 'js_im' section
        $value = $context->find('js_im');
        $buffer .= $this->sectionBc11f1e73351919d0a566b55a32d3f71($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<!-- Light Bootstrap Table DEMO methods, don\'t include it in your project! -->
';
        // 'js_im' section
        $value = $context->find('js_im');
        $buffer .= $this->section2df2192ce462c90fceac0eae3680e44a($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        // 'js_im' section
        $value = $context->find('js_im');
        $buffer .= $this->sectionEde72e87ec18e0ab2c595030bb1d29ef($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<script type="text/javascript">
';
        $buffer .= $indent . '    $(document).ready(function(){
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        demo.initChartist();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        $.notify({
';
        $buffer .= $indent . '            icon: \'pe-7s-gift\',
';
        $buffer .= $indent . '            message: "Welcome to <b>iumio Manager</b> - a beautiful dashboard manager for every web developer."
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        },{
';
        $buffer .= $indent . '            type: \'info\',
';
        $buffer .= $indent . '            timer: 4000
';
        $buffer .= $indent . '        });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '</script>';

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

    private function section48f04079ae1c374440062a5e81a10314(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'min';
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
                
                $buffer .= $indent . 'min';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2f048b9ec9d9dc65ff5aa08ea2e50b5c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'bootstrap-checkbox-radio-switch';
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
                
                $buffer .= $indent . 'bootstrap-checkbox-radio-switch';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section38ba127be96e87582b3f11a9be0f0829(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'bootstrap-notify';
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
                
                $buffer .= $indent . 'bootstrap-notify';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBc11f1e73351919d0a566b55a32d3f71(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'light-bootstrap-dashboard';
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
                
                $buffer .= $indent . 'light-bootstrap-dashboard';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2df2192ce462c90fceac0eae3680e44a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'demo';
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
                
                $buffer .= $indent . 'demo';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEde72e87ec18e0ab2c595030bb1d29ef(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'main';
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
                
                $buffer .= $indent . 'main';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

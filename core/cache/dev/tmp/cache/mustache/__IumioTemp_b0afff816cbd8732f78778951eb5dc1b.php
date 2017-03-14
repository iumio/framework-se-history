<?php

class __IumioTemp_b0afff816cbd8732f78778951eb5dc1b extends Mustache_Template
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
        $buffer .= $indent . '<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!--  Charts Plugin -->
';
        $buffer .= $indent . '<script src="assets/js/chartist.min.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!--  Notifications Plugin    -->
';
        $buffer .= $indent . '<script src="assets/js/bootstrap-notify.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!--  Google Maps Plugin    -->
';
        $buffer .= $indent . '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
';
        $buffer .= $indent . '<script src="assets/js/light-bootstrap-dashboard.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Light Bootstrap Table DEMO methods, don\'t include it in your project! -->
';
        $buffer .= $indent . '<script src="assets/js/demo.js"></script>
';
        $buffer .= $indent . '
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
        $buffer .= $indent . '            message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
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

}

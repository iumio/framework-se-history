<?php

class __IumioTemp_e0f33938865904c1f244bbf707cbfe00 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!--   Core JS Files   -->
';
        $buffer .= $indent . '<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
';
        $buffer .= $indent . '<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
';
        $buffer .= $indent . '
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
}

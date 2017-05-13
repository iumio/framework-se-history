<?php

class __iumioTemp_1d02cb629fd1d98625a92f0f6acac3c3 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!-- Modal -->
';
        $buffer .= $indent . '<div class="modal fade" id="modalManager" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
';
        $buffer .= $indent . '    <div class="modal-dialog" role="document">
';
        $buffer .= $indent . '        <div class="modal-content">
';
        $buffer .= $indent . '            <div class="modal-header">
';
        $buffer .= $indent . '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
';
        $buffer .= $indent . '                <h4 class="modal-title" id="modalManagerTitle"></h4>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="modal-body">
';
        $buffer .= $indent . '                ...
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="modal-footer">
';
        $buffer .= $indent . '                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
';
        $buffer .= $indent . '                <button type="button" class="btn btn-primary">Save changes</button>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }
}

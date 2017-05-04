<?php

class __iumioTemp_db0511e3fe8393a3ac5f06abd9e8ff8d extends Mustache_Template
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
        $buffer .= $indent . '<div class="wrapper">
';
        if ($partial = $this->mustache->loadPartial('sidebar')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="main-panel">
';
        $buffer .= $indent . '        <nav class="navbar navbar-default navbar-fixed">
';
        $buffer .= $indent . '            <div class="container-fluid">
';
        $buffer .= $indent . '                <div class="navbar-header">
';
        $buffer .= $indent . '                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
';
        $buffer .= $indent . '                        <span class="sr-only">Toggle navigation</span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                        <span class="icon-bar"></span>
';
        $buffer .= $indent . '                    </button>
';
        $buffer .= $indent . '                    <a class="navbar-brand" href="#">App Manager</a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </nav>
';
        $buffer .= $indent . '        <div class="content">
';
        $buffer .= $indent . '            <div class="container-fluid">
';
        $buffer .= $indent . '                <div class="row">
';
        $buffer .= $indent . '                    <div class="col-md-12">
';
        $buffer .= $indent . '                        <div class="card">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">List of your app</h4>
';
        $buffer .= $indent . '                                <p class="category">Referer to apps.json</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content table-responsive table-full-width">
';
        $buffer .= $indent . '                                <table class="table table-hover table-striped">
';
        $buffer .= $indent . '                                    <thead>
';
        $buffer .= $indent . '                                    <th>ID</th>
';
        $buffer .= $indent . '                                    <th>Name</th>
';
        $buffer .= $indent . '                                    <th>Is default</th>
';
        $buffer .= $indent . '                                    <th>Namespace</th>
';
        $buffer .= $indent . '                                    <th>Edit</th>
';
        $buffer .= $indent . '                                    <th>Delete</th>
';
        $buffer .= $indent . '                                    </thead>
';
        $buffer .= $indent . '                                    <tbody>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>0</td>
';
        $buffer .= $indent . '                                        <td>DakotaRice</td>
';
        $buffer .= $indent . '                                        <td>Yes</td>
';
        $buffer .= $indent . '                                        <td>A/A</td>
';
        $buffer .= $indent . '                                        <td><button>E</button></td>
';
        $buffer .= $indent . '                                        <td><button>D</button></td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>1</td>
';
        $buffer .= $indent . '                                        <td>MinervaHooper</td>
';
        $buffer .= $indent . '                                        <td>No</td>
';
        $buffer .= $indent . '                                        <td>B/B</td>
';
        $buffer .= $indent . '                                        <td><button>E</button></td>
';
        $buffer .= $indent . '                                        <td><button>D</button></td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    </tbody>
';
        $buffer .= $indent . '                                </table>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Button trigger modal -->
';
        $buffer .= $indent . '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
';
        $buffer .= $indent . '    Launch demo modal
';
        $buffer .= $indent . '</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Modal -->
';
        $buffer .= $indent . '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
';
        $buffer .= $indent . '    <div class="modal-dialog" role="document">
';
        $buffer .= $indent . '        <div class="modal-content">
';
        $buffer .= $indent . '            <div class="modal-header">
';
        $buffer .= $indent . '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
';
        $buffer .= $indent . '                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        if ($partial = $this->mustache->loadPartial('jsinclude')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

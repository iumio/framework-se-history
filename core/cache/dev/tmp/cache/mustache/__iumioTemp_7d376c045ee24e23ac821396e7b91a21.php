<?php

class __iumioTemp_7d376c045ee24e23ac821396e7b91a21 extends Mustache_Template
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

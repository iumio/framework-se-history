<?php

class __iumioTemp_de88fa6fc9ad494599ca99a843c525ef extends Mustache_Template
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
        $buffer .= $indent . '                                    <th>Salary</th>
';
        $buffer .= $indent . '                                    <th>Country</th>
';
        $buffer .= $indent . '                                    <th>City</th>
';
        $buffer .= $indent . '                                    </thead>
';
        $buffer .= $indent . '                                    <tbody>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>1</td>
';
        $buffer .= $indent . '                                        <td>Dakota Rice</td>
';
        $buffer .= $indent . '                                        <td>$36,738</td>
';
        $buffer .= $indent . '                                        <td>Niger</td>
';
        $buffer .= $indent . '                                        <td>Oud-Turnhout</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>2</td>
';
        $buffer .= $indent . '                                        <td>Minerva Hooper</td>
';
        $buffer .= $indent . '                                        <td>$23,789</td>
';
        $buffer .= $indent . '                                        <td>Curaçao</td>
';
        $buffer .= $indent . '                                        <td>Sinaai-Waas</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>3</td>
';
        $buffer .= $indent . '                                        <td>Sage Rodriguez</td>
';
        $buffer .= $indent . '                                        <td>$56,142</td>
';
        $buffer .= $indent . '                                        <td>Netherlands</td>
';
        $buffer .= $indent . '                                        <td>Baileux</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>4</td>
';
        $buffer .= $indent . '                                        <td>Philip Chaney</td>
';
        $buffer .= $indent . '                                        <td>$38,735</td>
';
        $buffer .= $indent . '                                        <td>Korea, South</td>
';
        $buffer .= $indent . '                                        <td>Overland Park</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>5</td>
';
        $buffer .= $indent . '                                        <td>Doris Greene</td>
';
        $buffer .= $indent . '                                        <td>$63,542</td>
';
        $buffer .= $indent . '                                        <td>Malawi</td>
';
        $buffer .= $indent . '                                        <td>Feldkirchen in Kärnten</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>6</td>
';
        $buffer .= $indent . '                                        <td>Mason Porter</td>
';
        $buffer .= $indent . '                                        <td>$78,615</td>
';
        $buffer .= $indent . '                                        <td>Chile</td>
';
        $buffer .= $indent . '                                        <td>Gloucester</td>
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div class="col-md-12">
';
        $buffer .= $indent . '                        <div class="card card-plain">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">Table on Plain Background</h4>
';
        $buffer .= $indent . '                                <p class="category">Here is a subtitle for this table</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content table-responsive table-full-width">
';
        $buffer .= $indent . '                                <table class="table table-hover">
';
        $buffer .= $indent . '                                    <thead>
';
        $buffer .= $indent . '                                    <th>ID</th>
';
        $buffer .= $indent . '                                    <th>Name</th>
';
        $buffer .= $indent . '                                    <th>Salary</th>
';
        $buffer .= $indent . '                                    <th>Country</th>
';
        $buffer .= $indent . '                                    <th>City</th>
';
        $buffer .= $indent . '                                    </thead>
';
        $buffer .= $indent . '                                    <tbody>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>1</td>
';
        $buffer .= $indent . '                                        <td>Dakota Rice</td>
';
        $buffer .= $indent . '                                        <td>$36,738</td>
';
        $buffer .= $indent . '                                        <td>Niger</td>
';
        $buffer .= $indent . '                                        <td>Oud-Turnhout</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>2</td>
';
        $buffer .= $indent . '                                        <td>Minerva Hooper</td>
';
        $buffer .= $indent . '                                        <td>$23,789</td>
';
        $buffer .= $indent . '                                        <td>Curaçao</td>
';
        $buffer .= $indent . '                                        <td>Sinaai-Waas</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>3</td>
';
        $buffer .= $indent . '                                        <td>Sage Rodriguez</td>
';
        $buffer .= $indent . '                                        <td>$56,142</td>
';
        $buffer .= $indent . '                                        <td>Netherlands</td>
';
        $buffer .= $indent . '                                        <td>Baileux</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>4</td>
';
        $buffer .= $indent . '                                        <td>Philip Chaney</td>
';
        $buffer .= $indent . '                                        <td>$38,735</td>
';
        $buffer .= $indent . '                                        <td>Korea, South</td>
';
        $buffer .= $indent . '                                        <td>Overland Park</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>5</td>
';
        $buffer .= $indent . '                                        <td>Doris Greene</td>
';
        $buffer .= $indent . '                                        <td>$63,542</td>
';
        $buffer .= $indent . '                                        <td>Malawi</td>
';
        $buffer .= $indent . '                                        <td>Feldkirchen in Kärnten</td>
';
        $buffer .= $indent . '                                    </tr>
';
        $buffer .= $indent . '                                    <tr>
';
        $buffer .= $indent . '                                        <td>6</td>
';
        $buffer .= $indent . '                                        <td>Mason Porter</td>
';
        $buffer .= $indent . '                                        <td>$78,615</td>
';
        $buffer .= $indent . '                                        <td>Chile</td>
';
        $buffer .= $indent . '                                        <td>Gloucester</td>
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '
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

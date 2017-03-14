<?php

class __IumioTemp_ec1cfaa27766451e1ce4d3fda4e389e8 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
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
        $buffer .= $indent . '    <div class="sidebar" data-color="purple" data-image="';
        // 'img_fgm' section
        $value = $context->find('img_fgm');
        $buffer .= $this->section9fa899d7fdfe5e6590e5797953dce1ef($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <!--
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
';
        $buffer .= $indent . '            Tip 2: you can also add an image using data-image tag
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="sidebar-wrapper">
';
        $buffer .= $indent . '            <div class="logo">
';
        $buffer .= $indent . '                <a href="http://www.creative-tim.com" class="simple-text">
';
        $buffer .= $indent . '                    Creative Tim
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <ul class="nav">
';
        $buffer .= $indent . '                <li class="active">
';
        $buffer .= $indent . '                    <a href="dashboard.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-graph"></i>
';
        $buffer .= $indent . '                        <p>Dashboard</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="user.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-user"></i>
';
        $buffer .= $indent . '                        <p>User Profile</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="table.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-note2"></i>
';
        $buffer .= $indent . '                        <p>Table List</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="typography.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-news-paper"></i>
';
        $buffer .= $indent . '                        <p>Typography</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="icons.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-science"></i>
';
        $buffer .= $indent . '                        <p>Icons</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="maps.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-map-marker"></i>
';
        $buffer .= $indent . '                        <p>Maps</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li>
';
        $buffer .= $indent . '                    <a href="notifications.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-bell"></i>
';
        $buffer .= $indent . '                        <p>Notifications</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <li class="active-pro">
';
        $buffer .= $indent . '                    <a href="upgrade.html">
';
        $buffer .= $indent . '                        <i class="pe-7s-rocket"></i>
';
        $buffer .= $indent . '                        <p>Upgrade to PRO</p>
';
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '            </ul>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
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
        $buffer .= $indent . '                    <a class="navbar-brand" href="#">Dashboard</a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="collapse navbar-collapse">
';
        $buffer .= $indent . '                    <ul class="nav navbar-nav navbar-left">
';
        $buffer .= $indent . '                        <li>
';
        $buffer .= $indent . '                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
';
        $buffer .= $indent . '                                <i class="fa fa-dashboard"></i>
';
        $buffer .= $indent . '                                <p class="hidden-lg hidden-md">Dashboard</p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                        <li class="dropdown">
';
        $buffer .= $indent . '                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
';
        $buffer .= $indent . '                                <i class="fa fa-globe"></i>
';
        $buffer .= $indent . '                                <b class="caret hidden-sm hidden-xs"></b>
';
        $buffer .= $indent . '                                <span class="notification hidden-sm hidden-xs">5</span>
';
        $buffer .= $indent . '                                <p class="hidden-lg hidden-md">
';
        $buffer .= $indent . '                                    5 Notifications
';
        $buffer .= $indent . '                                    <b class="caret"></b>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                            <ul class="dropdown-menu">
';
        $buffer .= $indent . '                                <li><a href="#">Notification 1</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Notification 2</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Notification 3</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Notification 4</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Another notification</a></li>
';
        $buffer .= $indent . '                            </ul>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                        <li>
';
        $buffer .= $indent . '                            <a href="">
';
        $buffer .= $indent . '                                <i class="fa fa-search"></i>
';
        $buffer .= $indent . '                                <p class="hidden-lg hidden-md">Search</p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <ul class="nav navbar-nav navbar-right">
';
        $buffer .= $indent . '                        <li>
';
        $buffer .= $indent . '                            <a href="">
';
        $buffer .= $indent . '                                <p>Account</p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                        <li class="dropdown">
';
        $buffer .= $indent . '                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
';
        $buffer .= $indent . '                                <p>
';
        $buffer .= $indent . '                                    Dropdown
';
        $buffer .= $indent . '                                    <b class="caret"></b>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                            <ul class="dropdown-menu">
';
        $buffer .= $indent . '                                <li><a href="#">Action</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Another action</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Something</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Another action</a></li>
';
        $buffer .= $indent . '                                <li><a href="#">Something</a></li>
';
        $buffer .= $indent . '                                <li class="divider"></li>
';
        $buffer .= $indent . '                                <li><a href="#">Separated link</a></li>
';
        $buffer .= $indent . '                            </ul>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                        <li>
';
        $buffer .= $indent . '                            <a href="#">
';
        $buffer .= $indent . '                                <p>Log out</p>
';
        $buffer .= $indent . '                            </a>
';
        $buffer .= $indent . '                        </li>
';
        $buffer .= $indent . '                        <li class="separator hidden-lg hidden-md"></li>
';
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </nav>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="content">
';
        $buffer .= $indent . '            <div class="container-fluid">
';
        $buffer .= $indent . '                <div class="row">
';
        $buffer .= $indent . '                    <div class="col-md-4">
';
        $buffer .= $indent . '                        <div class="card">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">Email Statistics</h4>
';
        $buffer .= $indent . '                                <p class="category">Last Campaign Performance</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                <div class="footer">
';
        $buffer .= $indent . '                                    <div class="legend">
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-info"></i> Open
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-danger"></i> Bounce
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <hr>
';
        $buffer .= $indent . '                                    <div class="stats">
';
        $buffer .= $indent . '                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div class="col-md-8">
';
        $buffer .= $indent . '                        <div class="card">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">Users Behavior</h4>
';
        $buffer .= $indent . '                                <p class="category">24 Hours performance</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <div id="chartHours" class="ct-chart"></div>
';
        $buffer .= $indent . '                                <div class="footer">
';
        $buffer .= $indent . '                                    <div class="legend">
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-info"></i> Open
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-danger"></i> Click
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-warning"></i> Click Second Time
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <hr>
';
        $buffer .= $indent . '                                    <div class="stats">
';
        $buffer .= $indent . '                                        <i class="fa fa-history"></i> Updated 3 minutes ago
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div class="row">
';
        $buffer .= $indent . '                    <div class="col-md-6">
';
        $buffer .= $indent . '                        <div class="card ">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">2014 Sales</h4>
';
        $buffer .= $indent . '                                <p class="category">All products including Taxes</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <div id="chartActivity" class="ct-chart"></div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                <div class="footer">
';
        $buffer .= $indent . '                                    <div class="legend">
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-info"></i> Tesla Model S
';
        $buffer .= $indent . '                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <hr>
';
        $buffer .= $indent . '                                    <div class="stats">
';
        $buffer .= $indent . '                                        <i class="fa fa-check"></i> Data information certified
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div class="col-md-6">
';
        $buffer .= $indent . '                        <div class="card ">
';
        $buffer .= $indent . '                            <div class="header">
';
        $buffer .= $indent . '                                <h4 class="title">Tasks</h4>
';
        $buffer .= $indent . '                                <p class="category">Backend development</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="content">
';
        $buffer .= $indent . '                                <div class="table-full-width">
';
        $buffer .= $indent . '                                    <table class="table">
';
        $buffer .= $indent . '                                        <tbody>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox" checked="">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox" checked="">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Read "Following makes Medium better"</td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        <tr>
';
        $buffer .= $indent . '                                            <td>
';
        $buffer .= $indent . '                                                <label class="checkbox">
';
        $buffer .= $indent . '                                                    <input type="checkbox" value="" data-toggle="checkbox">
';
        $buffer .= $indent . '                                                </label>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                            <td>Unfollow 5 enemies from twitter</td>
';
        $buffer .= $indent . '                                            <td class="td-actions text-right">
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-edit"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
';
        $buffer .= $indent . '                                                    <i class="fa fa-times"></i>
';
        $buffer .= $indent . '                                                </button>
';
        $buffer .= $indent . '                                            </td>
';
        $buffer .= $indent . '                                        </tr>
';
        $buffer .= $indent . '                                        </tbody>
';
        $buffer .= $indent . '                                    </table>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                <div class="footer">
';
        $buffer .= $indent . '                                    <hr>
';
        $buffer .= $indent . '                                    <div class="stats">
';
        $buffer .= $indent . '                                        <i class="fa fa-history"></i> Updated 3 minutes ago
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
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
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
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
        $buffer .= $indent . '</html>
';

        return $buffer;
    }

    private function section9fa899d7fdfe5e6590e5797953dce1ef(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'sidebar-5.jpg';
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
                
                $buffer .= 'sidebar-5.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}

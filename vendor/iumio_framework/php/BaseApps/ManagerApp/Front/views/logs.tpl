{extends 'template.tpl'}
{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    {include file='partials/toogle.tpl'}
                    <a class="navbar-brand" href="#">Logs Manager</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                </div>

            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs events statistics for Dev environment</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content dashboardStats" attr-href="{route name='iumio_manager_dashboard_get_statistics'}">
                                <ul>
                                    <li class="iumiohidden">Apps  : <span class="dashb-app">0</span> </li>
                                    <li class="iumiohidden">Apps enabled : <span class="dashb-appena">0</span></li>
                                    <li class="iumiohidden">Apps prefixed  : <span class="dashb-apppre">0</span></li>
                                    <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                    <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                    <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                    <li>Requests successful : <span class="dashb-reqsuc-dev">0</span></li>
                                    <li>Events : <span class="dashb-err-dev">0</span></li>
                                    <li>Critical events (500) : <span class="dashb-errcri-dev">0</span></li>
                                    <li>Others events : <span class="dashb-erroth-dev">0</span></li>
                                    <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs events statistics for Prod environment</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content dashboardStats2" attr-href="{route name='iumio_manager_dashboard_get_statistics'}">
                                <ul>
                                    <li class="iumiohidden">Apps  : <span class="dashb-app">0</span> </li>
                                    <li class="iumiohidden">Apps enabled : <span class="dashb-appena">0</span></li>
                                    <li class="iumiohidden">Apps prefixed  : <span class="dashb-apppre">0</span></li>
                                    <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                    <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                    <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                    <li>Requests successful : <span class="dashb-reqsuc-prod">0</span></li>
                                    <li>Events : <span class="dashb-err-prod">0</span></li>
                                    <li>Critical events (500) : <span class="dashb-errcri-prod">0</span></li>
                                    <li>Others events : <span class="dashb-erroth-prod">0</span></li>
                                    <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Options</h4>
                            </div>
                            <div class="content">
                                <div class="row center-block text-center manager-options">
                                    <div class="col-md-6">
                                        <a class="btn-default btn clearlogs"  attr-href="{route name='iumio_manager_logs_manager_clear' params=['env' => "dev"]}" attr-env="dev">Clear logs - dev</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn-default btn clearlogs"  attr-href="{route name='iumio_manager_logs_manager_clear' params=['env' => "prod"]}" attr-env="prod">Clear logs - prod</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs list for Dev environment (<span class="iumiocountlog">0</span>)</h4>
                                <p class="category">Referer to dev.log</p>
                            </div>
                            <div class="content table-responsive table-full-width iumio-unlimited-log-display">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>UIDIE</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Method</th>
                                    </thead>
                                    <tbody class="logslist" attr-href="{route name='iumio_manager_logs_manager_get_all' params=['env' => "dev"]}">
                                    <!--<tr>
                                        <td>0</td>
                                        <td>DakotaRice</td>
                                        <td>Yes</td>
                                        <td>A/A</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>MinervaHooper</td>
                                        <td>No</td>
                                        <td>B/B</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-center loader-iumio-m pulse animated" style="display: none">
                                    <i class="fa fa-search fa-3x center-block text-center"></i>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Logs list for Prod environment (<span class="iumiocountlog2">0</span>)</h4>
                                <p class="category">Referer to prod.log</p>
                            </div>
                            <div class="content table-responsive table-full-width iumio-unlimited-log-display2">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>UIDIE</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>IP</th>
                                    <th>Method</th>
                                    </thead>
                                    <tbody class="logslist2" attr-href="{route name='iumio_manager_logs_manager_get_all' params=['env' => "prod"]}">
                                    <!--<tr>
                                        <td>0</td>
                                        <td>DakotaRice</td>
                                        <td>Yes</td>
                                        <td>A/A</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>MinervaHooper</td>
                                        <td>No</td>
                                        <td>B/B</td>
                                        <td><button>E</button></td>
                                        <td><button>D</button></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-center loader-iumio-m2 pulse animated" style="display: none">
                                    <i class="fa fa-search fa-3x center-block text-center"></i>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
            {include file='partials/footer.tpl'}

        </div>
    </div>
{/block}
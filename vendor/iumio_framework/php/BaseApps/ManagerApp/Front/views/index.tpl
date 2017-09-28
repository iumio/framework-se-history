{extends 'template.tpl'}

{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
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
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">iumio Framework</h4>
                                    <p class="category">Characteristics</p>
                                </div>
                                <div class="content">
                                    <ul class="break-word">
                                        <li>Framework edition : {framework_info name='VERSION_EDITION'} </li>

                                        <li>Actual version : {framework_info name='VERSION_STAGE'} {framework_info name='VERSION'} </li>

                                        <li>Installation date : {$fi->installation}</li>

                                        <li>User installed : {$fi->user}</li>

                                        <li>Main location installed : {$fi->location}</li>

                                        <li>Main OS installed : {$fi->os}</li>

                                        <li>Language installed : {$fi->lang}</li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Server</h4>
                                    <p class="category">Informations</p>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Server : {system_info name='SERVER_SOFTWARE' }</li>
                                        <li>PHP version : {system_info name='PHP_VERSION' }</li>
                                        <li>Domain : {system_info name='SERVER_NAME'}</li>
                                        <li>User Agent : {system_info name='HTTP_USER_AGENT'}</li>
                                        <li>Protocol : {system_info name='SERVER_PROTOCOL'}</li>
                                        <li>Port : {system_info name='SERVER_PORT'}</li>
                                        <li>Use SSL : {if $https} Yes {else} No {/if} </li>
                                     </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Logs</h4>
                                    <p class="category">Last logs errors for {$env} (10)</p>
                                </div>
                                <div class="content" style="overflow: auto">
                                    <ul class="lastlog elemcard" attr-href="{route name='iumio_manager_logs_get'}">

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">iumio Framework</h4>
                                    <p class="category">Statistics</p>
                                </div>
                                <div class="content dashboardStats elemcard" style="overflow: auto;padding-left: 40px" attr-href="{route name='iumio_manager_dashboard_get_statistics'}">
                                    <ul class="col-md-6">
                                        <li>Apps  : <span class="dashb-app">0</span> </li>
                                        <li>Apps enabled : <span class="dashb-appena">0</span></li>
                                        <li>App prefixed  : <span class="dashb-apppre">0</span></li>
                                        <li>Routes  : <span class="dashb-route">0</span></li>
                                        <li>Routes disabled : <span class="dashb-routedisa">0</span></li>
                                        <li>Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                        <li>Databases connected : <span class="dashb-dbco">0</span></li>

                                    </ul>
                                    <ul class="col-md-6">
                                        <li>
                                            <strong>DEV</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-dev">0</span></li>
                                                <li>Errors : <span class="dashb-err-dev">0</span></li>
                                                <li>Critical Errors (500) : <span class="dashb-errcri-dev">0</span></li>
                                                <li>Others Errors : <span class="dashb-erroth-dev">0</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>PROD</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-prod">0</span></li>
                                                <li>Errors : <span class="dashb-err-prod">0</span></li>
                                                <li>Critical Errors (500) : <span class="dashb-errcri-prod">0</span></li>
                                                <li>Others Errors : <span class="dashb-erroth-prod">0</span></li>
                                            </ul>
                                        </li>


                                    </ul>
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




{extends 'template.tpl'}

{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        {include file='partials/toogle.tpl'}
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
                            <div class="h350 card">
                                <div class="header">
                                    <h4 class="title">iumio Framework instance</h4>
                                    <p class="category">Informations about iumio Framework instance</p>
                                </div>
                                {nocache}
                                <div class="content"  style="overflow: auto;padding-left: 40px;max-height: 220px;">
                                    <ul class="break-word col-md-12">
                                        <li>Edition name : iumio Framework {framework_info name='EDITION_FULLNAME'} </li>

                                        <li>Edition version : {framework_info name='EDITION_STAGE'} {framework_info name='EDITION_VERSION'} ({framework_info name='EDITION_BUILD'}) </li>

                                        <li>Installation date : {$fi->installation}</li>

                                        {if isset($fi->deployment) and ($fi->deployment != null) }<li>Deployment date : {$fi->deployment}</li>{/if}

                                        <li>Installation location : {framework_info name='LOCATION'}</li>

                                        <li>U3i : {framework_info name='EDITION_U3I'}</li>

                                        <li>Current default environment : {$fi->default_env}</li>

                                    </ul>

                                    <p class="category">Core Informations</p>

                                    <ul class="break-word col-md-12">
                                        <li>Core name : {framework_info name='CORE_NAME'} </li>

                                        <li>Core version : {framework_info name='CORE_STAGE'} {framework_info name='CORE_VERSION'} ({framework_info name='CORE_BUILD'}) </li>
                                    </ul>

                                </div>
                                {/nocache}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Server Informations</h4>
                                    <p class="category">Informations about server instance</p>
                                </div>
                                <div class="content" style="overflow: auto;padding-left: 40px;max-height: 220px;">
                                    {nocache}
                                    <ul class="col-md-12">
                                        <li>Server : {system_info name='SERVER_SOFTWARE' }</li>
                                        <li>PHP version : {system_info name='PHP_VERSION' }</li>
                                        <li>Domain : {system_info name='SERVER_NAME'}</li>
                                        <li>Protocol : {system_info name='SERVER_PROTOCOL'}</li>
                                        <li>Port : {system_info name='SERVER_PORT'}</li>
                                        <li>Use SSL : {if $https} Yes {else} No {/if} </li>
                                    </ul>
                                    {/nocache}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">Logs events</h4>
                                    <p class="category">Last events logs for <strong>{nocache}{$env}{/nocache}</strong> (10)</p>
                                </div>
                                <div class="content" style="overflow: auto;max-height: 220px">
                                    <ul class="lastlog elemcard" attr-href="{nocache}{route name='iumio_manager_logs_get'}{/nocache}">

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h350">
                                <div class="header">
                                    <h4 class="title">iumio Framework Statistics</h4>
                                    <p class="category">Statistics about iumio Framework instance</p>
                                </div>
                                <div class="content dashboardStats elemcard"  attr-href="{nocache}{route name='iumio_manager_dashboard_get_statistics'}{/nocache}" style="overflow: auto;padding-left: 40px">
                                    <ul class="col-md-6">
                                        <li>Apps  : <span class="dashb-app">0</span> </li>
                                        <li>Apps enabled : <span class="dashb-appena">0</span></li>
                                        <li>Apps prefixed  : <span class="dashb-apppre">0</span></li>
                                        <li>Routes  : <span class="dashb-route">0</span></li>
                                        <li>Routes disabled : <span class="dashb-routedisa">0</span></li>
                                        <li>Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                        <li>Databases connected : <span class="dashb-dbco">0</span></li>

                                    </ul>
                                    <ul class="col-md-6">
                                        <li>
                                            <strong>Dev</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-dev">0</span></li>
                                                <li>Events : <span class="dashb-err-dev">0</span></li>
                                                <li>Critical events (500) : <span class="dashb-errcri-dev">0</span></li>
                                                <li>Others events : <span class="dashb-erroth-dev">0</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Prod</strong>
                                            <ul>
                                                <li>Requests successful : <span class="dashb-reqsuc-prod">0</span></li>
                                                <li>Events : <span class="dashb-err-prod">0</span></li>
                                                <li>Critical events (500) : <span class="dashb-errcri-prod">0</span></li>
                                                <li>Others events : <span class="dashb-erroth-prod">0</span></li>
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




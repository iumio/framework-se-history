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

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">iumio Framework</h4>
                                    <p class="category">Characteristics</p>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Framework edition : {framework_info name='VERSION_EDITION'} </li>

                                        <li>Actual version : {framework_info name='VERSION_STAGE'} {framework_info name='VERSION'} </li>

                                        <li>Installation date : {$fi->installation}</li>

                                        <li>User install : {$fi->user}</li>

                                        <li>Base location install : {$fi->location}</li>

                                        <li>Base OS install : {$fi->location}</li>



                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
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
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Logs</h4>
                                    <p class="category">Last logs error</p>
                                </div>
                                <div class="content">
                                    <ul class="lastlog" attr-href="{route name='iumio_manager_logs_get'}">

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">App</h4>
                                    <p class="category">Default App</p>
                                </div>
                                <div class="content">
                                    <ul class="defaultapp" attr-href="{route name='iumio_manager_app_default_get'}">

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




{extends 'template.tpl'}
{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                        {include file='partials/toogle.tpl'}
                    <a class="navbar-brand" href="#">Autoloader Manager</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Autoloader statistics</h4>
                                <p class="category">Statistics</p>
                            </div>
                            <div class="content autoloaderStats" attr-href="{route name='iumio_manager_autoloader_get_statistics'}">
                                <ul>
                                    <li>Classes for dev  : <span class="class-auto-dev">0</span> </li>
                                    <li>Classes for prod : <span class="class-auto-prod">0</span></li>
                                    <li>Uniques Files  : <span class="uni-auto">0</span></li>
                                    <li>Master classes : <span class="mast-auto">0</span></li>
                                    <li>Apps classes    : <span class="app-auto">0</span></li>
                                    <li>Last build for dev  : <span class="build-dev">0</span></li>
                                    <li>Last build for prod : <span class="build-prod">0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Options</h4>
                                    <p class="category">Manage autoloader ClassMap for dev and prod environment</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderdev"  attr-href="{route name='iumio_manager_autoloader_manager_build' params=["env" => "dev"] } ">Rebuild dev</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderprod"  attr-href="{route name='iumio_manager_autoloader_manager_build' params=["env" => "prod"] }">Build prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn clearautoloaderprod"  attr-href="{route name='iumio_manager_autoloader_manager_clear' params=["env" => "prod"] }">Clear prod</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn-default btn buildautoloaderall"  attr-href="{route name='iumio_manager_autoloader_manager_build' params=["env" => "all"] }">Build all</a>
                                        </div>
                                    </div>
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
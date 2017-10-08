{extends 'template.tpl'}
{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        {include file='partials/toogle.tpl'}
                        <a class="navbar-brand" href="#">App Manager</a>
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
                                    <h4 class="title">Apps statistics</h4>
                                    <p class="category">Statistics</p>
                                </div>
                                <div class="content dashboardStats" attr-href="{route name='iumio_manager_dashboard_get_statistics'}">
                                    <ul>
                                        <li>Apps  : <span class="dashb-app">0</span> </li>
                                        <li>Apps enabled : <span class="dashb-appena">0</span></li>
                                        <li>App prefixed  : <span class="dashb-apppre">0</span></li>
                                        <li class="iumiohidden">Routes  : <span class="dashb-route">0</span></li>
                                        <li class="iumiohidden">Routes disabled : <span class="dashb-routedisa">0</span></li>
                                        <li class="iumiohidden">Routes with public visibility : <span class="dashb-routevisi">0</span></li>
                                        <li class="iumiohidden">Requests successful : <span class="dashb-reqsuc">0</span></li>
                                        <li class="iumiohidden">Errors : <span class="dashb-err">0</span></li>
                                        <li class="iumiohidden">Critical Errors (Error 500) : <span class="dashb-errcri">0</span></li>
                                        <li class="iumiohidden">Others Errors : <span class="dashb-erroth">0</span></li>
                                        <li class="iumiohidden">Databases connected : <span class="dashb-dbco">0</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Options</h4>
                                    <p class="category">Actions to create and import an app</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-6">
                                            <a class="btn-default btn createapp"  attr-href="{route name='iumio_manager_app_manager_create_app'}">Create a new app</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn-default btn importapp"  attr-href="{route name='iumio_manager_app_manager_import_app'}">Import an app</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">List of your apps</h4>
                                    <p class="category">Referer to apps.json</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Enabled</th>
                                        <th>Prefix</th>
                                        <th>Namespace</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Export</th>
                                        </thead>
                                        <tbody class="applist" attr-href="{route name='iumio_manager_app_manager_get_simple_apps'}">
                                        </tbody>
                                    </table>

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
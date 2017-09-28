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
                        <a class="navbar-brand" href="#">Assets Manager</a>

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
                                    <h4 class="title">Options</h4>
                                    <p class="category">Publish and Clear</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishallassets"  attr-href="{route name='iumio_manager_assets_manager_publish' params=["appname" => "_all", "env" => "all"] } ">Publish all</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishalldevassets"  attr-href="{route name='iumio_manager_assets_manager_publish' params=["appname" => "_all", "env" => "dev"] }">Publish all dev</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn publishallprodassets"  attr-href="{route name='iumio_manager_assets_manager_publish' params=["appname" => "_all", "env" => "prod"] }">Publish all prod</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearallassets"  attr-href="{route name='iumio_manager_assets_manager_clear' params=["appname" => "_all", "env" => "all"] }">Clear all</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearalldevassets"  attr-href="{route name='iumio_manager_assets_manager_clear' params=["appname" => "_all", "env" => "dev"] }">Clear all dev</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn-default btn clearallprodassets"  attr-href="{route name='iumio_manager_assets_manager_clear' params=["appname" => "_all", "env" => "prod"] }">Clear all prod</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">List of your apps assets</h4>
                                    <p class="category">Referer to the web assets components</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead >
                                        <th>ID</th>
                                        <th>App name</th>
                                        <th>Assets directory</th>
                                        <th>Permissions Dev</th>
                                        <th>Permissions Prod</th>
                                        <th>Status Dev</th>
                                        <th>Status Prod</th>
                                        <th>Actions</th>
                                        </thead>
                                        <tbody class="getAllAssets" attr-href="{route name='iumio_manager_assets_manager_get_all'}">

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


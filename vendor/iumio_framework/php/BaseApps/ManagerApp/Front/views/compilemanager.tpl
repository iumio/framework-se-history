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
                        <a class="navbar-brand" href="#">Compiled Manager</a>
                        <a class="btn-default btn clearcache"  attr-href="{route name='iumio_manager_compile_manager_remove_all'}">Clear all compiled files</a>
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
                                    <h4 class="title">Compiled list</h4>
                                    <p class="category">Referer to compilation directory</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>Directory name</th>
                                        <th>Path</th>
                                        <th>Size</th>
                                        <th>Permissions</th>
                                        <th>Status</th>
                                        <th>Clear</th>
                                        </thead>
                                        <tbody class="getAllEnvCompile" attr-href="{route name='iumio_manager_compile_manager_get_all'}">
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
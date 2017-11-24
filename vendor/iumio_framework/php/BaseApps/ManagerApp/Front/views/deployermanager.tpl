{extends 'template.tpl'}
{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    {include file='partials/toogle.tpl'}
                    <a class="navbar-brand" href="#">Deployer Manager</a>
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
                    {if $default_env === "dev"}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Options</h4>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                            <p class="text-center text-deploy-iumio"></p>
                                            <a class="btn-default btn deployprod btn-success" style="width: 170px!important;" attr-href="{route name='iumio_manager_deployer_manager_process_deploy'}">Deploy to production</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Deployment requirements</h4>
                                    <p class="category">Things required to deploy properly</p>
                                </div>
                                <div class="content iumio-overflow-x">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody class="requirements-deployment" attr-current-default-env="{$default_env}" attr-href="{route name='iumio_manager_deployer_manager_requirements_deploy'}">
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history refresh-req-deploy"></i> Updated <span class="last_up_req_deploy">0</span> minutes ago -
                                        </div>
                                        <a class="text-info iumioDeployReload">Reload requirements</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {else}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Status</h4>
                                    <p class="category">Deploy properly your application to production environment</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                           <h3 class="text-success">Your(s) application(s) is already deployed.</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="header">
                                    <h4 class="title">Informations</h4>
                                    <p class="category">You can undeployed your application to switch to development environement</p>
                                </div>
                                <div class="content">
                                    <div class="row center-block text-center manager-options">
                                        <div class="col-md-12">
                                            <a class="btn-default btn switchdeploy btn-success" attr-href="{route name='iumio_manager_deployer_manager_switch_deploy'}">Switch to dev</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}

                </div>
            </div>
        </div>
            {include file='partials/footer.tpl'}

        </div>
    </div>
{/block}
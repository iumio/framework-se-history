<div class="sidebar" data-color="blue" data-image="{img_iumio name='iumio_img_theme.jpeg'}">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive img-responsive-iumio-framework" src="{img_iumio name='iumio.logo.white.framework.png'}" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav sidebar-list">
        <li class="{if $selected == "dashboard"}active{/if}">
            <a href="{route name='iumio_manager_index' component='yes'}">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{if $selected == "appmanager"}active{/if}">
            <a href="{route name='iumio_manager_app_manager' component='yes'}">
                <i class="pe-7s-config"></i>
                <p>Apps</p>
            </a>
        </li>
        <li class="{if $selected == "cachemanager"}active{/if}">
            <a href="{route name='iumio_manager_cache_manager' component='yes'}">
                <i class="pe-7s-back-2"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="{if $selected == "compilemanager"}active{/if}">
            <a href="{route name='iumio_manager_compile_manager' component='yes'}">
                <i class="pe-7s-angle-right"></i>
                <p>Compiled</p>
            </a>
        </li>
        <li class="{if $selected == "assetsmanager"}active{/if}">
            <a href="{route name='iumio_manager_assets_manager' component='yes'}">
                <i class="pe-7s-star"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="{if $selected == "smartymanager"}active{/if}">
            <a href="{route name='iumio_manager_smarty_manager' component='yes'}">
                <i class="pe-7s-note2"></i>
                <p>Smarty</p>
            </a>
        </li>
        <li class="{if $selected == "routingmanager"}active{/if}">
            <a href="{route name='iumio_manager_routing_manager' component='yes'}">
                <i class="pe-7s-link"></i>
                <p>Routing</p>
            </a>
        </li>
        <li class="{if $selected == "logsmanager"}active{/if}">
            <a href="{route name='iumio_manager_logs_manager' component='yes'}">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
        <li class="{if $selected == "databasesmanager"}active{/if}">
            <a href="{route name='iumio_manager_databases_manager' component='yes'}">
                <i class="pe-7s-paperclip"></i>
                <p>Databases</p>
            </a>
        </li>
        <li class="{if $selected == "autoloadermanager"}active{/if}">
            <a href="{route name='iumio_manager_autoloader_manager' component='yes'}">
                <i class="pe-7s-magic-wand"></i>
                <p>Engine Autoloader</p>
            </a>
        </li>
        <li class="{if $selected == "hostsmanager"}active{/if}">
            <a href="{route name='iumio_manager_hosts_manager' component='yes'}">
                <i class="pe-7s-target"></i>
                <p>Hosts</p>
            </a>
        </li>
        <li class="{if $selected == "servicesmanager"}active{/if}">
            <a href="{route name='iumio_manager_services_manager' component='yes'}">
                <i class="pe-7s-settings"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="{if $selected == "deployermanager"}active{/if}">
            <a href="{route name='iumio_manager_deployer_manager' component='yes'}">
                <i class="pe-7s-check"></i>
                <p>Deployer</p>
            </a>
        </li>
    </ul>
</div>
</div>

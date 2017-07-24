<div class="sidebar" data-color="blue" data-image="{img_iumio name='iumio_img_theme.jpeg'}">
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="https://framework.iumio.com" class="simple-text">
            <img class="img-responsive" src="{img_iumio name='logo_white.png'}" />
            <h6>Manager</h6>
        </a>
    </div>

    <ul class="nav">
        <li class="{if $selected == "dashboard"}active{/if}">
            <a href="{route name='iumio_manager_index' component='yes'}">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{if $selected == "appmanager"}active{/if}">
            <a href="{route name='iumio_manager_app_manager' component='yes'}">
                <i class="pe-7s-user"></i>
                <p>App</p>
            </a>
        </li>
        <li class="{if $selected == "cachemanager"}active{/if}">
            <a href="{route name='iumio_manager_cache_manager' component='yes'}">
                <i class="pe-7s-light"></i>
                <p>Cache</p>
            </a>
        </li>
        <li class="{if $selected == "compilemanager"}active{/if}">
            <a href="{route name='iumio_manager_compile_manager' component='yes'}">
                <i class="pe-7s-comment"></i>
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
                <p>Smarty Manager</p>
            </a>
        </li>
        <li class="{if $selected == "routingmanager"}active{/if}">
            <a href="{route name='iumio_manager_routing_manager' component='yes'}">
                <i class="pe-7s-diamond"></i>
                <p>Routing Manager</p>
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
    </ul>
</div>
</div>
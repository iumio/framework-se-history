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
            <a href="{route name='iumio_manager_index'}">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{if $selected == "appmanager"}active{/if}">
            <a href="{route name='iumio_manager_app_manager'}">
                <i class="pe-7s-user"></i>
                <p>App</p>
            </a>
        </li>
        <li class="{if $selected == "basemanager"}active{/if}" style="background-color: silver">
            <a href="#{*route name='iumio_manager_base_app_manager'*}">
                <i class="pe-7s-user"></i>
                <p>Base App (Later)</p>
            </a>
        </li>
        <li class="{if $selected == "assetsmanager"}active{/if}">
            <a href="{route name='iumio_manager_assets_manager'}">
                <i class="pe-7s-note2"></i>
                <p>Assets</p>
            </a>
        </li>
        <li class="{if $selected == "smartymanager"}active{/if}">
            <a href="{route name='iumio_manager_smarty_manager'}">
                <i class="pe-7s-note2"></i>
                <p>Smarty Manager</p>
            </a>
        </li>
        <li class="{if $selected == "logsmanager"}active{/if}">
            <a href="{route name='iumio_manager_logs_manager'}">
                <i class="pe-7s-news-paper"></i>
                <p>Logs</p>
            </a>
        </li>
    </ul>
</div>
</div>
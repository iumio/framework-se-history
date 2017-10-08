{extends 'template.tpl'}
{block name="principal"}
    <div class="wrapper">
        {include file='partials/sidebar.tpl'}
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed {if $details->code == 500}navbar-ct-red{elseif $details->code == 200}navbar-ct-green{else}navbar-ct-orange{/if}">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Logs Manager  - UIDIE : {$details->uidie} - {$details->code} {$details->code_title}</a>
                    <button type="button" class="navbar-toggle toggle-iumio-manager" data-toggle="collapse" data-target="#navigation-example-2" style="margin-top: 30px!important;margin-right: 20px!important;">
                        Menu
                    </button>
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
                                <h4 class="title">{if $details->code == 200}Success details{else}Error details{/if}</h4>
                                <p class="category fs16">UIDIE : <strong>{$details->uidie}</p>
                                <p class="category fs16">Environment : <strong>{$env}</p>
                                <p class="category fs16">Code : {$details->code} | Type : {$details->code_title}</p>
                                <p class="category fs16">Generated : {$details->time->date|date_format:"%A, %B %e, %Y at %r"}</p>
                                <p class="category fs16">Method : {$details->method}</p>
                                <p class="category fs16 ">Host IP : [ {$details->client_ip}]</p>
                                <p class="category fs16 break-word">Host URI : {$details->uri}</p>
                                <p class="category fs16 break-word">Referer : {$details->referer}</p>
                            </div>
                            {if $details->code != 200}
                            <div class="content text-center">
                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Explain</p>{$details->explain}</h5>
                                </div>

                                <div class="typo-line">
                                    <h5 class="break-word"><p class="category fs20 fw900">Solution</p>{$details->solution}</h5>
                                </div>
                            </div>
                            {else}
                                <div class="content text-center">
                                </div>
                            {/if}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trace</h4>
                                <p class="category">For Code : {$details->code} | Type : {$details->code_title}</p>
                            </div>
                            <div class="content text-center">
                                {foreach $details->trace as $one}
                                <div class="content text-center card-content-new">
                                   {if isset($one->file)}
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">File</p>{$one->file}</span>
                                    </div>
                                   {/if}
                                    <div class="typo-line">
                                        <span class="break-word"><p class="category">Function  {if isset($one->file)}& Line{/if}</p>{$one->class}{$one->type}{$one->function}  {if isset($one->file)}on line {$one->line}{/if}</span>
                                    </div>
                                </div>
                                <hr>
                                {/foreach}

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
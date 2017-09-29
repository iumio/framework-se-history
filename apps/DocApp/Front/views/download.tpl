{extends 'template.tpl'}
{block name="subtitle"} - Download iumio Framework {$edition} {/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1">{$edition}</h2>
                        <p class="to-animate intro-animate-2">{$edition_slogan}</p>
                        <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> Continue</a></p>
                    </div>
                    <div class="col-md-6 text-right fh5co-intro-img to-animate intro-animate-4">
                        <img src="{webassets path='public/images/iphone_6_3.png'}" alt="Iphone">
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- END .header -->

    <div id="fh5co-main">
    <div id="fh5co-features" data-section="features">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                <h2 class="fh5co-lead to-animate">{$edition}</h2>
                <p class="fh5co-sub to-animate">Why to download this edition ?</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                {foreach $edition_features as $feature}
                    <li> {$feature} </li>
                {/foreach}
            </div>


            <div class="clearfix visible-sm-block"></div>



        </div>
    </div>

    <div id="fh5co-pricing" data-section="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
                    <h2 class="fh5co-lead animate-single pricing-animate-1">Download iumio Framework {$edition}</h2>
                    <p class="fh5co-sub animate-single pricing-animate-2">You can choose as you want and what you need</p>
                </div>

                <div class="col-md-12 to-animate">
                    <a href="#" class="fh5co-figure active pricing-feature" disabled="disabled">
                        <span class="fh5co-price"><span><strong>{$short_edition}</strong></span></span>
                        <h3 class="fh5co-figure-lead">{$edition}</h3>
                        <p class="fh5co-figure-text">{if $edition_availability == 1}<span class="green">Available</span>{else}<span class="red">Not available</span>{/if}</p>

                        {if $edition_availability == 1}
                            <p class="fh5co-figure-text">{$edition_url['version_stage']} version - Published {$edition_url['version_published_date']}</p>

                            <div class="row center-block">
                            <div class="col-md-4" onclick="window.open('{$edition_url['tar.gz']}', '_blank')"><i class="icon-file-zip-o"></i> Version {$edition_url['version']} Tar.gz file</div>
                            <div class="col-md-4" onclick="window.open('{$edition_url['zip']}', '_blank')"><i class="icon-file-zip-o"></i> Version {$edition_url['version']} .zip file</div>
                            <div class="col-md-4" onclick="window.open('https://github.com/iumio-team/iumio-framework/', '_blank')"><i class="icon-github"></i> Download on Github</div>
                        </div>
                        {/if}
                    </a>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

{/block}
{extends 'template.tpl'}
{block name="subtitle"} - Contact {/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1 fadeInUp animated">How to install iumio Framework</h2>
                        <p class="to-animate intro-animate-2 fadeInUp animated">Here, you can see how to install the framework perfectly</p>
                        <p class="to-animate intro-animate-3 fadeInUp animated"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> See the installation process</a></p>
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

                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                       {$content}
                    </div>


                    <div class="clearfix visible-sm-block"></div>



                </div>
            </div>

        </div>
    </div>

{/block}
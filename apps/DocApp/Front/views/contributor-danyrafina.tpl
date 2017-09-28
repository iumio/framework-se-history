{extends 'template.tpl'}
{block name="subtitle"} - Contact {/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1">Dany Rafina</h2>
                        <p class="to-animate intro-animate-2">Architect of iumio Framework - Founder of iumio Components</p>
                        <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-eye"></i> View details</a></p>
                    </div>
                    <div class="col-md-6 text-right fh5co-intro-img to-animate intro-animate-4">
                        <img src="{webassets path='public/images/dany.jpg'}" alt="Dany rafina">
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
                        <h2 class="fh5co-lead to-animate">Dany Rafina</h2>
                        <p class="fh5co-sub to-animate">About him</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                        Dany Rafina is the founder of iumio Components. He created the iumio Framework. Passionate about the web technologies, they wish to improve the world of developers.
                    </div>


                    <div class="clearfix visible-sm-block"></div>



                </div>
            </div>

        </div>
    </div>

{/block}
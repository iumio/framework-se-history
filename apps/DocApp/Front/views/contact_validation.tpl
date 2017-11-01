{extends 'template.tpl'}
{block name="subtitle"} - Contact Validation {/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1">Contact</h2>
                        <p class="to-animate intro-animate-2">You message has been sent</p>
                        <p class="to-animate intro-animate-3"><a href="{route name="website_index"}" class="btn btn-primary btn-md"><i class="icon-code"></i> Return to home</a></p>
                    </div>
                    <div class="col-md-6 text-right fh5co-intro-img to-animate intro-animate-4">
                        <img src="{webassets path='public/images/iphone_6_3.png'}" alt="Iphone">
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- END .header -->
{/block}
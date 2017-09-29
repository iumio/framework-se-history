{extends 'template.tpl'}
{block name="subtitle"} - Contact {/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover; margin-top: 9px;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 fh5co-text">
                        <h2 class="to-animate intro-animate-1">Contact</h2>
                        <p class="to-animate intro-animate-2">Tell us what you mean.</p>
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
                        <h2 class="fh5co-lead to-animate">Contact us</h2>
                        <p class="fh5co-sub to-animate">A problem ? A question? Or would you like to join us? Fill out the form and we will contact you as soon as possible</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                        <form method="POST" action="{route name="website_submit_contact"}">
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-12"><input type="text" placeholder="Name" class="form-control" name="name" required="required"/> </div>

                                <div class="col-md-6 col-sm-12"><input type="email" placeholder="Email" class="form-control" name="email" required="required"/> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-sm-12"><input type="text" placeholder="Subject" class="form-control" name="subject" required="required"/> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-sm-12"><textarea placeholder="Say us" class="form-control" name="message" required="required"></textarea> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-6"><button type="submit" class="btn btn-primary btn-block">Send</button> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6"><button type="reset" class="btn btn-primary btn-block">Reset</button> </div>
                            </div>
                        </form>
                    </div>


                    <div class="clearfix visible-sm-block"></div>



                </div>
            </div>

        </div>
    </div>

{/block}
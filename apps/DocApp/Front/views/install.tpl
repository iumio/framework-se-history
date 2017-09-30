{extends 'template.tpl'}
{block name="subtitle"} - How to install iumio Framework{/block}

{block name='content'}

    <header id="fh5co-hero" data-section="home" role="banner" style="background: url({webassets path='public/images/landscape.jpg'}) top left; background-size: cover;" >
        <div class="fh5co-overlay"></div>
        <div class="fh5co-intro">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 fh5co-text">
                        <h2 class="to-animate intro-animate-1">How to install iumio Framework</h2>
                        <p class="to-animate intro-animate-2">Here, you can see how to install the framework perfectly</p>
                        <p class="to-animate intro-animate-3"><a href="#fh5co-features" class="btn btn-primary btn-md"><i class="icon-code"></i> See the process</a></p>
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
                        <h2 class="fh5co-lead to-animate">iumio Framework Installation</h2>
                        <p class="fh5co-sub to-animate">Here, you have details about iumio framework first installation.</p>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                        <h3>Before to process of iumio Framework installation, some elements are required :</h3>
                        <ul class="requirements">
                            <li>PHP 7.0 or later is required to execute iumio Framework in your environment. <br>
                                <i>Refer to php website : <a href="https://secure.php.net/" target="_blank">https://secure.php.net/</a></i>
                            </li>
                            <li>Composer must be installed in your environment. <br>
                                <i>Refer to composer website : <a href="https://getcomposer.org/download/" target="_blank">https://getcomposer.org/download/</a></i>
                            </li>
                            <li>You must to have a Apache or Nginx Webserver to hosting iumio Framework. <br>
                                <i>Others severs are not tested</i>
                            </li>
                            <li>Check the directory permission in your server.
                                <br>
                                <i>iumio Framework need the correct permission to read, write and execute cache, compiled and assets elements. <a href="https://framework.iumio.com/download/SE" target="_blank">Framework website</a></i>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
                        <h3>Installation process</h3>
                        <br>
                        <p>1. Uncompress the framework package with a zip utility</p>
                        <p>2. After unzip, move if you need, the framework directory to an other location</p>
                        <p>3. Open the terminal included in your operating system and go to the framework directory location.</p>
                        <p>
                        Two possibilities for the next step :
                        <ul class="requirements">
                            <li>If composer is is installed : execute the command : <code>composer install</code>
                            </li>
                            <li>If you downloaded only <code>composer.phar</code>, run the command : <code>php composer.phar install</code>
                            <br>
                            <i> Unsure your have PHP 7.* libraries installed</i>
                            </li>
                            <li><i>This step with composer, should install all components required by iumio Framework instance</i><br>
                            <i>If the command failed, Please check all directories permissions (read, write, execute)</i></li>

                        </ul>
                        </p>
                        <div class="col-md-12" style="padding-bottom: 20px;"><img src="{webassets path='public/images/composer1.png'}" alt="Composer 1"  class="img-responsive"></div>
                        <br>
                        <div class="col-md-12"><img src="{webassets path='public/images/composer2.png'}" alt="Composer 2"  class="img-responsive"></div>


                        <p style="padding: 30px;display: inline-block;">4. Go to <code>http://[framework_url_installation]/setup/setup.php</code> or <code>https://[framework_url_installation]/setup/setup.php</code> if SSL is enabled</p>
                        <br>
                        <div class="col-md-12"><img src="{webassets path='public/images/installer1.png'}" alt="iumio installer 2"  class="img-responsive"></div>

                        <p style="padding: 30px;display: inline-block;">5. Follow all installations stages.</p>
                    </div>


                    <div class="clearfix visible-sm-block"></div>



                </div>
            </div>



        </div>
    </div>

{/block}
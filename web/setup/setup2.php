
<?php
// EXIT IF DOES NOT HAVE ONE APP
if (!empty(json_decode(file_get_contents(__DIR__."/../../elements/config_files/core/initial.json"))))
    exit("iumio Installer - Cannot use iumio installer because you have already one app installed.");
?>
<!DOCTYPE html>
<html>
<head>
    <!--
    *
    * This is an iumio Framework component
    *
    * (c) RAFINA DANY <danyrafina@gmail.com>
    *
    * iumio Framework - iumio Components
    *
    * To get more information about licence, please check the licence file
    *
    -->
    <title>iumio Installer</title>
    <link rel="apple-touch-icon" sizes="180x180" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/manifest.json">
    <link rel="mask-icon" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css" >
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" >
    <script type="text/javascript" src="assets/jquery/jquery.js"></script>
    <script type="text/javascript" src="assets/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="assets/default.js"></script>
    <link rel="stylesheet" href="assets/default2.css" >
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body class="body-mod">
<div class="container-fluid">
    <div id="step0" class="content-middle align-content-center"><img id="iumio-components" src="assets/iumio.logo.white.framework.png" class="align-content-center text-center"></div>
    <div class="row hidden-step row-app">

        <div class="sidebar iumio-theme col-xs-12 col-sm-3 col-lg-2 ">
            <nav class=" nav-sidebar bg-faded sidebar-style-1 ">

                <h1 class="site-title"><a href="https://framework.iumio.com""><img  class="img-reponsive img-fluid img-logo-iumio d-block m-x-auto" src="assets/iumio.logo.white.framework.png"></a></h1>
                <ul class="nav nav-pills flex-column sidebar-nav">
                    <li class="nav-item"><a class="nav-link active" id="s1" href="#"><em class="fa fa-dashboard"></em>Welcome <i class="fa fa-check hidden"></i> </a></li>
                    <li class="nav-item"><a class="nav-link" id="s2" href="#"><em class="fa fa-file-text-o"></em>Licence <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s3" href="#"><em class="fa fa-list"></em>Requirements <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s4" href="#"><em class="fa fa-terminal"></em>Naming <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s5" href="#"><em class="fa fa-desktop"></em>iumio Theme <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s6" href="#"><em class="fa fa-list-alt"></em>Recap <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s7" href="#"><em class="fa fa-gears"></em>Processing <i class="fa fa-check hidden"></i></a></li>
                    <li class="nav-item"><a class="nav-link" id="s8"href="#"><em class="fa fa-check-circle"></em>End <i class="fa fa-check-circle hidden"></i></a></li>
                </ul>
            </nav>
        </div>
        <main class="col-xs-12 col-sm-9 offset-sm-3 col-lg-10 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
            <header class="page-header row justify-center">
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <h1 class="float-left text-center text-md-left header-text-iumio">Installation iumio Framework</h1>
                    </div>


                    <div class="progress progress-custom progress-md" >
                        <div class="progress-bar bg-primary iumio-installer-global-pg" style="width: 2%" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="clear"></div>
            </header>

            <section class="row content-iumio-installer">
                <div class="col-sm-12">
                    <section class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="jumbotron " id="step1">
                                <h1 class="mb-4">Welcome on iumio Framework installer</h1>

                                <p class="lead">With this interface, you will install the various components of iumio and your first appplication.</p>

                                <p>We will guide you so that the installation is carried out correctly.</p>

                                <p class="lead"><a class="btn btn-primary btn-lg mt-2" href="#" id="clicked" role="button">I'm ready now</a></p>
                            </div>

                            <div class="jumbotron hidden" id="step2">
                                <h1 class="mb-4">Licence</h1>
                                <p class="errorlicence bg-danger text-light" style="display: none;text-align: center;font-size: 20px;">Please check "I agree and accept licence terms and conditions" to continue app installation.</p>

                                <p class="lead">iumio framework is MIT licensed. Please read the entire license below.</p>
                                <hr>
                                <div class="licence">
                                    <h3 style="text-align: center;">MIT License</h3>
                                    <p style="text-align: center;">Version 3, 29 June 2007</p>

                                    <p>Copyright (c) 2017 RAFINA DANY
                                        <a href="https://framework.iumio.com/">https://framework.iumio.com/</a></p><p>
                                        Everyone is permitted to copy and distribute verbatim copies
                                        of this license document, but changing it is not allowed.</p>
                                    <p>Permission is hereby granted, free of charge, to any person obtaining a copy
                                        of this software and associated documentation files (the "Software"), to deal
                                        in the Software without restriction, including without limitation the rights
                                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                                        copies of the Software, and to permit persons to whom the Software is
                                        furnished to do so, subject to the following conditions:</p>

                                    <p>The above copyright notice and this permission notice shall be included in all
                                        copies or substantial portions of the Software.</p>

                                    <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
                                        SOFTWARE.
                                    </p>

                                </div>
                                <br>
                                <hr class="">
                                <div class="row justify-content-center">
                                    <div>
                                        <div class="check check-terms text-left">
                                            <input id="check" type="checkbox" class="cterms"/>
                                            <label for="check">
                                                <div class="box"><i class="fa fa-check fa-check-md"></i></div>
                                            </label>
                                        </div>
                                    </div>
                                    <p class="sentence-accept-terms ">
                                        I agree and accept licence terms and conditions.
                                    </p>
                                </div>

                                <div class="row justify-content-center">
                                    <p class="lead"><a class="btn btn-danger btn-lg mt-2 decline-licence" href="#" id="clicked" role="button">Decline</a></p>
                                    <p class="lead"><a class="btn btn-primary btn-lg mt-2 offset-2 accept-licence" href="#" id="clicked" role="button">Accept</a></p>

                                </div>
                            </div>

                            <div class="jumbotron hidden" id="step3">
                                <h1 class="mb-4">Requirements</h1>

                                <p class="lead">Installer checks if your environment are compatible and downloads required libraries.</p>

                                <div class="row">
                                    <div class="list-group requirements-list">
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active phpversion">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1" >PHP Version : <span class="phpversionnum"></span> <span class="isok"></span></h5>
                                                <small><i class="fa fa-check text-success hidden-step"></i></small>
                                            </div>
                                            <p class="mb-1">iumio Framework requires version 7.0 or higher to work.</p>
                                            <div class="error bg-danger text-light hidden-step"></div>

                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start fversion">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1" >Framework Version : <span class="fversionnum"></span> <span class="isok"></span></h5>
                                                <small class="text-muted"><i class="fa fa-check text-success hidden-step"></i></small>
                                            </div>
                                            <p class="mb-1">The installer checks the version of the framework.</p>
                                            <div class="error bg-danger text-light hidden-step"></div>

                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start wr">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Writable and readable directories :  <span class="isok">...</span> </h5>
                                                <small class="text-muted"><i class="fa fa-check text-success hidden-step"></i></small>
                                            </div>
                                            <p class="mb-1">./web ./elements ./apps folders must have read, write, and execute permissions.</p>
                                            <div class="error bg-danger text-light hidden-step"></div>
                                        </a>
                                        <!--<a href="#" class="list-group-item list-group-item-action flex-column align-items-start lr">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Download required libraries :  <span class="isok">In progress</span> </h5>
                                                <small class="text-muted"><i class="fa fa-check text-success hidden-step"></i></small>
                                            </div>
                                            <p class="mb-1">The installer must download different libraries in order to work properly. If an error occurs, please check your connectivity first.</p>
                                            <div class="error bg-danger text-light hidden-step"></div>

                                        </a>-->
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start libsr">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Verify required librairies :  <span class="isok">In progress</span> </h5>
                                                <small class="text-muted"><i class="fa fa-check text-success hidden-step"></i></small>
                                            </div>
                                            <p class="mb-1">The installer should check if the libraries have been correctly installed.</p>
                                            <div class="error bg-danger text-light hidden-step"></div>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <p class="lead"><a id="retrys3" class="btn btn-danger btn-lg mt-2 hidden-step" onclick="step3()" href="#" role="button">Retry</a></p>
                                    <p class="lead"><a id="continues3" class="btn btn-primary btn-lg mt-2  hidden-step" href="#" role="button">Next</a></p>
                                </div>


                            </div>

                            <div class="jumbotron hidden" id="step4">
                                <h1 class="mb-4">Naming your application</h1>

                                <p class="lead">Please, enter the name would like to your application.</p>


                                <h4 class="bg-danger text-light" style="font-size: 20px;text-align: center;display: none" id="error1">Your app name is incorrect</h4>


                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                    <input type="text" class="form-control" id="appname" placeholder="Your application name">
                                    <div class="input-group-addon">App</div>
                                </div>
                                <br>
                                <p class="text-light bg-primary text-left col-form-label" style="padding-left: 10px" <em><i class="fa fa-question"></i> &nbsp; In order to respect the name 'lumio', the name of your application will end with "App".</em></p>
                                <p class="text-light bg-info text-left col-form-label" style="padding-left: 10px" <em><i class="fa fa-warning"></i> &nbsp; The name of your application must contain at least 4 characters.</em></p>

                                <br>
                                <div class="row justify-content-around">
                                    <p class="lead"><a id="continues4" class="btn btn-primary btn-lg mt-2"  href="#" role="button">Next</a></p>
                                </div>

                            </div>

                            <div class="jumbotron hidden" id="step5">
                                <h1 class="mb-4">iumio Starter Theme</h1>

                                <p class="lead">With iumio Framework, you have the possibility to install with your application, a default theme to help you in the development of an interface.</p>

                                <br>
                                <p class="text-light bg-primary text-left col-form-label" style="padding-left: 10px"><i class="fa fa-question"></i> &nbsp; Do you want to install this theme?</p>
                                <br>

                                <div class="row justify-content-center">
                                    <p class="lead"><a class="btn btn-danger btn-lg mt-2" href="#" id="no5" role="button">I refuse</a></p>
                                    <p class="lead"><a class="btn btn-primary btn-lg mt-2 offset-2" href="#" id="yes5" role="button">I want to install this theme</a></p>

                                </div>
                            </div>

                            <div class="jumbotron hidden" id="step6">
                                <h1 class="mb-4">Summary of the installation.</h1>

                                <p class="lead">Before proceeding with the installation of iumio Framework, here is a little summary so that you can see if everything is correct.</p>

                                <div class="bg-info text-light padd-bg" style="padding-left: 20px; padding-bottom: 15px">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="img-thumbnail img-logo-iumio-thumb" src="assets/logo_white.png"/>
                                        </div>

                                        <div class="col-md-10">
                                            <span class="red-color"> Installation for <strong><span id="recapfedition"></span></strong></span>
                                            <br>
                                            <span>More info : <a class="alert-link" onclick="window.open('https://framework.iumio.com', '_blank')">Go to iumio Framework website</a></span>
                                        </div>

                                    </div>
                                </div>

                                <br>

                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1" id="appnamers"></h5>
                                            <small><i class="fa fa-check text-success"></i></small>
                                        </div>
                                        <p class="mb-1">You named your application "<span id="appnamesplited"></span>". The keyword "App" has been added by the installer to respect the naming of iumio applications.</p>

                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Application enabled</h5>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i></small>
                                        </div>
                                        <p class="mb-1">As this is your first application on this instance of iumio framework, the installer has automatically activated this application so that it is directly usable.</p>

                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Theme installation : <span id="templaters"></span></h5>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i></small>
                                        </div>
                                        <p class="mb-1 rsp1-recap" style="display: none">You agreed to install the default theme. You will have a basic html / css structure to help you create your interface.</p>
                                        <p class="mb-1 rsp2-recap" style="display: none">You have chosen not to install the default theme. The first display of your application will be a JSON.</p>

                                    </a>
                                </div>
                                <br>
                                <div class="bg-warning text-light padd-bg" style="padding-left: 20px">
                                    <p id="betastage">
                                        <span class="red-color">Warning</span> : This version is in beta stage. Please don't use it for your production projects
                                    </p>
                                </div>

                                <div class="bg-info text-light padd-bg" style="padding-left: 20px; padding-bottom: 15px">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="img-thumbnail img-logo-iumio-thumb" src="assets/logo_white.png"/>
                                        </div>

                                        <div class="col-md-10">
                                            <span class="red-color">iumio Installer is a property of iumio Components (iumio-team). Do not reproduce !</span>
                                            <br>
                                            <span>More info : <a class="alert-link" onclick="window.open('https://framework.iumio.com', '_blank')">Go to iumio Framework website</a></span>
                                        </div>

                                    </div>
                                </div>


                                <br>
                                <h5>Is this configuration correct for you?</h5>
                                <br>

                                <div class="row justify-content-center">
                                    <p class="lead"><a class="btn btn-danger btn-lg mt-2" href="#" id="cancelfinal" role="button">Cancel the installation</a></p>
                                    <p class="lead"><a class="btn btn-primary btn-lg mt-2 offset-2" href="#" id="create" role="button">Yes, I want to create my app</a></p>

                                </div>
                            </div>

                            <div class="jumbotron hidden" id="step7">
                                <h1 class="mb-4">Processing</h1>

                                <p class="lead">The installer is in the process of installing your application.</p>

                                <div class="content-middle">
                                    <h5> Installation : <strong><span id="appnamecreate"></span></strong></h5>
                                    <br>
                                    <div class="progress" style="background-color: #6eb4f9" >
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" id="prg-insta-iumio" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="jumbotron hidden" id="step8">
                                <h1 class="mb-4 text-success">Completed</h1>

                                <p class="lead">The installer has created your application successfully.</p>

                                <p>Your application is available at this url: <a id="furl" href="#"></a></p>

                                <div class="bg-info text-light padd-bg" style="padding-left: 20px; padding-bottom: 15px">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="img-thumbnail img-logo-iumio-thumb" src="assets/logo_white.png"/>
                                        </div>

                                        <div class="col-md-10">
                                            <span class="red-color">For more security, please remove the installer (entire "setup" folder)</span>
                                            <br>
                                            <span>More info : <a class="alert-link" onclick="window.open('https://framework.iumio.com', '_blank')">iumio Framework website</a></span>
                                        </div>

                                    </div>
                                </div>
                                <br>

                                <p class="lead"><a class="btn btn-primary btn-lg mt-2" href="#"  id="furl2" role="button">Go to index</a></p>
                            </div>

                            <div class="jumbotron hidden" id="step9">
                                <h1 class="mb-4 text-danger">An error has been generated</h1>

                                <p class="lead">The installer generated an error while installing your application.</p>

                                <p>You must restart the installation if you wish to try again.</p>

                                <p class="lead"><a class="btn btn-primary btn-lg mt-2" href="#" id="retryinstallation" role="button">Restart the installation</a></p>
                            </div>
                        </div>
                </div>
            </section>
        </main>
    </div>
</div>
</body>
</html>
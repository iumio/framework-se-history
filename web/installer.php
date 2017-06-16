<?php
/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

if (isset($_REQUEST["appname"], $_REQUEST["default"] , $_REQUEST["template"]) && $_REQUEST["appname"] != "" && $_REQUEST["default"] != "" && $_REQUEST["template"] != "")
    createAppProcess($_REQUEST["appname"], $_REQUEST["default"] , $_REQUEST["template"]);

/**
 * Processing to create app
 */

function createAppProcess($appname, $default, $temp)
{
    $base = __DIR__."/../";
    include_once $base."vendor/iumio_framework/php/Core/ServerManager/iumioServerManager.php";
    $temdirbase = $base."vendor/iumio_framework/php/Core/Additional/Manager/Module/AppManager/AppTemplate";
    $tempdir = ($temp == "0")? $temdirbase.'/notemplate/{appname}' : $temdirbase.'/template/{appname}';
    iumioFramework\Core\Additionnal\Server\iumioServerManager::copy($tempdir, $base."/apps/".$appname, 'directory');
    $napp = $base."/apps/".$appname;

    // APP
    $f = file_get_contents($napp."/{appname}.php.local");
    $str = str_replace("{appname}", $appname, $f);
    file_put_contents($napp."/{appname}.php.local", $str);
    rename($napp."/{appname}.php.local", $napp."/$appname.php");

    // RT
    $f = file_get_contents($napp."/Routing/default.rt");
    $str = str_replace("{appname}", $appname, $f);
    file_put_contents($napp."/Routing/default.rt", $str);

    // MASTER
    $f = file_get_contents($napp."/Master/DefaultMaster.php.local");
    $str = str_replace("{appname}", $appname, $f);
    file_put_contents($napp."/Master/DefaultMaster.php.local", $str);
    rename($napp."/Master/DefaultMaster.php.local", $napp."/Master/DefaultMaster.php");

    // REGISTER TO APP CORE
    $f = json_decode(file_get_contents($base."/elements/config_files/apps.json"));
    $lastapp = 0;

    if (!is_object($f))
        $f = new \stdClass();

    foreach ($f as $one => $val) $lastapp++;

    if ($default == "1")
    {
        foreach ($f as $one => $val)
        {
            if ($val->isdefault == "yes") {
                $val->update = new \DateTime('UTC');
                $val->isdefault = "no";
                break;
            }
        }
    }

    $f->$lastapp = new \stdClass();
    $f->$lastapp->name = $appname;
    $f->$lastapp->isdefault = ($default == "1")? "yes" : "no";
    $f->$lastapp->class = "\\".$appname."\\".$appname;
    $ndate = new \DateTime('UTC');
    $f->$lastapp->creation = $ndate;
    $f->$lastapp->update = $ndate;
    $f = json_encode($f, JSON_PRETTY_PRINT);
    file_put_contents($base."/elements/config_files/apps.json", $f);
    if ($temp == "1")
        iumioFramework\Core\Additionnal\Server\iumioServerManager::copy($base."/apps/".$appname."/Front/Resources/", $base."/web/components/apps/dev/".strtolower($appname), 'directory', true);

    initialJSON();
    exit("OK");
}

/**
 * Build initial.json
 */
function initialJSON()
{
    $base = __DIR__."/../";
    $f = json_decode(file_get_contents($base."/elements/config_files/initial.json"));
    if (empty($f))
    {
        $std = new \stdClass();
        $std->installation = new \DateTime();
        $std->version = "0.2.3";
        $std->user = get_current_user();
        $std->location = realpath($base);
        $std->os = PHP_OS;

        $rs = json_encode($std, JSON_PRETTY_PRINT);
        file_put_contents($base."/elements/config_files/initial.json", $rs);
    }
}

?>

<!DOCTYPE html>
<html class=''>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">

    <style >


        .container{
            width: 100%;
            position: relative;
            overflow:hidden;
        }

        a {
            text-decoration:none;
        }


        .sp-container {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: -webkit-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
            background: -moz-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
            background: -ms-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
            background: radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
        }
        .sp-content {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0px;
            top: 0px;
            z-index: 1000;
        }
        .sp-container h2 {
            position: absolute;
            top: 50%;
            line-height: 100px;
            height: 90px;
            margin-top: -50px;
            font-size: 90px;
            width: 100%;
            text-align: center;
            color: transparent;
            -webkit-animation: blurFadeInOut 2s ease-in backwards;
            -moz-animation: blurFadeInOut 2s ease-in backwards;
            -ms-animation: blurFadeInOut 2s ease-in backwards;
            animation: blurFadeInOut 2s ease-in backwards;
        }


        .alterh2 {
            position: absolute;
            top: 40%;
            line-height: 100px;
            height: 90px;
            margin-top: -50px;
            font-size: 90px;
            width: 100%;
            text-align: center;
            color: rgba(0, 0, 0, 0.77)!important;
            -webkit-animation: blurFadeInOut 10s ease-in backwards;

        }

        .licence
        {
            overflow: scroll;
            height: 300px;
            color: #131313;
            font-size: 20px;
            border-radius: 15px;
            margin: auto;
            width: 100%;
            border: 2px solid white;
            padding: 25px 25px 25px 25px;
        }

        #displaying, .block
        {
            margin: auto;
            width: 50%;

        }

        #displaying {
            display: block;
            position: relative;
            top: 40%;
            transform: translateY(-50%);
            left: 0%;
            right: 0%;
        }

        .block {
            display: block;
            position: relative;
            top: 40%;
            transform: translateY(-50%);
            left: 0%;
            right: 0%;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-right: 16px solid green;
            border-bottom: 16px solid red;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


        .alter3 {
            color: rgba(0, 0, 0, 0.77)!important;
        }

        .sp-container h2.frame-1 {
            -webkit-animation-delay: 0s;
            -moz-animation-delay: 0s;
            -ms-animation-delay: 0s;
            animation-delay: 0s;
        }

        button
        {
            padding: 0px 30px;
            border: none;
            border-radius: 3px;
            font-size: 17px;
            font-weight: 400;
            white-space: normal;
            letter-spacing: 0;
            text-transform: uppercase;
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }

        .anim
        {
            -webkit-animation: blurFadeIn 1s linear 0.2s backwards;
            -moz-animation: blurFadeIn 1s linear 0.2s backwards;
            -ms-animation: blurFadeIn 1s linear 0.2s backwards;
            animation: blurFadeIn 1s linear 0.2s backwards;
        }


        .sp-globe {
            position: absolute;
            width: 282px;
            height: 273px;
            left: 50%;
            top: 50%;
            margin: -137px 0 0 -141px;
            background: transparent no-repeat top left;
            -webkit-animation: fadeInBack 3.6s linear 14s backwards;
            -moz-animation: fadeInBack 3.6s linear 14s backwards;
            -ms-animation: fadeInBack 3.6s linear 14s backwards;
            animation: fadeInBack 3.6s linear 14s backwards;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
            filter: alpha(opacity=30);
            opacity: 0.3;
            -webkit-transform: scale(5);
            -moz-transform: scale(5);
            -o-transform: scale(5);
            -ms-transform: scale(5);
            transform: scale(5);
        }

        button
        {
            cursor: pointer;
        }
        .sp-circle-link {
            position: absolute;
            left: 46%;
            bottom: 400px;
            margin-left: -50px;
            text-align: center;
            line-height: 100px;
            width: 200px;
            height: 100px;
            background-color: rgba(93, 93, 93, 0.58);
            font-size: 25px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 0%;
            color: white;
            -webkit-animation: fadeInRotate 1s linear 2s backwards;
            -moz-animation: fadeInRotate 1s linear 2s backwards;
            -ms-animation: fadeInRotate 1s linear 2s backwards;
            animation: fadeInRotate 1s linear 2s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);

            padding: 0px 30px;
            border: none;
            border-radius: 3px;
            font-size: 17px;
            font-weight: 400;
            white-space: normal;
            letter-spacing: 0;
            text-transform: uppercase;
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }
        .sp-circle-link:hover {
            background: #85373b;
            color: #fff;
        }

        .link:hover
        {
            cursor: pointer;
            text-decoration: underline;
        }

        .appname
        {
            width: 50%;
            height: 40px;
            font-weight: 700;
            font-size: 20px;
            border-radius: 5px;
            padding-left: 23px;
            background: rgba(39, 37, 37, 0.5);
            color: white;
        }
        /**/
        @-webkit-keyframes blurFadeInOut{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                -webkit-transform: scale(1.3);
            }
            20%,75%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                -webkit-transform: scale(1);
            }
            100%{
                opacity: 0;
                text-shadow: 0px 0px 50px #fff;
                -webkit-transform: scale(0);
            }
        }
        @-webkit-keyframes blurFadeIn{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                -webkit-transform: scale(1.3);
            }
            50%{
                opacity: 0.5;
                text-shadow: 0px 0px 10px #fff;
                -webkit-transform: scale(1.1);
            }
            100%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                -webkit-transform: scale(1);
            }
        }
        @-webkit-keyframes fadeInBack{
            0%{
                opacity: 0;
                -webkit-transform: scale(0);
            }
            50%{
                opacity: 0.4;
                -webkit-transform: scale(2);
            }
            100%{
                opacity: 0.2;
                -webkit-transform: scale(5);
            }
        }
        @-webkit-keyframes fadeInRotate{
            0%{
                opacity: 0;
                -webkit-transform: scale(0) rotate(360deg);
            }
            100%{
                opacity: 1;
                -webkit-transform: scale(1) rotate(0deg);
            }
        }

        @-moz-keyframes blurFadeInOut{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                -moz-transform: scale(1.3);
            }
            20%,75%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                -moz-transform: scale(1);
            }
            100%{
                opacity: 0;
                text-shadow: 0px 0px 50px #fff;
                -moz-transform: scale(0);
            }
        }
        @-moz-keyframes blurFadeIn{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                -moz-transform: scale(1.3);
            }
            100%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                -moz-transform: scale(1);
            }
        }
        @-moz-keyframes fadeInBack{
            0%{
                opacity: 0;
                -moz-transform: scale(0);
            }
            50%{
                opacity: 0.4;
                -moz-transform: scale(2);
            }
            100%{
                opacity: 0.2;
                -moz-transform: scale(5);
            }
        }
        @-moz-keyframes fadeInRotate{
            0%{
                opacity: 0;
                -moz-transform: scale(0) rotate(360deg);
            }
            100%{
                opacity: 1;
                -moz-transform: scale(1) rotate(0deg);
            }
        }

        @keyframes blurFadeInOut{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                transform: scale(1.3);
            }
            20%,75%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                transform: scale(1);
            }
            100%{
                opacity: 0;
                text-shadow: 0px 0px 50px #fff;
                transform: scale(0);
            }
        }
        @keyframes blurFadeIn{
            0%{
                opacity: 0;
                text-shadow: 0px 0px 40px #fff;
                transform: scale(1.3);
            }
            50%{
                opacity: 0.5;
                text-shadow: 0px 0px 10px #fff;
                transform: scale(1.1);
            }
            100%{
                opacity: 1;
                text-shadow: 0px 0px 1px #fff;
                transform: scale(1);
            }
        }
        @keyframes fadeInBack{
            0%{
                opacity: 0;
                transform: scale(0);
            }
            50%{
                opacity: 0.4;
                transform: scale(2);
            }
            100%{
                opacity: 0.2;
                transform: scale(5);
            }
        }

        .mbutton
        {
            text-align: center;
            /* line-height: 10px; */
            width: 280px;
            height: 100px;
            background-color: rgba(93, 93, 93, 0.58);
            font-size: 19px!important;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 0%;
            color: white;
            -webkit-animation: fadeInRotate 1s linear 2s backwards;
            -moz-animation: fadeInRotate 1s linear 2s backwards;
            -ms-animation: fadeInRotate 1s linear 2s backwards;
            animation: fadeInRotate 1s linear 2s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);
            padding: 0px 30px;
            border: none;
            border-radius: 3px;
            font-size: 17px;
            font-weight: 400;
            white-space: normal;
            letter-spacing: 0;
            text-transform: uppercase;
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }

        .mbutton:hover
        {
            cursor: pointer;
        }


        #fountainG{
            position:relative;
            width:234px;
            height:28px;
            margin:auto;
        }

        .fountainG{
            position:absolute;
            top:0;
            background-color:rgb(0,0,0);
            width:28px;
            height:28px;
            animation-name:bounce_fountainG;
            -o-animation-name:bounce_fountainG;
            -ms-animation-name:bounce_fountainG;
            -webkit-animation-name:bounce_fountainG;
            -moz-animation-name:bounce_fountainG;
            animation-duration:1.5s;
            -o-animation-duration:1.5s;
            -ms-animation-duration:1.5s;
            -webkit-animation-duration:1.5s;
            -moz-animation-duration:1.5s;
            animation-iteration-count:infinite;
            -o-animation-iteration-count:infinite;
            -ms-animation-iteration-count:infinite;
            -webkit-animation-iteration-count:infinite;
            -moz-animation-iteration-count:infinite;
            animation-direction:normal;
            -o-animation-direction:normal;
            -ms-animation-direction:normal;
            -webkit-animation-direction:normal;
            -moz-animation-direction:normal;
            transform:scale(.3);
            -o-transform:scale(.3);
            -ms-transform:scale(.3);
            -webkit-transform:scale(.3);
            -moz-transform:scale(.3);
            border-radius:19px;
            -o-border-radius:19px;
            -ms-border-radius:19px;
            -webkit-border-radius:19px;
            -moz-border-radius:19px;
        }

        #fountainG_1{
            left:0;
            animation-delay:0.6s;
            -o-animation-delay:0.6s;
            -ms-animation-delay:0.6s;
            -webkit-animation-delay:0.6s;
            -moz-animation-delay:0.6s;
        }

        #fountainG_2{
            left:29px;
            animation-delay:0.75s;
            -o-animation-delay:0.75s;
            -ms-animation-delay:0.75s;
            -webkit-animation-delay:0.75s;
            -moz-animation-delay:0.75s;
        }

        #fountainG_3{
            left:58px;
            animation-delay:0.9s;
            -o-animation-delay:0.9s;
            -ms-animation-delay:0.9s;
            -webkit-animation-delay:0.9s;
            -moz-animation-delay:0.9s;
        }

        #fountainG_4{
            left:88px;
            animation-delay:1.05s;
            -o-animation-delay:1.05s;
            -ms-animation-delay:1.05s;
            -webkit-animation-delay:1.05s;
            -moz-animation-delay:1.05s;
        }

        #fountainG_5{
            left:117px;
            animation-delay:1.2s;
            -o-animation-delay:1.2s;
            -ms-animation-delay:1.2s;
            -webkit-animation-delay:1.2s;
            -moz-animation-delay:1.2s;
        }

        #fountainG_6{
            left:146px;
            animation-delay:1.35s;
            -o-animation-delay:1.35s;
            -ms-animation-delay:1.35s;
            -webkit-animation-delay:1.35s;
            -moz-animation-delay:1.35s;
        }

        #fountainG_7{
            left:175px;
            animation-delay:1.5s;
            -o-animation-delay:1.5s;
            -ms-animation-delay:1.5s;
            -webkit-animation-delay:1.5s;
            -moz-animation-delay:1.5s;
        }

        #fountainG_8{
            left:205px;
            animation-delay:1.64s;
            -o-animation-delay:1.64s;
            -ms-animation-delay:1.64s;
            -webkit-animation-delay:1.64s;
            -moz-animation-delay:1.64s;
        }



        @keyframes bounce_fountainG{
            0%{
                transform:scale(1);
                background-color:rgb(0,0,0);
            }

            100%{
                transform:scale(.3);
                background-color:rgb(255,255,255);
            }
        }

        @-o-keyframes bounce_fountainG{
            0%{
                -o-transform:scale(1);
                background-color:rgb(0,0,0);
            }

            100%{
                -o-transform:scale(.3);
                background-color:rgb(255,255,255);
            }
        }

        @-ms-keyframes bounce_fountainG{
            0%{
                -ms-transform:scale(1);
                background-color:rgb(0,0,0);
            }

            100%{
                -ms-transform:scale(.3);
                background-color:rgb(255,255,255);
            }
        }

        @-webkit-keyframes bounce_fountainG{
            0%{
                -webkit-transform:scale(1);
                background-color:rgb(0,0,0);
            }

            100%{
                -webkit-transform:scale(.3);
                background-color:rgb(255,255,255);
            }
        }

        @-moz-keyframes bounce_fountainG{
            0%{
                -moz-transform:scale(1);
                background-color:rgb(0,0,0);
            }

            100%{
                -moz-transform:scale(.3);
                background-color:rgb(255,255,255);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="clr"></div>
    </div>
    <div class="sp-container">
        <div class="sp-content">
            <div class="sp-globe"></div>
            <img id="iumiomg" src="components/libs/iumio_framework/img/logo_white.png" width="10%">
            <h2 class="frame-1" id="frame1">iumio Framework SE </h2>

            <h3 class="alterh2" id="textd" style="font-size: 55px;">iumio Framework SE <em>Installer</em> <br> <span style="font-size: 25px">Configure your future app now </span>
                <br>
                <button class="mbutton" id="clicked" type="button">Start to configure</button>
            </h3>

            <div id="displaying" class="" style="display: none">
                <h3 style="text-align: center; font-size: 30px">iumio Framework Licence</h3>
                <p id="errorlicence" style="display: none;text-align: center;font-size: 20px; color: #761c19;">Please check "I agree and accept licence terms and conditions" to continue app installation.</p>
                <div class="licence">
                    <h3 style="text-align: center;">MIT License</h3>
                    <p style="text-align: center;">Version 3, 29 June 2007</p>

                    <p>Copyright (c) 2017 RAFINA DANY
                        &lt;<a href="https://framework.iumio.com/">https://framework.iumio.com/</a>&gt;</p><p>
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
                <br>
                <div style="text-align: center; font-size: 20px; color: white"><input type="checkbox" id="cterms" style="width: 30px;"><span>I agree and accept licence terms and conditions.</span></div>
                <br>
                <br>
                <div style="text-align: center"><button id="decline">Decline</button> <button id="accept">Accept</button></div>

            </div>
            <div class=" block" id="step3" style="display: none;color: white;color: black">
                <h3 style="font-size: 30px;text-decoration: underline">Informations : </h3>
                <div style="padding-left: 10px">
                    <h3>Framework version : 0.2.3 in Beta stage</h3>
                    <h3>Framework Edition : Standard Edition</h3>
                    <h3>Compatiblility : PHP 7 and later</h3>
                    <h3><span style="font-size: 22px;color: darkred;font-weight: 800 ">Warning</span> : This version is in beta stage. Please don't use it for your production projects </h3>
                    <h3>More info : <a class="link" style="color: #1b6d85" onclick="window.open('https://framework.iumio.com', '_blank')">iumio Framework website</a></h3>
                <h3 style="color: red">iumio Installer is a property of iumio Framework. Do not reproduce!</h3>
                </div>
                <br>
                <br>
                <div style="text-align: center"><button id="continue">Continue</button></div>


            </div>

            <div class=" block" id="step4" style="display: none;color: white;color:black">
                <h3 style="font-size: 40px;text-align: center">Tell me your app name : </h3>
                <h4 style="font-size: 20px;text-align: center;color: darkred;display: none" id="error1">Your app name is incorrect</h4>
                <h3 style="font-size: 20px;text-align: center;"><em>Your app name must to end with "App" keyword (example TestApp) </em></h3>
                <div style="padding-left: 0px;text-align: center">
                    <input class="appname" type="text" id="appname" >
                </div>
                <br>
                <br>
                <div style="text-align: center"><button id="continue2">Continue</button></div>


            </div>

            <div class=" block" id="step5" style="display: none;color: white;color:black">
                <h3 style="font-size: 40px;text-align: center">Would you like to have a default template ?</h3>
                <h3 style="font-size: 20px;text-align: center;"><em>iumio purpose you a default template with your app</em></h3>
                <br>
                <br>
                <div style="text-align: center"><button id="no3">No</button> <button id="yes3">Yes</button></div>
            </div>

            <div class="block" id="step6" style="display: none;color: white;text-align: center;color:black">
                <h3 style="font-size: 40px;text-decoration: underline;">Recapitulation : </h3>
                <div style="font-size: 25px">
                    <h3>App name : <span id="appnamers"></span></h3>
                    <h3>Default App : Yes</h3>
                    <h3>Template : <span id="templaters"></span></h3>
                </div>
                <br>
                <br>
                <div style="text-align: center"><button id="cancelfinal">Cancel</button> <button id="create">Create your app</button></div>
            </div>

            <div class="block" id="step7" style="display: none;color: white;text-align: center;color: black">
                <h3 style="font-size: 30px;">Processing ... </h3>
               <br>
                <div id="fountainG">
                    <div id="fountainG_1" class="fountainG"></div>
                    <div id="fountainG_2" class="fountainG"></div>
                    <div id="fountainG_3" class="fountainG"></div>
                    <div id="fountainG_4" class="fountainG"></div>
                    <div id="fountainG_5" class="fountainG"></div>
                    <div id="fountainG_6" class="fountainG"></div>
                    <div id="fountainG_7" class="fountainG"></div>
                    <div id="fountainG_8" class="fountainG"></div>
                </div>
            </div>

            <div class="block" id="step8" style="display: none;color: white;text-align: center;color:black">
                <h3 style="font-size: 40px;">Your app was created.</h3>
                <h3 style="font-size: 30px;text-align: center;">Your application is available at : <a id="furl"></a><br><em>Now you must to remove installer.php file</em><br> Redirect to /index in 5 seconds</h3>
            </div>

            <div class="block" id="step9" style="display: none;color: darkred!important;text-align: center;color:black">
                <h3 style="font-size: 40px;">An error was detected.</h3>
                <h3 style="font-size: 30px;text-align: center;"><em>Please retry to create an app</em></h3>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    window.onload = function () {
        document.getElementById("furl").href = (getBaseUrl()[0])+"Dev.php/index";

        document.getElementById("furl").innerHTML = (getBaseUrl()[0])+"Dev.php/index";

    }

    function getBaseUrl() {
        var re = new RegExp(/^.*\//);
        return re.exec(window.location.href);
    }

    function isValid(str){
        return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
    }

    function redirect() {
        setTimeout(function () {
         location.href= (getBaseUrl()[0])+"Dev.php/index";
         }, 5000);
    }


    var appinfo = [];
    window.setTimeout(function () {
        document.getElementById("textd").className += " alter3";
    }, 8000);
    document.getElementById("clicked").addEventListener("click", function () {
        document.getElementById("clicked").style.display = "none";
        document.getElementById("textd").style.display = "none";
        document.getElementById("displaying").style.display = "block";
        document.getElementById("frame1").remove();
        document.getElementsByClassName("sp-globe")[0].remove();

    })

    document.getElementById("decline").addEventListener("click", function () {
        location.reload();
    });
    document.getElementById("accept").addEventListener("click", function () {
        var check = document.querySelector("#cterms:checked");
        if (check === null)
        {
            document.getElementById("errorlicence").style.display = "block";
            return ;
        }
        document.getElementById("displaying").style.display = "none";
        document.getElementById("step3").style.display = "block";
    })

    document.getElementById("no3").addEventListener("click", function () {
        appinfo[1] = 1;
        appinfo[2] = 0;
        document.getElementById("appnamers").innerHTML = appinfo[0];
        document.getElementById("templaters").innerHTML = (appinfo[2] === 0)? "No" : "Yes";
        document.getElementById("step5").style.display = "none";
        document.getElementById("step6").style.display = "block";
    })

    document.getElementById("yes3").addEventListener("click", function () {
        appinfo[1] = 1;
        appinfo[2] = 1;
        document.getElementById("appnamers").innerHTML = appinfo[0];
        document.getElementById("templaters").innerHTML = (appinfo[2] === 0)? "No" : "Yes";
        document.getElementById("step5").style.display = "none";
        document.getElementById("step6").style.display = "block";
    });

    document.getElementById("continue").addEventListener("click", function () {
        document.getElementById("step3").style.display = "none";
        document.getElementById("step4").style.display = "block";
    })

    document.getElementById("cancelfinal").addEventListener("click", function () {
        location.reload();
    });

    document.getElementById("create").addEventListener("click", function () {
        document.getElementById("step6").style.display = "none";
        document.getElementById("step7").style.display = "block";
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "installer.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var sender = "appname="+appinfo[0]+"&default="+String(appinfo[1])+"&template="+String(appinfo[2]);
        xhttp.onreadystatechange = function() {
            document.getElementById("step7").style.display = "none";
            if (this.readyState === 4 && this.status === 200 && this.responseText === "OK")
            {
                document.getElementById("step9").style.display = "none";
                document.getElementById("step8").style.display = "block";
                redirect();
            }
            else
            {
                document.getElementById("step8").style.display = "none";
                document.getElementById("step9").style.display = "block";
            }
        };
        window.setTimeout(function () {
            xhttp.send(sender);
        }, 4000);
    });

    document.getElementById("continue2").addEventListener("click", function () {
        var appname = document.getElementById("appname").value;
        if (appname === "App" || appname.length <= 3 ||  !isValid(appname))
            document.getElementById("error1").style.display = "block";
        else if (appname.length <= 3 )
            document.getElementById("error1").style.display = "block";
        else
        {

            var p2 = appname[appname.length - 1];
            var p1 = appname[appname.length - 2];
            var a = appname[appname.length - 3];
            var conca = a+p1+p2;


            if (conca === "App" && isValid(appname))
            {
                appinfo[0] = appname.charAt(0).toUpperCase() + appname.slice(1);
                document.getElementById("step4").style.display = "none";
                document.getElementById("step5").style.display = "block";
            }
            else
                document.getElementById("error1").style.display = "block";

        }

    });
</script>
</body></html>

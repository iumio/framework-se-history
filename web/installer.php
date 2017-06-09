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
        $std->version = "0.1.9";
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
                    <h3 style="text-align: center;">GNU GENERAL PUBLIC LICENSE</h3>
                    <p style="text-align: center;">Version 3, 29 June 2007</p>

                    <p>Copyright &copy; 2007 Free Software Foundation, Inc.
                        &lt;<a href="http://fsf.org/">http://fsf.org/</a>&gt;</p><p>
                        Everyone is permitted to copy and distribute verbatim copies
                        of this license document, but changing it is not allowed.</p>

                    <h3><a name="preamble"></a>Preamble</h3>

                    <p>The GNU General Public License is a free, copyleft license for
                        software and other kinds of works.</p>

                    <p>The licenses for most software and other practical works are designed
                        to take away your freedom to share and change the works.  By contrast,
                        the GNU General Public License is intended to guarantee your freedom to
                        share and change all versions of a program--to make sure it remains free
                        software for all its users.  We, the Free Software Foundation, use the
                        GNU General Public License for most of our software; it applies also to
                        any other work released this way by its authors.  You can apply it to
                        your programs, too.</p>

                    <p>When we speak of free software, we are referring to freedom, not
                        price.  Our General Public Licenses are designed to make sure that you
                        have the freedom to distribute copies of free software (and charge for
                        them if you wish), that you receive source code or can get it if you
                        want it, that you can change the software or use pieces of it in new
                        free programs, and that you know you can do these things.</p>

                    <p>To protect your rights, we need to prevent others from denying you
                        these rights or asking you to surrender the rights.  Therefore, you have
                        certain responsibilities if you distribute copies of the software, or if
                        you modify it: responsibilities to respect the freedom of others.</p>

                    <p>For example, if you distribute copies of such a program, whether
                        gratis or for a fee, you must pass on to the recipients the same
                        freedoms that you received.  You must make sure that they, too, receive
                        or can get the source code.  And you must show them these terms so they
                        know their rights.</p>

                    <p>Developers that use the GNU GPL protect your rights with two steps:
                        (1) assert copyright on the software, and (2) offer you this License
                        giving you legal permission to copy, distribute and/or modify it.</p>

                    <p>For the developers' and authors' protection, the GPL clearly explains
                        that there is no warranty for this free software.  For both users' and
                        authors' sake, the GPL requires that modified versions be marked as
                        changed, so that their problems will not be attributed erroneously to
                        authors of previous versions.</p>

                    <p>Some devices are designed to deny users access to install or run
                        modified versions of the software inside them, although the manufacturer
                        can do so.  This is fundamentally incompatible with the aim of
                        protecting users' freedom to change the software.  The systematic
                        pattern of such abuse occurs in the area of products for individuals to
                        use, which is precisely where it is most unacceptable.  Therefore, we
                        have designed this version of the GPL to prohibit the practice for those
                        products.  If such problems arise substantially in other domains, we
                        stand ready to extend this provision to those domains in future versions
                        of the GPL, as needed to protect the freedom of users.</p>

                    <p>Finally, every program is threatened constantly by software patents.
                        States should not allow patents to restrict development and use of
                        software on general-purpose computers, but in those that do, we wish to
                        avoid the special danger that patents applied to a free program could
                        make it effectively proprietary.  To prevent this, the GPL assures that
                        patents cannot be used to render the program non-free.</p>

                    <p>The precise terms and conditions for copying, distribution and
                        modification follow.</p>

                    <h3><a name="terms"></a>TERMS AND CONDITIONS</h3>

                    <h4><a name="section0"></a>0. Definitions.</h4>

                    <p>&ldquo;This License&rdquo; refers to version 3 of the GNU General Public License.</p>

                    <p>&ldquo;Copyright&rdquo; also means copyright-like laws that apply to other kinds of
                        works, such as semiconductor masks.</p>

                    <p>&ldquo;The Program&rdquo; refers to any copyrightable work licensed under this
                        License.  Each licensee is addressed as &ldquo;you&rdquo;.  &ldquo;Licensees&rdquo; and
                        &ldquo;recipients&rdquo; may be individuals or organizations.</p>

                    <p>To &ldquo;modify&rdquo; a work means to copy from or adapt all or part of the work
                        in a fashion requiring copyright permission, other than the making of an
                        exact copy.  The resulting work is called a &ldquo;modified version&rdquo; of the
                        earlier work or a work &ldquo;based on&rdquo; the earlier work.</p>

                    <p>A &ldquo;covered work&rdquo; means either the unmodified Program or a work based
                        on the Program.</p>

                    <p>To &ldquo;propagate&rdquo; a work means to do anything with it that, without
                        permission, would make you directly or secondarily liable for
                        infringement under applicable copyright law, except executing it on a
                        computer or modifying a private copy.  Propagation includes copying,
                        distribution (with or without modification), making available to the
                        public, and in some countries other activities as well.</p>

                    <p>To &ldquo;convey&rdquo; a work means any kind of propagation that enables other
                        parties to make or receive copies.  Mere interaction with a user through
                        a computer network, with no transfer of a copy, is not conveying.</p>

                    <p>An interactive user interface displays &ldquo;Appropriate Legal Notices&rdquo;
                        to the extent that it includes a convenient and prominently visible
                        feature that (1) displays an appropriate copyright notice, and (2)
                        tells the user that there is no warranty for the work (except to the
                        extent that warranties are provided), that licensees may convey the
                        work under this License, and how to view a copy of this License.  If
                        the interface presents a list of user commands or options, such as a
                        menu, a prominent item in the list meets this criterion.</p>

                    <h4><a name="section1"></a>1. Source Code.</h4>

                    <p>The &ldquo;source code&rdquo; for a work means the preferred form of the work
                        for making modifications to it.  &ldquo;Object code&rdquo; means any non-source
                        form of a work.</p>

                    <p>A &ldquo;Standard Interface&rdquo; means an interface that either is an official
                        standard defined by a recognized standards body, or, in the case of
                        interfaces specified for a particular programming language, one that
                        is widely used among developers working in that language.</p>

                    <p>The &ldquo;System Libraries&rdquo; of an executable work include anything, other
                        than the work as a whole, that (a) is included in the normal form of
                        packaging a Major Component, but which is not part of that Major
                        Component, and (b) serves only to enable use of the work with that
                        Major Component, or to implement a Standard Interface for which an
                        implementation is available to the public in source code form.  A
                        &ldquo;Major Component&rdquo;, in this context, means a major essential component
                        (kernel, window system, and so on) of the specific operating system
                        (if any) on which the executable work runs, or a compiler used to
                        produce the work, or an object code interpreter used to run it.</p>

                    <p>The &ldquo;Corresponding Source&rdquo; for a work in object code form means all
                        the source code needed to generate, install, and (for an executable
                        work) run the object code and to modify the work, including scripts to
                        control those activities.  However, it does not include the work's
                        System Libraries, or general-purpose tools or generally available free
                        programs which are used unmodified in performing those activities but
                        which are not part of the work.  For example, Corresponding Source
                        includes interface definition files associated with source files for
                        the work, and the source code for shared libraries and dynamically
                        linked subprograms that the work is specifically designed to require,
                        such as by intimate data communication or control flow between those
                        subprograms and other parts of the work.</p>

                    <p>The Corresponding Source need not include anything that users
                        can regenerate automatically from other parts of the Corresponding
                        Source.</p>

                    <p>The Corresponding Source for a work in source code form is that
                        same work.</p>

                    <h4><a name="section2"></a>2. Basic Permissions.</h4>

                    <p>All rights granted under this License are granted for the term of
                        copyright on the Program, and are irrevocable provided the stated
                        conditions are met.  This License explicitly affirms your unlimited
                        permission to run the unmodified Program.  The output from running a
                        covered work is covered by this License only if the output, given its
                        content, constitutes a covered work.  This License acknowledges your
                        rights of fair use or other equivalent, as provided by copyright law.</p>

                    <p>You may make, run and propagate covered works that you do not
                        convey, without conditions so long as your license otherwise remains
                        in force.  You may convey covered works to others for the sole purpose
                        of having them make modifications exclusively for you, or provide you
                        with facilities for running those works, provided that you comply with
                        the terms of this License in conveying all material for which you do
                        not control copyright.  Those thus making or running the covered works
                        for you must do so exclusively on your behalf, under your direction
                        and control, on terms that prohibit them from making any copies of
                        your copyrighted material outside their relationship with you.</p>

                    <p>Conveying under any other circumstances is permitted solely under
                        the conditions stated below.  Sublicensing is not allowed; section 10
                        makes it unnecessary.</p>

                    <h4><a name="section3"></a>3. Protecting Users' Legal Rights From Anti-Circumvention Law.</h4>

                    <p>No covered work shall be deemed part of an effective technological
                        measure under any applicable law fulfilling obligations under article
                        11 of the WIPO copyright treaty adopted on 20 December 1996, or
                        similar laws prohibiting or restricting circumvention of such
                        measures.</p>

                    <p>When you convey a covered work, you waive any legal power to forbid
                        circumvention of technological measures to the extent such circumvention
                        is effected by exercising rights under this License with respect to
                        the covered work, and you disclaim any intention to limit operation or
                        modification of the work as a means of enforcing, against the work's
                        users, your or third parties' legal rights to forbid circumvention of
                        technological measures.</p>

                    <h4><a name="section4"></a>4. Conveying Verbatim Copies.</h4>

                    <p>You may convey verbatim copies of the Program's source code as you
                        receive it, in any medium, provided that you conspicuously and
                        appropriately publish on each copy an appropriate copyright notice;
                        keep intact all notices stating that this License and any
                        non-permissive terms added in accord with section 7 apply to the code;
                        keep intact all notices of the absence of any warranty; and give all
                        recipients a copy of this License along with the Program.</p>

                    <p>You may charge any price or no price for each copy that you convey,
                        and you may offer support or warranty protection for a fee.</p>

                    <h4><a name="section5"></a>5. Conveying Modified Source Versions.</h4>

                    <p>You may convey a work based on the Program, or the modifications to
                        produce it from the Program, in the form of source code under the
                        terms of section 4, provided that you also meet all of these conditions:</p>

                    <ul>
                        <li>a) The work must carry prominent notices stating that you modified
                            it, and giving a relevant date.</li>

                        <li>b) The work must carry prominent notices stating that it is
                            released under this License and any conditions added under section
                            7.  This requirement modifies the requirement in section 4 to
                            &ldquo;keep intact all notices&rdquo;.</li>

                        <li>c) You must license the entire work, as a whole, under this
                            License to anyone who comes into possession of a copy.  This
                            License will therefore apply, along with any applicable section 7
                            additional terms, to the whole of the work, and all its parts,
                            regardless of how they are packaged.  This License gives no
                            permission to license the work in any other way, but it does not
                            invalidate such permission if you have separately received it.</li>

                        <li>d) If the work has interactive user interfaces, each must display
                            Appropriate Legal Notices; however, if the Program has interactive
                            interfaces that do not display Appropriate Legal Notices, your
                            work need not make them do so.</li>
                    </ul>

                    <p>A compilation of a covered work with other separate and independent
                        works, which are not by their nature extensions of the covered work,
                        and which are not combined with it such as to form a larger program,
                        in or on a volume of a storage or distribution medium, is called an
                        &ldquo;aggregate&rdquo; if the compilation and its resulting copyright are not
                        used to limit the access or legal rights of the compilation's users
                        beyond what the individual works permit.  Inclusion of a covered work
                        in an aggregate does not cause this License to apply to the other
                        parts of the aggregate.</p>

                    <h4><a name="section6"></a>6. Conveying Non-Source Forms.</h4>

                    <p>You may convey a covered work in object code form under the terms
                        of sections 4 and 5, provided that you also convey the
                        machine-readable Corresponding Source under the terms of this License,
                        in one of these ways:</p>

                    <ul>
                        <li>a) Convey the object code in, or embodied in, a physical product
                            (including a physical distribution medium), accompanied by the
                            Corresponding Source fixed on a durable physical medium
                            customarily used for software interchange.</li>

                        <li>b) Convey the object code in, or embodied in, a physical product
                            (including a physical distribution medium), accompanied by a
                            written offer, valid for at least three years and valid for as
                            long as you offer spare parts or customer support for that product
                            model, to give anyone who possesses the object code either (1) a
                            copy of the Corresponding Source for all the software in the
                            product that is covered by this License, on a durable physical
                            medium customarily used for software interchange, for a price no
                            more than your reasonable cost of physically performing this
                            conveying of source, or (2) access to copy the
                            Corresponding Source from a network server at no charge.</li>

                        <li>c) Convey individual copies of the object code with a copy of the
                            written offer to provide the Corresponding Source.  This
                            alternative is allowed only occasionally and noncommercially, and
                            only if you received the object code with such an offer, in accord
                            with subsection 6b.</li>

                        <li>d) Convey the object code by offering access from a designated
                            place (gratis or for a charge), and offer equivalent access to the
                            Corresponding Source in the same way through the same place at no
                            further charge.  You need not require recipients to copy the
                            Corresponding Source along with the object code.  If the place to
                            copy the object code is a network server, the Corresponding Source
                            may be on a different server (operated by you or a third party)
                            that supports equivalent copying facilities, provided you maintain
                            clear directions next to the object code saying where to find the
                            Corresponding Source.  Regardless of what server hosts the
                            Corresponding Source, you remain obligated to ensure that it is
                            available for as long as needed to satisfy these requirements.</li>

                        <li>e) Convey the object code using peer-to-peer transmission, provided
                            you inform other peers where the object code and Corresponding
                            Source of the work are being offered to the general public at no
                            charge under subsection 6d.</li>
                    </ul>

                    <p>A separable portion of the object code, whose source code is excluded
                        from the Corresponding Source as a System Library, need not be
                        included in conveying the object code work.</p>

                    <p>A &ldquo;User Product&rdquo; is either (1) a &ldquo;consumer product&rdquo;, which means any
                        tangible personal property which is normally used for personal, family,
                        or household purposes, or (2) anything designed or sold for incorporation
                        into a dwelling.  In determining whether a product is a consumer product,
                        doubtful cases shall be resolved in favor of coverage.  For a particular
                        product received by a particular user, &ldquo;normally used&rdquo; refers to a
                        typical or common use of that class of product, regardless of the status
                        of the particular user or of the way in which the particular user
                        actually uses, or expects or is expected to use, the product.  A product
                        is a consumer product regardless of whether the product has substantial
                        commercial, industrial or non-consumer uses, unless such uses represent
                        the only significant mode of use of the product.</p>

                    <p>&ldquo;Installation Information&rdquo; for a User Product means any methods,
                        procedures, authorization keys, or other information required to install
                        and execute modified versions of a covered work in that User Product from
                        a modified version of its Corresponding Source.  The information must
                        suffice to ensure that the continued functioning of the modified object
                        code is in no case prevented or interfered with solely because
                        modification has been made.</p>

                    <p>If you convey an object code work under this section in, or with, or
                        specifically for use in, a User Product, and the conveying occurs as
                        part of a transaction in which the right of possession and use of the
                        User Product is transferred to the recipient in perpetuity or for a
                        fixed term (regardless of how the transaction is characterized), the
                        Corresponding Source conveyed under this section must be accompanied
                        by the Installation Information.  But this requirement does not apply
                        if neither you nor any third party retains the ability to install
                        modified object code on the User Product (for example, the work has
                        been installed in ROM).</p>

                    <p>The requirement to provide Installation Information does not include a
                        requirement to continue to provide support service, warranty, or updates
                        for a work that has been modified or installed by the recipient, or for
                        the User Product in which it has been modified or installed.  Access to a
                        network may be denied when the modification itself materially and
                        adversely affects the operation of the network or violates the rules and
                        protocols for communication across the network.</p>

                    <p>Corresponding Source conveyed, and Installation Information provided,
                        in accord with this section must be in a format that is publicly
                        documented (and with an implementation available to the public in
                        source code form), and must require no special password or key for
                        unpacking, reading or copying.</p>

                    <h4><a name="section7"></a>7. Additional Terms.</h4>

                    <p>&ldquo;Additional permissions&rdquo; are terms that supplement the terms of this
                        License by making exceptions from one or more of its conditions.
                        Additional permissions that are applicable to the entire Program shall
                        be treated as though they were included in this License, to the extent
                        that they are valid under applicable law.  If additional permissions
                        apply only to part of the Program, that part may be used separately
                        under those permissions, but the entire Program remains governed by
                        this License without regard to the additional permissions.</p>

                    <p>When you convey a copy of a covered work, you may at your option
                        remove any additional permissions from that copy, or from any part of
                        it.  (Additional permissions may be written to require their own
                        removal in certain cases when you modify the work.)  You may place
                        additional permissions on material, added by you to a covered work,
                        for which you have or can give appropriate copyright permission.</p>

                    <p>Notwithstanding any other provision of this License, for material you
                        add to a covered work, you may (if authorized by the copyright holders of
                        that material) supplement the terms of this License with terms:</p>

                    <ul>
                        <li>a) Disclaiming warranty or limiting liability differently from the
                            terms of sections 15 and 16 of this License; or</li>

                        <li>b) Requiring preservation of specified reasonable legal notices or
                            author attributions in that material or in the Appropriate Legal
                            Notices displayed by works containing it; or</li>

                        <li>c) Prohibiting misrepresentation of the origin of that material, or
                            requiring that modified versions of such material be marked in
                            reasonable ways as different from the original version; or</li>

                        <li>d) Limiting the use for publicity purposes of names of licensors or
                            authors of the material; or</li>

                        <li>e) Declining to grant rights under trademark law for use of some
                            trade names, trademarks, or service marks; or</li>

                        <li>f) Requiring indemnification of licensors and authors of that
                            material by anyone who conveys the material (or modified versions of
                            it) with contractual assumptions of liability to the recipient, for
                            any liability that these contractual assumptions directly impose on
                            those licensors and authors.</li>
                    </ul>

                    <p>All other non-permissive additional terms are considered &ldquo;further
                        restrictions&rdquo; within the meaning of section 10.  If the Program as you
                        received it, or any part of it, contains a notice stating that it is
                        governed by this License along with a term that is a further
                        restriction, you may remove that term.  If a license document contains
                        a further restriction but permits relicensing or conveying under this
                        License, you may add to a covered work material governed by the terms
                        of that license document, provided that the further restriction does
                        not survive such relicensing or conveying.</p>

                    <p>If you add terms to a covered work in accord with this section, you
                        must place, in the relevant source files, a statement of the
                        additional terms that apply to those files, or a notice indicating
                        where to find the applicable terms.</p>

                    <p>Additional terms, permissive or non-permissive, may be stated in the
                        form of a separately written license, or stated as exceptions;
                        the above requirements apply either way.</p>

                    <h4><a name="section8"></a>8. Termination.</h4>

                    <p>You may not propagate or modify a covered work except as expressly
                        provided under this License.  Any attempt otherwise to propagate or
                        modify it is void, and will automatically terminate your rights under
                        this License (including any patent licenses granted under the third
                        paragraph of section 11).</p>

                    <p>However, if you cease all violation of this License, then your
                        license from a particular copyright holder is reinstated (a)
                        provisionally, unless and until the copyright holder explicitly and
                        finally terminates your license, and (b) permanently, if the copyright
                        holder fails to notify you of the violation by some reasonable means
                        prior to 60 days after the cessation.</p>

                    <p>Moreover, your license from a particular copyright holder is
                        reinstated permanently if the copyright holder notifies you of the
                        violation by some reasonable means, this is the first time you have
                        received notice of violation of this License (for any work) from that
                        copyright holder, and you cure the violation prior to 30 days after
                        your receipt of the notice.</p>

                    <p>Termination of your rights under this section does not terminate the
                        licenses of parties who have received copies or rights from you under
                        this License.  If your rights have been terminated and not permanently
                        reinstated, you do not qualify to receive new licenses for the same
                        material under section 10.</p>

                    <h4><a name="section9"></a>9. Acceptance Not Required for Having Copies.</h4>

                    <p>You are not required to accept this License in order to receive or
                        run a copy of the Program.  Ancillary propagation of a covered work
                        occurring solely as a consequence of using peer-to-peer transmission
                        to receive a copy likewise does not require acceptance.  However,
                        nothing other than this License grants you permission to propagate or
                        modify any covered work.  These actions infringe copyright if you do
                        not accept this License.  Therefore, by modifying or propagating a
                        covered work, you indicate your acceptance of this License to do so.</p>

                    <h4><a name="section10"></a>10. Automatic Licensing of Downstream Recipients.</h4>

                    <p>Each time you convey a covered work, the recipient automatically
                        receives a license from the original licensors, to run, modify and
                        propagate that work, subject to this License.  You are not responsible
                        for enforcing compliance by third parties with this License.</p>

                    <p>An &ldquo;entity transaction&rdquo; is a transaction transferring control of an
                        organization, or substantially all assets of one, or subdividing an
                        organization, or merging organizations.  If propagation of a covered
                        work results from an entity transaction, each party to that
                        transaction who receives a copy of the work also receives whatever
                        licenses to the work the party's predecessor in interest had or could
                        give under the previous paragraph, plus a right to possession of the
                        Corresponding Source of the work from the predecessor in interest, if
                        the predecessor has it or can get it with reasonable efforts.</p>

                    <p>You may not impose any further restrictions on the exercise of the
                        rights granted or affirmed under this License.  For example, you may
                        not impose a license fee, royalty, or other charge for exercise of
                        rights granted under this License, and you may not initiate litigation
                        (including a cross-claim or counterclaim in a lawsuit) alleging that
                        any patent claim is infringed by making, using, selling, offering for
                        sale, or importing the Program or any portion of it.</p>

                    <h4><a name="section11"></a>11. Patents.</h4>

                    <p>A &ldquo;contributor&rdquo; is a copyright holder who authorizes use under this
                        License of the Program or a work on which the Program is based.  The
                        work thus licensed is called the contributor's &ldquo;contributor version&rdquo;.</p>

                    <p>A contributor's &ldquo;essential patent claims&rdquo; are all patent claims
                        owned or controlled by the contributor, whether already acquired or
                        hereafter acquired, that would be infringed by some manner, permitted
                        by this License, of making, using, or selling its contributor version,
                        but do not include claims that would be infringed only as a
                        consequence of further modification of the contributor version.  For
                        purposes of this definition, &ldquo;control&rdquo; includes the right to grant
                        patent sublicenses in a manner consistent with the requirements of
                        this License.</p>

                    <p>Each contributor grants you a non-exclusive, worldwide, royalty-free
                        patent license under the contributor's essential patent claims, to
                        make, use, sell, offer for sale, import and otherwise run, modify and
                        propagate the contents of its contributor version.</p>

                    <p>In the following three paragraphs, a &ldquo;patent license&rdquo; is any express
                        agreement or commitment, however denominated, not to enforce a patent
                        (such as an express permission to practice a patent or covenant not to
                        sue for patent infringement).  To &ldquo;grant&rdquo; such a patent license to a
                        party means to make such an agreement or commitment not to enforce a
                        patent against the party.</p>

                    <p>If you convey a covered work, knowingly relying on a patent license,
                        and the Corresponding Source of the work is not available for anyone
                        to copy, free of charge and under the terms of this License, through a
                        publicly available network server or other readily accessible means,
                        then you must either (1) cause the Corresponding Source to be so
                        available, or (2) arrange to deprive yourself of the benefit of the
                        patent license for this particular work, or (3) arrange, in a manner
                        consistent with the requirements of this License, to extend the patent
                        license to downstream recipients.  &ldquo;Knowingly relying&rdquo; means you have
                        actual knowledge that, but for the patent license, your conveying the
                        covered work in a country, or your recipient's use of the covered work
                        in a country, would infringe one or more identifiable patents in that
                        country that you have reason to believe are valid.</p>

                    <p>If, pursuant to or in connection with a single transaction or
                        arrangement, you convey, or propagate by procuring conveyance of, a
                        covered work, and grant a patent license to some of the parties
                        receiving the covered work authorizing them to use, propagate, modify
                        or convey a specific copy of the covered work, then the patent license
                        you grant is automatically extended to all recipients of the covered
                        work and works based on it.</p>

                    <p>A patent license is &ldquo;discriminatory&rdquo; if it does not include within
                        the scope of its coverage, prohibits the exercise of, or is
                        conditioned on the non-exercise of one or more of the rights that are
                        specifically granted under this License.  You may not convey a covered
                        work if you are a party to an arrangement with a third party that is
                        in the business of distributing software, under which you make payment
                        to the third party based on the extent of your activity of conveying
                        the work, and under which the third party grants, to any of the
                        parties who would receive the covered work from you, a discriminatory
                        patent license (a) in connection with copies of the covered work
                        conveyed by you (or copies made from those copies), or (b) primarily
                        for and in connection with specific products or compilations that
                        contain the covered work, unless you entered into that arrangement,
                        or that patent license was granted, prior to 28 March 2007.</p>

                    <p>Nothing in this License shall be construed as excluding or limiting
                        any implied license or other defenses to infringement that may
                        otherwise be available to you under applicable patent law.</p>

                    <h4><a name="section12"></a>12. No Surrender of Others' Freedom.</h4>

                    <p>If conditions are imposed on you (whether by court order, agreement or
                        otherwise) that contradict the conditions of this License, they do not
                        excuse you from the conditions of this License.  If you cannot convey a
                        covered work so as to satisfy simultaneously your obligations under this
                        License and any other pertinent obligations, then as a consequence you may
                        not convey it at all.  For example, if you agree to terms that obligate you
                        to collect a royalty for further conveying from those to whom you convey
                        the Program, the only way you could satisfy both those terms and this
                        License would be to refrain entirely from conveying the Program.</p>

                    <h4><a name="section13"></a>13. Use with the GNU Affero General Public License.</h4>

                    <p>Notwithstanding any other provision of this License, you have
                        permission to link or combine any covered work with a work licensed
                        under version 3 of the GNU Affero General Public License into a single
                        combined work, and to convey the resulting work.  The terms of this
                        License will continue to apply to the part which is the covered work,
                        but the special requirements of the GNU Affero General Public License,
                        section 13, concerning interaction through a network will apply to the
                        combination as such.</p>

                    <h4><a name="section14"></a>14. Revised Versions of this License.</h4>

                    <p>The Free Software Foundation may publish revised and/or new versions of
                        the GNU General Public License from time to time.  Such new versions will
                        be similar in spirit to the present version, but may differ in detail to
                        address new problems or concerns.</p>

                    <p>Each version is given a distinguishing version number.  If the
                        Program specifies that a certain numbered version of the GNU General
                        Public License &ldquo;or any later version&rdquo; applies to it, you have the
                        option of following the terms and conditions either of that numbered
                        version or of any later version published by the Free Software
                        Foundation.  If the Program does not specify a version number of the
                        GNU General Public License, you may choose any version ever published
                        by the Free Software Foundation.</p>

                    <p>If the Program specifies that a proxy can decide which future
                        versions of the GNU General Public License can be used, that proxy's
                        public statement of acceptance of a version permanently authorizes you
                        to choose that version for the Program.</p>

                    <p>Later license versions may give you additional or different
                        permissions.  However, no additional obligations are imposed on any
                        author or copyright holder as a result of your choosing to follow a
                        later version.</p>

                    <h4><a name="section15"></a>15. Disclaimer of Warranty.</h4>

                    <p>THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY
                        APPLICABLE LAW.  EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT
                        HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM &ldquo;AS IS&rdquo; WITHOUT WARRANTY
                        OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO,
                        THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
                        PURPOSE.  THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM
                        IS WITH YOU.  SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF
                        ALL NECESSARY SERVICING, REPAIR OR CORRECTION.</p>

                    <h4><a name="section16"></a>16. Limitation of Liability.</h4>

                    <p>IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
                        WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MODIFIES AND/OR CONVEYS
                        THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY
                        GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE
                        USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF
                        DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD
                        PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS),
                        EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF
                        SUCH DAMAGES.</p>

                    <h4><a name="section17"></a>17. Interpretation of Sections 15 and 16.</h4>

                    <p>If the disclaimer of warranty and limitation of liability provided
                        above cannot be given local legal effect according to their terms,
                        reviewing courts shall apply local law that most closely approximates
                        an absolute waiver of all civil liability in connection with the
                        Program, unless a warranty or assumption of liability accompanies a
                        copy of the Program in return for a fee.</p>

                    <p>END OF TERMS AND CONDITIONS</p>

                    <h3><a name="howto"></a>How to Apply These Terms to Your New Programs</h3>

                    <p>If you develop a new program, and you want it to be of the greatest
                        possible use to the public, the best way to achieve this is to make it
                        free software which everyone can redistribute and change under these terms.</p>

                    <p>To do so, attach the following notices to the program.  It is safest
                        to attach them to the start of each source file to most effectively
                        state the exclusion of warranty; and each file should have at least
                        the &ldquo;copyright&rdquo; line and a pointer to where the full notice is found.</p>

                    <pre>  iumio Framework, the next generation of PHP Frameworks </pre>
                    <pre>  Copyright (C) 2017  RAFINA DANY</pre>


    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see &lt;http://www.gnu.org/licenses/&gt;.
</pre>

                    <p>Also add information on how to contact you by electronic and paper mail.</p>

                    <p>If the program does terminal interaction, make it output a short
                        notice like this when it starts in an interactive mode:</p>

                    <pre>    iumio Framework  Copyright (C) 2017  RAFINA DANY
    This program comes with ABSOLUTELY NO WARRANTY; for details type `show w'.
    This is free software, and you are welcome to redistribute it
    under certain conditions; type `show c' for details.
</pre>

                    <p>The hypothetical commands `show w' and `show c' should show the appropriate
                        parts of the General Public License.  Of course, your program's commands
                        might be different; for a GUI interface, you would use an &ldquo;about box&rdquo;.</p>

                    <p>You should also get your employer (if you work as a programmer) or school,
                        if any, to sign a &ldquo;copyright disclaimer&rdquo; for the program, if necessary.
                        For more information on this, and how to apply and follow the GNU GPL, see
                        &lt;<a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>&gt;.</p>

                    <p>The GNU General Public License does not permit incorporating your program
                        into proprietary programs.  If your program is a subroutine library, you
                        may consider it more useful to permit linking proprietary applications with
                        the library.  If this is what you want to do, use the GNU Lesser General
                        Public License instead of this License.  But first, please read
                        &lt;<a href="http://www.gnu.org/philosophy/why-not-lgpl.html">http://www.gnu.org/philosophy/why-not-lgpl.html</a>&gt;.</p>

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
                    <h3>Framework version : 0.1.9.2 in Pre-Beta validation stage</h3>
                    <h3>Framework Edition : Standard Edition</h3>
                    <h3>Compatiblility : PHP 7 and later</h3>
                    <h3><span style="font-size: 22px;color: darkred;font-weight: 800 ">Warning</span> : This version is in Pre-beta stage. Please don't use it for your production projects </h3>
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
                <h3 style="font-size: 30px;text-align: center;">Your application is available at : <a href="//<?php echo $_SERVER['HTTP_HOST'].((isset($_SERVER['BASE']) && $_SERVER['BASE'] != "")? $_SERVER['BASE'] : "") ?>/Dev.php/index"><?php echo $_SERVER['HTTP_HOST'].((isset($_SERVER['BASE']) && $_SERVER['BASE'] != "")? $_SERVER['BASE'] : "")."/Dev.php/index" ?></a><br><em>Now you must to remove installer.php file</em><br> Redirect to /index in 10 seconds</h3>
            </div>

            <div class="block" id="step9" style="display: none;color: darkred!important;text-align: center;color:black">
                <h3 style="font-size: 40px;">An error was detected.</h3>
                <h3 style="font-size: 30px;text-align: center;"><em>Please retry to create an app</em></h3>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

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
         }, 10000);
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
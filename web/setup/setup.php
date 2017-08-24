
<?php
// EXIT IF DOES NOT HAVE ONE APP
if (!empty(json_decode(file_get_contents(__DIR__."/../../elements/config_files/initial.json"))))
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
    <title>iumio Installer BETA</title>
    <link rel="apple-touch-icon" sizes="180x180" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/manifest.json">
    <link rel="mask-icon" href="//<?= $_SERVER['HTTP_HOST'] ?>/components/libs/iumio_framework/assets/images/favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <style>


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

        sp-circle-link {
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

        .mbutton
        {
            text-align: center;
            /* line-height: 10px; */
            background-color: transparent;
            text-decoration: underline;
            -webkit-animation: blurFadeIn 1s linear 1s backwards;
            -moz-animation: blurFadeIn 1s linear 1s backwards;
            -ms-animation: blurFadeIn 1s linear 1s backwards;
            animation: blurFadeIn 1s linear 1s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);
            padding: 0px 30px;
            border: none;
            font-size: 17px;
            color: white;
            font-weight: 500;
            white-space: normal;
            letter-spacing: 0;
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }

        #textd
        {
            -webkit-animation: blurFadeIn 1s linear 1s backwards;
            -moz-animation: blurFadeIn 1s linear 1s backwards;
            -ms-animation: blurFadeIn 1s linear 1s backwards;
            animation: blurFadeIn 1s linear 1s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);
        }

        .error
        {
            color: rgba(216, 16, 16, 0.84);
            padding-left: 20px;
        }

        .mbutton:hover
        {
            cursor: pointer;
        }

        body {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b5bdc8+0,828c95+36,28343b+100;Grey+Black+3D */
            background: rgb(181,189,200); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(181,189,200,1) 0%, rgba(130,140,149,1) 36%, rgba(40,52,59,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b5bdc8', endColorstr='#28343b',GradientType=0 ); /* IE6-9 */
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            color: #fff;
            margin: 0px;
        }

        .page {
            margin: 0px 0
        }

        .page:after {
            content: "";
            display: table;
            clear: both;
        }

        .frame-1
        {
            border-bottom: 1px solid white;
            padding-bottom: 14px;
        }

        .licence
        {
            width: 50%;
            margin: auto;
            overflow: auto;
            height: 400px;
            overflow-y: visible;
            border-bottom: 1px solid white;
            padding-bottom: 10px;
        }

        .licence::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 7px;
        }
        .licence::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }
        .wrapper {
            margin: 0 auto;
            position: relative;
            width: 100%;
            min-height: 600px;
        }

        .content-wrapper {
            float: right;
            width: 100%;
        }

        .step-content
        {
            /*height: 100vh;*/
        }

        .content-middle
        {
            margin-top: 43vh;
            transform: translateY(-43%);
        }



        .content {
            margin-left: 320px;
            clear: both;
            overflow: auto;
            background: #1abc9c;
            background: rgba(26,188,156, 0.4);
            min-height: 100vh;
        }

        .sidebar {
            position: relative;
            width: 320px;
            margin-right: -320px;
            float: right;
            overflow: hidden;
            background: #2c3e50;
            background: rgba(44,62,80, 0.4);
            color: #eee;
            min-height: 100vh;
        }

        .hidden-step
        {
            display: none;
        }

        a{
            display: block;
            text-align:center;
            margin: 10px auto;
            width: 100%;
            color: #2c3e50;
        }

        .header
        {
            width: 100%;
        }

        .iumiomg
        {
            width: 150px;
        }

        .blkimgiumio
        {
            width:320px;
            height: 50px;
            padding-top: 5px;
            padding-bottom: 7px;
            border-bottom: 1px solid white;
        }

        .step-active:before
        {
            content: '\2192   ';
        }

        .step-active:after
        {
            content: ' \2190' ;
        }

        .step-valid:after
        {
            content: ' \221A';
        }

        @media only screen and (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .content {
                margin-left: 0;
            }
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


        button#accept, button#decline, button#retrys3, button#continues3, button#continues4, button#no5, button#yes5, button#cancelfinal, button#create, button#retryinstallation {
            width: 50%;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button#retrys3, button#continues3 {
            margin: auto;
        }

        button#accept, button#continues3, button#continues4, button#yes5, button#create {
            background-color: #3ece3e;
        }

        button#decline, button#retrys3, button#no5, button#cancelfinal, button#retryinstallation {
            background-color: #dc3a35;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        input[type=text] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        /* Custom Code Here */
        .check input {
            display: none;
        }

        .fa-check:before {
            content: "\221A";
        }
        .check input:checked + label .box {
            -webkit-animation: animOn 0.8s 1 forwards;
            animation: animOn 0.8s 1 forwards;
            background: rgba(0, 0, 0, 0.5);
        }
        .check input:checked + label .box i {
            -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
            -webkit-transition-duration: 250ms;
            transition-duration: 250ms;
            opacity: 1;
        }
        .check label {
            min-width: 100px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            min-height: 60px;
            cursor: pointer;
        }
        .check label .box {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            position: relative;
            width: 50px;
            height: 50px;
            -webkit-transition: background 300ms ease;
            transition: background 300ms ease;
        }
        .check label .box:hover {
            background: rgba(0, 0, 0, 0.5);
        }
        .check label .box i {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 20px;
            display: inline-block;
            opacity: 0;
            pointer-events: none;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-transition-delay: 200ms;
            transition-delay: 200ms;
            -webkit-transform: translate(-50%, -50%) scale(6);
            transform: translate(-50%, -50%) scale(6);
        }

        @-webkit-keyframes animOn {
            40% {
                height: 20px;
                width: 100px;
            }
            50% {
                height: 60px;
                width: 30px;
            }
            60% {
                height: 40px;
                width: 70px;
            }
            70% {
                height: 55px;
                width: 45px;
            }
            100% {
                height: 50px;
                width: 50px;
            }
        }

        @keyframes animOn {
            40% {
                height: 20px;
                width: 100px;
            }
            50% {
                height: 60px;
                width: 30px;
            }
            60% {
                height: 40px;
                width: 70px;
            }
            70% {
                height: 55px;
                width: 45px;
            }
            100% {
                height: 50px;
                width: 50px;
            }
        }

        .requirements-list
        {
            list-style: disc;
            text-align: left;
        }

        .requirements-list li
        {
            font-size: 20px;
        }

        .red-color
        {
            color: #dc3a35;
        }

        .yellow-color
        {
            color: #fff80e
        }

        .link
        {
            cursor: pointer;
            display: inline;
            padding-top: 10px;
        }

        #betastage
        {
            display: none;
            font-size: 18px;
            font-weight: 800;
        }

        .infoF
        {
            font-size: 17px!important;
            font-weight: 700!important;
        }


        #fountainG{
            position:relative;
            width:234px;
            height:28px;
            margin:auto;
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

        .components-word
        {
            font-weight: 900;
            font-size: 30px;
            margin-left: -110px;

            -webkit-animation: blurFadeIn 1s linear 1s backwards;
            -moz-animation: blurFadeIn 1s linear 1s backwards;
            -ms-animation: blurFadeIn 1s linear 1s backwards;
            animation: blurFadeIn 1s linear 1s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }

        #iumio-components
        {
            width: 50%;
            display: inline;

            -webkit-animation: blurFadeIn 1s linear 1s backwards;
            -moz-animation: blurFadeIn 1s linear 1s backwards;
            -ms-animation: blurFadeIn 1s linear 1s backwards;
            animation: blurFadeIn 1s linear 1s backwards;
            -webkit-transform: scale(1) rotate(0deg);
            -moz-transform: scale(1) rotate(0deg);
            -o-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
            transform: scale(1) rotate(0deg);
            -webkit-transition: background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            transition: box-shadow 0.2s cubic-bezier(0.4,0,1,1),background-color 0.2s cubic-bezier(0.4,0,0.2,1),-webkit-box-shadow 0.2s cubic-bezier(0.4,0,1,1);
            will-change: box-shadow,transform;
        }

    </style>
</head>
<body>

<div class="page">
    <div class="wrapper">
        <!--<div class="header"> <img id="iumiomg" src="../components/libs/iumio_framework/img/logo_white.png"></div>-->
        <div class="content-wrapper">
            <div class="content">
                <div id="step0" class="content-middle"><img id="iumio-components" src="../components/libs/iumio_framework/img/logo_white.png"> <span class="components-word">Components</span></div>
                <div id="step1" class="hidden-step">
                    <h2 class="frame-1">iumio installer <strong class="red-color">BETA</strong> - Welcome</h2>
                    <div class="step-content content-middle">
                        <h3 class="alterh2" id="textd" style="font-size: 40px;">Welcome on iumio Framework<br> <span style="font-size: 25px">A whole new world for you</span>
                            <br>
                            <button class="mbutton" id="clicked" type="button">Start the installation</button>
                        </h3>
                    </div>
                </div>
                <div id="step2" class="hidden-step">
                    <h2 class="frame-1">Licence</h2>

                    <div class="step-content">

                        <p id="errorlicence" style="display: none;text-align: center;font-size: 20px; color: rgb(212, 62, 57);">Please check "I agree and accept licence terms and conditions" to continue app installation.</p>
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
                        <br>
                        <span>I agree and accept licence terms and conditions.</span>
                        <br>
                        <br>
                        <div class="check">
                            <input id="check" type="checkbox" class="cterms"/>
                            <label for="check">
                                <div class="box"><i class="fa fa-check"></i></div>
                            </label>
                        </div>

                        <br>
                        <div style="text-align: center"><button id="decline">Decline</button> <button id="accept">Accept</button></div>

                    </div>
                </div>

                <div id="step3" class="hidden-step">
                    <h2 class="frame-1">Requirements</h2>

                    <h3>iumio installer check if your server and the framework are compatible</h3>
                    <br>
                    <div class="step-content">
                        <ul class="requirements-list">
                            <li class="phpversion">PHP Version : <span class="phpversionnum">...</span> <span class="isok"></span><div class="error hidden-step"></div> </li>
                            <li class="fversion">Framework Version : <span class="fversionnum">...</span> <span class="isok"></span><div class="error hidden-step"></div></li>
                            <li class="wr">Writable and readable directory : <span class="isok">...</span><div class="error hidden-step"></div></li>
                            <li class="libsr">Required librairies : <span class="isok">...</span><div class="error hidden-step"></div></li>
                            <li class="uidii">Getting UIDII from iumio Server (optionnal) : <span class="uidiishow">...</span> <span class="isok"></span><div class="error hidden-step"></div></li>
                        </ul>

                        <br>
                        <br>
                        <div style="text-align: center"><button id="retrys3" class="hidden-step" onclick="step3()">Retry</button> <button id="continues3" class="hidden-step" >Continue</button></div>


                    </div>
                </div>

                <div id="step4" class="hidden-step">
                    <h2 class="frame-1">App name</h2>

                    <h3>Tell me your app name</h3>
                    <br>
                    <div class="step-content">
                        <h3 style="font-size: 40px;text-align: center"></h3>
                        <h4 style="font-size: 20px;text-align: center;color: rgb(212, 62, 57);display: none" id="error1">Your app name is incorrect</h4>
                        <h3 style="font-size: 20px;text-align: center;"><em>Your app name must to end with "App" keyword (example TestApp) </em></h3>
                        <div style="padding-left: 0px;text-align: center">
                            <input class="appname" type="text" id="appname" placeholder="Application name">
                        </div>
                        <br>
                        <br>
                        <div style="text-align: center"><button id="continues4">Continue</button></div>

                    </div>
                </div>


                <div id="step5" class="hidden-step">
                    <h2 class="frame-1">Default template</h2>

                    <h3>Would you like to have a default template ?</h3>
                    <br>
                    <div class="step-content">
                        <h3 style="font-size: 40px;text-align: center"></h3>
                        <h3 style="font-size: 20px;text-align: center;"><em>iumio purpose you a default template with your app</em></h3>

                        <br>
                        <div style="text-align: center"><button id="no5">No</button> <button id="yes5">Yes</button></div>
                    </div>
                </div>

                <div id="step6" class="hidden-step">
                    <h2 class="frame-1">Recap</h2>

                    <h3>This is your application parameters</h3>
                    <br>
                    <div class="step-content">
                        <ul class="requirements-list">
                            <li>App name : <span id="appnamers"></span></li>
                            <li>Enabled : Yes</li>
                            <li>Default template : <span id="templaters"></span></li>
                            <li>
                                Installation for :
                                <ul class="requirements-list">
                                    <li>
                                        Framework version : <span id="recapfversion"></span> in <span id="currentstage"></span>
                                    </li>
                                    <li>
                                        Framework Edition : <span id="recapfedition"></span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <br>
                        <div>
                            <p id="betastage">
                                <span class="red-color">Warning</span> : This version is in beta stage. Please don't use it for your production projects
                            </p>
                            <p class="infoF">
                                <span class="red-color">iumio Installer is a property of iumio Framework. Do not reproduce!</span>
                                <br>
                                <br>
                                <span>More info : <a class="link yellow-color" onclick="window.open('https://framework.iumio.com', '_blank')">iumio Framework website</a></span>
                            </p>
                        </div>
                        <br>
                        <h3>Are you ok ?</h3>
                        <br>
                        <div style="text-align: center"><button id="cancelfinal">Cancel the installation</button> <button id="create">Create your app</button></div>
                    </div>
                </div>

                <div id="step7" class="hidden-step">
                    <h2 class="frame-1">Processing</h2>
                    <div class="content-middle">
                        <h3>Processing to create <strong><span id="appnamecreate"></span></strong></h3>
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
                </div>

                <div id="step8" class="hidden-step">
                    <h2 class="frame-1">End creation process</h2>
                    <div class="content-middle">
                        <h3 style="font-size: 25px;">Your app was created.</h3>
                        <h3 style="font-size: 20px;text-align: center;">Your application is available at : <a id="furl"></a><br><em>Now you must to remove setup/ directory</em><br> Redirect to /index in 5 seconds</h3>
                    </div>
                </div>

                <div id="step9" class="hidden-step">
                    <h2 class="frame-1">End creation process - Error</h2>
                    <div class="content-middle">
                        <h3 style="font-size: 25px;">An error was detected.</h3>
                        <h3 style="font-size: 25px;text-align: center;"><em>Please retry to create an app</em></h3>
                        <div style="text-align: center"><button id="retryinstallation">Retry the installation</button></div>
                    </div>
                </div>

            </div>


        </div>
        <div class="sidebar">
            <div class="blkimgiumio"><img  class="iumiomg" src="../components/libs/iumio_framework/img/logo_white.png"></div>
            <h2>Stage</h2>
            <p id="s1" class="step-active">Welcome</p>
            <p id="s2">Licence</p>
            <p id="s3">Requirements</p>
            <p id="s4">App name</p>
            <p id="s5">Default template</p>
            <p id="s6">Recap</p>
            <p id="s7">Processing</p>
            <p id="s8">End</p>

        </div>
    </div>
</div>
<script type="application/javascript">

    var rsp1, rsp2, rsp3, rsp4 = -1;
    var appinfo = [];
    var framework = [];

    /**
     *
     * Set url base
     *
     */
    window.onload = function () {
        document.getElementById("furl").href = (getBaseUrl())+"Dev.php/index";
        document.getElementById("furl").innerHTML = (getBaseUrl())+"Dev.php/index";
    }
    /**
     *
     * Set a splashscreen
     *
     */
    setTimeout(function () {
        document.getElementById("step0").style.display = "none";
        document.getElementById("step1").style.display = "block";
    }, 2500);

    /**
     * Step 1
     */
    document.getElementById("clicked").addEventListener("click", function () {
        document.getElementById("step1").style.display = "none";
        document.getElementById("s1").classList.remove("step-active");
        document.getElementById("s1").classList.add("step-valid");
        document.getElementById("s2").classList.add("step-active");
        document.getElementById("step2").style.display = "block";
    });

    /**
     * Step 3 - Continue to the next step
     */
    document.getElementById("continues3").addEventListener("click", function () {
        document.getElementById("step3").style.display = "none";
        document.getElementById("s3").classList.remove("step-active");
        document.getElementById("s3").classList.add("step-valid");
        document.getElementById("s4").classList.add("step-active");
        document.getElementById("step4").style.display = "block";
    });



    /**
     * Step 2 - decline - reload page
     */
    document.getElementById("decline").addEventListener("click", function () {
        location.reload();
    });

    /**
     * Step 2 - accept - verification
     */
    document.getElementById("accept").addEventListener("click", function () {
        var check = document.querySelector(".cterms:checked");
        if (check === null)
        {
            document.getElementById("errorlicence").style.display = "block";
            return ;
        }
        document.getElementById("step2").style.display = "none";
        document.getElementById("s2").classList.remove("step-active");
        document.getElementById("s2").classList.add("step-valid");
        document.getElementById("s3").classList.add("step-active");
        document.getElementById("step3").style.display = "block";
        step3();

    });

    /**
     * Step 4 - Check app name
     */
    document.getElementById("continues4").addEventListener("click", function () {
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
                document.getElementById("s4").classList.remove("step-active");
                document.getElementById("s4").classList.add("step-valid");
                document.getElementById("s5").classList.add("step-active");
                document.getElementById("step5").style.display = "block";
            }
            else
                document.getElementById("error1").style.display = "block";

        }

    });

    /**
     * Step 5 - Accept default template
     */
    document.getElementById("no5").addEventListener("click", function () {
        appinfo[1] = 1;
        appinfo[2] = 0;
        document.getElementById("appnamers").innerHTML = appinfo[0];
        document.getElementById("templaters").innerHTML = (appinfo[2] === 0)? "No" : "Yes";
        document.getElementById("step5").style.display = "none";
        document.getElementById("s5").classList.remove("step-active");
        document.getElementById("s5").classList.add("step-valid");
        document.getElementById("s6").classList.add("step-active");
        document.getElementById("step6").style.display = "block";
        setRecapGlobal();
    });

    /**
     * Step 5 - Decline default template
     */
    document.getElementById("yes5").addEventListener("click", function () {
        appinfo[1] = 1;
        appinfo[2] = 1;
        document.getElementById("appnamers").innerHTML = appinfo[0];
        document.getElementById("templaters").innerHTML = (appinfo[2] === 0)? "No" : "Yes";
        document.getElementById("step5").style.display = "none";
        document.getElementById("s5").classList.remove("step-active");
        document.getElementById("s5").classList.add("step-valid");
        document.getElementById("s6").classList.add("step-active");
        document.getElementById("step6").style.display = "block";
        setRecapGlobal();
    });

    /**
     * Step 6 - Set framework information for recap
     *
     */
    function setRecapGlobal() {
        document.getElementById("recapfversion").innerHTML = framework[0];
        document.getElementById("recapfedition").innerHTML = framework[1];
        document.getElementById("currentstage").innerHTML = framework[2];
        if (framework[2] == "BETA")
            document.getElementById("betastage").style.display = "block";
    }

    /**
     *
     * Step 6 - Cancel the installation
     *
     */
    document.getElementById("cancelfinal").addEventListener("click", function () {
        location.reload();
    });

    /**
     *
     * Step 9 - Retry the installation
     *
     */
    document.getElementById("retryinstallation").addEventListener("click", function () {
        location.reload();
    });



    /**
     * Step 3 - Requirements
     */
    function step3() {
        rsp1 = rsp2 = rsp3 = -1;
        document.getElementById("retrys3").style.display = "none";
        document.getElementById("continues3").style.display = "none";

        var parentphp = document.getElementsByClassName("phpversion")[0];
        parentphp.getElementsByClassName("error")[0].style.display = "none";
        document.getElementsByClassName("phpversionnum")[0].innerHTML = "...";
        parentphp.getElementsByClassName("isok")[0].innerHTML = '';

        var parentf = document.getElementsByClassName("fversion")[0];
        parentf.getElementsByClassName("error")[0].style.display = "none";
        document.getElementsByClassName("fversionnum")[0].innerHTML = "...";
        parentf.getElementsByClassName("isok")[0].innerHTML = '';

        var parentwr = document.getElementsByClassName("wr")[0];
        parentwr.getElementsByClassName("error")[0].style.display = "none";
        parentwr.getElementsByClassName("isok")[0].innerHTML = ''

        var parentlibsr = document.getElementsByClassName("libsr")[0];
        parentlibsr.getElementsByClassName("error")[0].style.display = "none";
        parentlibsr.getElementsByClassName("isok")[0].innerHTML = '';

        getPHPVersion();
        getFrameworkVersion();
        getWR();
        getLibsRequired();


    }

    /**
     * Notifiy the end of requirements checked
     */
    function notify() {
        if (rsp1 === 0 || rsp2 === 0 || rsp3 === 0 || rsp4 === 0)
        {
            document.getElementById("retrys3").style.display = "block";
            document.getElementById("continues3").style.display = "none";
        }
        else if (rsp1 === 1 && rsp2 === 1 && rsp3 === 1 && rsp4 === 1)
        {
            document.getElementById("continues3").style.display = "block";
            document.getElementById("retrys3").style.display = "none";
        }
    }


    /**
     * Get the PHP server version
     */
    function getPHPVersion() {
        var parent = document.getElementsByClassName("phpversion")[0];
        parent.getElementsByClassName("error")[0].style.display = "none";
        document.getElementsByClassName("phpversionnum")[0].innerHTML = "...";
        parent.getElementsByClassName("isok")[0].innerHTML = '';

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "Tools.php?action=phpv", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200)
            {
                var rsp = JSON.parse(this.response);
                if (rsp.results === "OK")
                {
                    document.getElementsByClassName("phpversionnum")[0].innerHTML = rsp.phpv;
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                    rsp1 = 1;
                }
                else
                {
                    document.getElementsByClassName("phpversionnum")[0].innerHTML = rsp.phpv;
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'red';
                    parent.getElementsByClassName("error")[0].innerHTML = ' - '+rsp.msg;
                    parent.getElementsByClassName("error")[0].style.display = "block";
                    rsp1 = 0;
                }


            }
            else
                rsp1 = 0;
            notify();
        };
        window.setTimeout(function () {
            xhttp.send();
        }, 2000);
    }

    /**
     * Get the librairies required
     */
    function getLibsRequired() {
        var parent = document.getElementsByClassName("libsr")[0];
        parent.getElementsByClassName("error")[0].style.display = "none";
        parent.getElementsByClassName("isok")[0].innerHTML = '';

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "Tools.php?action=libsr", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200)
            {
                var rsp = JSON.parse(this.response);
                if (rsp.results === "OK")
                {
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                    rsp4 = 1;
                }
                else
                {
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'red';
                    parent.getElementsByClassName("error")[0].innerHTML = ' - '+rsp.msg;
                    parent.getElementsByClassName("error")[0].style.display = "block";
                    document.getElementById("retrys3").style.display = "block";
                    rsp4 = 0;
                }
            }
            else
                rsp4 = 0;
            notify();
        };
        window.setTimeout(function () {
            xhttp.send();
        }, 2000);
    }

    /**
     * Get the version of current instance of iumio Framework
     */
    function getFrameworkVersion() {
        var parent = document.getElementsByClassName("fversion")[0];
        parent.getElementsByClassName("error")[0].style.display = "none";
        document.getElementsByClassName("fversionnum")[0].innerHTML = "...";
        parent.getElementsByClassName("isok")[0].innerHTML = '';

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "Tools.php?action=fv", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200)
            {
                var rsp = JSON.parse(this.response);
                if (rsp.results === "OK")
                {
                    framework[0] = rsp.fv;
                    framework[1] = rsp.edition;
                    framework[2] = rsp.stage;
                    document.getElementsByClassName("fversionnum")[0].innerHTML = rsp.fv;
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                    rsp2 = 1;
                }
                else
                {
                    document.getElementsByClassName("fversionnum")[0].innerHTML = rsp.fv;
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'red';
                    parent.getElementsByClassName("error")[0].innerHTML = ' - '+rsp.msg;
                    parent.getElementsByClassName("error")[0].style.display = "block";
                    document.getElementById("retrys3").style.display = "block";
                    rsp2 = 0;
                }
            }
            else
                rsp2 = 0;
            notify();
        };
        window.setTimeout(function () {
            xhttp.send();
        }, 2000);
    }

    /**
     * Get readable and writeable directory
     */
    function getWR() {
        var parent = document.getElementsByClassName("wr")[0];
        parent.getElementsByClassName("error")[0].style.display = "none";
        parent.getElementsByClassName("isok")[0].innerHTML = '';

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "Tools.php?action=wr", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200)
            {
                var rsp = JSON.parse(this.response);
                if (rsp.results === "OK")
                {
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                    rsp3 = 1;
                }
                else
                {
                    parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                    parent.getElementsByClassName("isok")[0].style.color = 'red';
                    parent.getElementsByClassName("error")[0].innerHTML = ' - '+rsp.msg;
                    parent.getElementsByClassName("error")[0].style.display = "block";
                    document.getElementById("retrys3").style.display = "block";
                    rsp3 = 0;
                }
            }
            else
                rsp3 = 0;
            notify();
        };
        window.setTimeout(function () {
            xhttp.send();
        }, 2000);
    }


    document.getElementById("create").addEventListener("click", function () {
        document.getElementById("appnamecreate").innerHTML = appinfo[0];
        document.getElementById("step6").style.display = "none";
        document.getElementById("s6").classList.remove("step-active");
        document.getElementById("s6").classList.add("step-valid");
        document.getElementById("s7").classList.add("step-active");
        document.getElementById("step7").style.display = "block";
        createApp();
    });

    /**
     *
     * Create an application
     *
     */
    function createApp() {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "Tools.php?action=createapp", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var sender = "appname="+appinfo[0]+"&template="+String(appinfo[2]);
        xhttp.onreadystatechange = function() {
            document.getElementById("step7").style.display = "none";
            if (this.readyState === 4 && this.status === 200 && this.responseText === "OK")
            {
                document.getElementById("step7").style.display = "none";
                document.getElementById("s7").classList.remove("step-active");
                document.getElementById("s7").classList.add("step-valid");
                document.getElementById("s8").classList.add("step-active");
                document.getElementById("step9").style.display = "none";
                document.getElementById("step8").style.display = "block";
                redirect();
            }
            else
            {
                document.getElementById("step7").style.display = "none";
                document.getElementById("s7").classList.remove("step-active");
                document.getElementById("s7").classList.add("step-valid");
                document.getElementById("s8").classList.add("step-active");
                document.getElementById("step8").style.display = "none";
                document.getElementById("step9").style.display = "block";
            }
        };
        window.setTimeout(function () {
            xhttp.send(sender);
        }, 4000);
    }

    /**
     * Redirect to first page - iumio Starter Page
     */
    function redirect() {
        setTimeout(function () {
            location.href= (getBaseUrl())+"../Dev.php/index";
        }, 5000);
    }

    /**
     *
     * Get current url
     */
    function getBaseUrl() {
        var re = new RegExp(/^.*\//);
        var url = (re.exec(window.location.href))[0].replace('/setup/','/');
        return (url);
    }

    /**
     * Check is a valid string
     * @param str String to analyse
     * @returns {boolean} The result of the operation
     */
    function isValid(str){
        return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
    }
</script>

</body>
</html>
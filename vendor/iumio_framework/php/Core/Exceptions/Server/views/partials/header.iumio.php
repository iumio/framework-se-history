<!DOCTYPE HTML>
<html>
<head>
    <title><?= $this->code.' '.strtolower(ucfirst($this->codeTitle)).' - iumio '.(strtolower($this->env)) ?></title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= WEB_FRAMEWORK ?>theme/assets/images/favicon.ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="<?= WEB_FRAMEWORK ?>theme/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="<?= WEB_FRAMEWORK ?>theme/assets/css/ie8.css" /><![endif]-->
    <style type="text/css">
        body, html
        {
            font-family: "Roboto Slab", "Times New Roman", serif;
        }
        #wrapper {
            padding-top: 0em;
        }
        #banner.major {
            height: 135vh;
        }
        .timeline {
            list-style-type: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .li {
            transition: all 200ms ease-in;
        }

        .timestamp {
            margin-bottom: 20px;
            padding: 0px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-weight: 100;
        }

        .status {
            padding: 15px 40px;
            display: flex;
            justify-content: center;
            border-top: 2px solid #D6DCE0;
            position: relative;
            transition: all 200ms ease-in;
        }
        .status h4 {
            font-weight: 600;
        }
        .status:before {
            content: "";
            width: 25px;
            height: 25px;
            background-color: white;
            border-radius: 25px;
            border: 1px solid #ddd;
            position: absolute;
            top: -15px;
            left: 50%;
            transition: all 200ms ease-in;
        }

        .li.complete .status {
            border-top: 2px solid #66DC71;
        }
        .li.complete .status:before {
            background-color: #66DC71;
            border: none;
            transition: all 200ms ease-in;
        }
        .li.complete .status h4 {
            color: #66DC71;
        }

        @media (min-device-width: 320px) and (max-device-width: 700px) {
            .timeline {
                list-style-type: none;
                display: block;
            }

            .li {
                transition: all 200ms ease-in;
                display: flex;
                width: inherit;
            }

            .timestamp {
                width: 100px;
            }

            .status:before {
                left: -8%;
                top: 30%;
                transition: all 200ms ease-in;
            }
        }
    </style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
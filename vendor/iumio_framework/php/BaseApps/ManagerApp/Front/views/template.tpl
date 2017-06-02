<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="{img_manager name='favicon/apple-touch-icon.png'}">
    <link rel="icon" type="image/png" sizes="32x32" href="{img_manager name='favicon/favicon-32x32.png'}">
    <link rel="icon" type="image/png" sizes="16x16" href="{img_manager name='favicon/favicon-16x16.png'}">
    <link rel="manifest" href="{img_manager name='favicon/manifest.json'}">
    <link rel="mask-icon" href="{img_manager name='favicon/safari-pinned-tab.svg'}" color="#5bbad5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>iumio Manager</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    {bootstrap_css min='yes'}
    {css_manager name='animate.min'}
    {css_manager name='light-bootstrap-dashboard'}
    {css_manager name='demo'}
    {css_manager name='index'}

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    {css_manager name='pe-icon-7-stroke'}

</head>

<body>

{block name="principal"}
{/block}

{include file='partials/modal.tpl'}
</div>
</div>

<!--   Core JS Files   -->
{jquery}
{bootstrap_js min='yes'}
<!--  Checkbox, Radio & Switch Plugins -->
{js_manager name='bootstrap-checkbox-radio-switch'}
<!--  Notifications Plugin    -->
{js_manager name='bootstrap-notify'}
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
{js_manager name='light-bootstrap-dashboard'}
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
{js_manager name='demo'}

{js_manager name='main'}

</body>
</html>
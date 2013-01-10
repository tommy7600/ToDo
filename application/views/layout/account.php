<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <base href="<?php echo URL::base()?>">
    <meta charset="utf-8">
    <title><?php echo $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ===================== Touch Icons ===================== -->
    <link rel="assets/ico/shortcut icon" href="ico/favicon.ico">
    <link rel="assets/ico/apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="assets/ico/apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="assets/ico/apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="assets/ico/apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <!-- ===================== CSS ===================== -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap-responsive.min.css">

    <!-- Site specific - CSS -->
    <link rel="stylesheet" href="assets/css/theme_light/filevalidation/validationEngine.jquery.css">

    <!-- Common - CSS -->
    <link rel="stylesheet" href="assets/css/theme_light/common.css">
    <link rel="stylesheet" href="assets/css/theme_light.css" class="style_set">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div>
    <?php echo HTML::alerts($messages)?>
</div>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
        </div>
    </div>
</div>

<div class="login_main_cont">
    <div class="login_cont group login">
        <?php if ($content): ?>
            <?php include $content; ?>
        <?php endif ?>
    </div>
</div>

<!-- ===================== JS ===================== -->
<script src="assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="assets/js/libs/bootstrap.min.js"></script>
<script src="assets/js/libs/ios-orientationchange-fix.js"></script>
<script src="assets/js/libs/jquery-ui-1.8.20.custom.min.js"></script>
<script src="assets/js/plugins/filevalidation/languages/jquery.validationEngine-en.js"></script>
<script src="assets/js/plugins/filevalidation/jquery.validationEngine.js"></script>
<script src="assets/js/common.js"></script>

<!-- Site specific - JS -->
<script src="assets/js/script.js"></script>
<script src="assets/js/specific/login.js"></script>

</body>
</html>
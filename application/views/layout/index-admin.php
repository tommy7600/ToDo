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
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <!-- ===================== CSS ===================== -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap-responsive.min.css">

    <!-- Site specific - CSS -->
    <link rel="stylesheet" href="assets/css/theme_light/prettify.css">
    <link rel="stylesheet" href="assets/css/theme_light/tables/dataTables.css">
    <link rel='stylesheet' href='assets/css/theme_light/calendar/fullcalendar.css'/>
    <link rel='stylesheet' href='assets/css/theme_light/calendar/fullcalendar.print.css' media='print'/>
    <link rel="stylesheet" href="assets/css/theme_light/formselements/chosen.css">
    <link rel="stylesheet" href="assets/css/theme_light/formselements/dropkick.css">
    <link rel="stylesheet" href="assets/css/theme_light/jquery-ui-1.8.20.custom.css">

    <!-- Common - CSS -->
    <link rel="stylesheet" href="assets/css/theme_light/common.css">
    <link rel="stylesheet" href="assets/css/theme_light.css" class="style_set">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php if ($navbar): ?>
    <?php include $navbar; ?>
<?php endif ?>

<div class="container">
    <div class="main_content row-fluid">

        <div class="span3">

            <div class="side_nav sidebar-nav" data-spy="affix" data-offset-top="150">
                <h3 class="main_menu group">
                    <span class="title">Main Menu</span>
                    <a id="nav_list_btn" class="btn-collapse btn btn-inverse">
                        <span class="sweet-gray sweet-go-back-from-screen">&nbsp;</span>
                    </a>
                </h3>
                <ul class="nav nav-list">
                    <li class="active"><a class="home" href="admin/">Dashboard</a></li>
                    <li><a class="users" href="admin/userslist">Users list</a></li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="span9">
            <div class="row-fluid">
                <div class="span12">
                    <?php if ($content): ?>
                        <?php include $content; ?>
                    <?php endif ?>
                </div>
            </div>
            <!--/row-->


        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <hr>

    <footer>
        <p>&copy; Company 2012</p>
    </footer>

</div>
<!--/.fluid-container-->

<!-- ===================== JS ===================== -->
<script src="assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="assets/js/libs/bootstrap.min.js"></script>
<script src="assets/js/libs/ios-orientationchange-fix.js"></script>
<script src="assets/js/libs/jquery-ui-1.8.20.custom.min.js"></script>
<script src="assets/js/plugins/widgets/jquery.sparkline.min.js"></script>
<script src="assets/js/common.js"></script>

<!-- Site specific -->
<script src="assets/js/libs/prettify.js"></script>
<script src="assets/js/plugins/charts/jquery.flot.min.js"></script>
<script src="assets/js/plugins/charts/jquery.flot.resize.min.js"></script>
<script src="assets/js/plugins/charts/jquery.flot.pie.min.js"></script>
<script src="assets/js/plugins/charts/jquery.flot.stack.min.js"></script>
<script src="assets/js/plugins/charts/jquery.flot.symbol.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="assets/js/plugins/charts/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/plugins/tables/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/calendar/fullcalendar.min.js"></script>
<script src="assets/js/plugins/formselements/chosen.jquery.min.js"></script>
<script src="assets/js/plugins/formselements/scrollability.min.js"></script>
<script src="assets/js/plugins/formselements/jquery.dropkick-1.0.0.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/js/specific/sparks.js"></script>
<script src="assets/js/specific/index.js"></script>

</body>
</html>
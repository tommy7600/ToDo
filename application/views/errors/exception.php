<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Error Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ===================== Touch Icons ===================== -->
    <link rel="shortcut icon" href="../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">

    <!-- ===================== CSS ===================== -->
    <link href='http://fonts.googleapis.com/css?family=Nobile' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap-responsive.min.css">

    <!-- Common - CSS -->
    <link rel="stylesheet" href="../assets/css/theme_light/common.css">
    <link rel="stylesheet" href="../assets/css/theme_light.css" class="style_set">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="error_container">
                <h1><?php echo $status ?></h1>
                <hr>
                <p>Please try the following options instead:</p>
                <ul>
                    <li><a class="btn btn-small btn-inverse" href="#">Go to dashboard</a></li>
                    <li><a class="btn btn-small btn-inverse" href="#">Go to website</a></li>
                </ul>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</div><!--/.fluid-container-->

<!-- ===================== JS ===================== -->
<script src="../assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="../assets/js/libs/bootstrap.min.js"></script>
<script src="../assets/js/libs/ios-orientationchange-fix.js"></script>
<script src="../assets/js/libs/jquery-ui-1.8.20.custom.min.js"></script>
<script src="../assets/js/common.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>
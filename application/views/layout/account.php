<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/8/13
 * Time: 9:15 AM
 * To change this template use File | Settings | File Templates.
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo URL::base()?>">
    <meta charset="utf-8">
    <title>
        <?php echo $title; ?>
    </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<div id="content">
    <?php if ($content): ?>
        <?php include $content; ?>
    <?php endif ?>
</div>
</body>
</html>
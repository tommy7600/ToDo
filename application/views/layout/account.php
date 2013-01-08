<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/8/13
 * Time: 9:15 AM
 * To change this template use File | Settings | File Templates.
 */?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body>
<div id="content">
    <?php if ($content): ?>
        <?php include $content; ?>
    <?php endif ?>
</div>
</body>
</html>
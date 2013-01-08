<?php
/**
 * User: kbadura
 * Date: 1/7/13
 * Time: 10:24 AM
 */?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>
    <?php echo $title; ?>
</title>
</head>
<body>
    <header>
        <?php if ($navbar): ?>
            <?php include $navbar; ?>
        <?php endif ?>
    </header>
    <div id="content">
        <?php if ($content): ?>
            <?php include $content; ?>
        <?php endif ?>
    </div>
    </body>
</html>
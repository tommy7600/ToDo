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
<?php if ($title): ?>
    <?php include $title; ?>
<?php endif ?>
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

<?php //include Kohana::find_file('views', 'profiler/stats', 'php') ?>
<?php //include Kohana::find_file('views', 'common/bottom', 'php') ?>
</body>
</html>
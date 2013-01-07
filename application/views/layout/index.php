<?php
/**
 * User: kbadura
 * Date: 1/7/13
 * Time: 10:24 AM
 */?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title></title>
</head>
<body>
<?php //include Kohana::find_file('views', 'common/top', 'php') ?>
<div id="content">
    <?php if ($content): ?>
    <?php include $content; ?>
    <?php endif ?>
</div>

<?php //include Kohana::find_file('views', 'profiler/stats', 'php') ?>
<?php //include Kohana::find_file('views', 'common/bottom', 'php') ?>
</body>
</html>
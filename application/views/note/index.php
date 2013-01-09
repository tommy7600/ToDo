note
<?php
    foreach($notes as $elem){
?>
        <br>
<?php
        echo $elem->name;
        echo "<br>Status:".$elem->status->name;
    }
?>

<br><br><br>
<?php
    echo $sample->content;
?>
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
    //echo $sample->content;
?>

<a href="/note/add" class="btn">Add Note</a>


<div class="widget">
    <header>
        <h3>Editor</h3>
        <ul class="toggle_content">
            <li class="arrow"><a href="#">Toggle Content</a></li>
        </ul>
    </header>
    <section>
        <textarea id="cleeditor" name="cleeditor"></textarea>
    </section>
</div>
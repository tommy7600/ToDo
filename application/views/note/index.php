<link rel="stylesheet" type="text/css" href="../assets/sitemapstyler/sitemapstyler.css">

 <style>
    .NoteSelected {
        font-weight: bolder;
    }
 </style>

<div class="row">
    <div class="span4">
        <ul id="sitemap" style="background: #ffffff;">
            <li><a href="#" class="TreeLink"><?php echo $notes[0]->name; ?></a>
                <i class="icon-plus-sign" onclick="loadDynamicAddContent(<?php echo $notes[0]->id ?>);"></i>
                <input type="hidden" value="<?php echo $notes[0]->id; ?>">
                <ul>
            <?php
                $currentLevel = -1;
                foreach($notes as $item)
                {
                    if($item->lvl == 1 && $currentLevel == -1)
                    {
                        $currentLevel = 2;
                        continue;
                    }

                    if($currentLevel > $item->lvl):
                        $diff = $currentLevel - $item->lvl;
                        while($diff-- > 0):
                            echo '</li></ul>';
                        endwhile;

                    $currentLevel -= $currentLevel - $item->lvl;
                    endif;

                    if($item->lvl > $currentLevel):
                        echo '<ul><li><a href="#" class="TreeLink'.(($item->id==$noteId)?" NoteSelected":"").'" onclick="loadDynamicEditContent('.$item->id.');"">'.$item->name.'</a>';
                        echo '<i class="icon-plus-sign" onclick="loadDynamicAddContent('.$item->id.');"></i>';
                        echo '<input type="hidden" value="'.$item->id.'">';
                        $currentLevel++;
                    else:
                        echo '<li><a href="#" class="TreeLink'.(($item->id==$noteId) ?' NoteSelected':'').'" onclick="loadDynamicEditContent('.$item->id.');">'.$item->name.'</a>';
                        echo '<i class="icon-plus-sign" onclick="loadDynamicAddContent('.$item->id.');"></i>';
                        echo '<input type="hidden" value="'.$item->id.'">';
                    endif;

                }
            ?>
         </li></ul>
    </div>

    <div class="span8" id="content">
<!--        <form method="post" action="/note/add">-->
<!---->
<!--            <label for="txtname">Note Name:</label>-->
<!--            <input id="txtName" type="text" name="name" required="required">-->
<!---->
<!--            <label for="comboStatus">Status:</label>-->
<!--            <select id="comboStatus" name="status">-->
<!--                <option value="1">Not Started</option>-->
<!--            </select>-->
<!---->
<!--            <label for="txtContent">Content:</label>-->
<!--            <input id="txtContent" type="text" name="content">-->
<!---->
<!--            <label for="dataPlannedEnd">Planned end:</label>-->
<!--            <input id="dataPlannedEnd" type="date" name="plannedEnd" required="required">-->
<!---->
<!--            <input id="hiddenParentId" type="hidden" value="-1" name="parentId">-->
<!---->
<!--            <br>-->
<!--            <button type="submit">Add Note</button>-->
<!---->
<!--        </form>-->
    </div>
</div>

<script src="assets/js/libs/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../assets/sitemapstyler/sitemapstyler.js" xmlns="http://www.w3.org/1999/html"
        xmlns="http://www.w3.org/1999/html"></script>
<script>

    $(document).ready(function(){

        $('.TreeLink').click(function(){
            $('.TreeLink').each(function(){
               $(this).removeClass('NoteSelected');
            });

            var $link = $(this);
            $link.addClass('NoteSelected');
            $parentId = $link.next().val();
            $('#hiddenParentId').attr('value', $parentId);
            return false;
        });
        $('a.NoteSelected').parents('ul').css('display', 'block');
    });

    function loadDynamicEditContent(id)
    {
        $("#content").load("note_content/index/"+id.toString());
    }

    function loadDynamicAddContent(id)
    {
        $("#content").load("note_content/add/"+id.toString());
    }

</script>










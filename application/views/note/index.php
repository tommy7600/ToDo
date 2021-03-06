<link rel="stylesheet" type="text/css" href="../assets/sitemapstyler/sitemapstyler.css">

<style>
    .NoteSelected {
        font-weight: bolder;
    }
</style>
<div>
    <div class="span4">
        <div class="widget">
            <header>
                <h3>Notes</h3>
            </header>
            <ul id="sitemap" style="background: #ffffff;">
                <li><a href="#" class="TreeLink"><?php echo $notes[0]->name; ?></a>
                    <i class="icon-plus-sign" onclick="loadDynamicAddContent(<?php echo $notes[0]->id ?>);"></i>
                    <input type="hidden" value="<?php echo $notes[0]->id; ?>">
                    <ul>
                        <?php
                        $currentLevel = -1;
                        foreach ($notes as $item) {
                            if ($item->lvl == 1 && $currentLevel == -1) {
                                $currentLevel = 2;
                                continue;
                            }

                            if ($currentLevel > $item->lvl):
                                $diff = $currentLevel - $item->lvl;
                                while ($diff-- > 0):
                                    echo '</li></ul>';
                                endwhile;

                                $currentLevel -= $currentLevel - $item->lvl;
                            endif;

                            if ($item->lvl > $currentLevel):
                                echo '<ul><li><a href="#" class="TreeLink' . (($item->id == $noteId) ? " NoteSelected" : "") . '" onclick="loadDynamicEditContent(' . $item->id . ');"">' . $item->name . '</a>';
                                echo '<i class="icon-plus-sign" onclick="loadDynamicAddContent(' . $item->id . ');"></i>';
                                echo '<input type="hidden" value="' . $item->id . '">';
                                $currentLevel++; else:
                                echo '<li><a href="#" class="TreeLink' . (($item->id == $noteId) ? ' NoteSelected' : '') . '" onclick="loadDynamicEditContent(' . $item->id . ');">' . $item->name . '</a>';
                                echo '<i class="icon-plus-sign" onclick="loadDynamicAddContent(' . $item->id . ');"></i>';
                                echo '<input type="hidden" value="' . $item->id . '">';
                            endif;
                        }
                        ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="span8" id="content">
    </div>
</div>

<script src="../assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="../assets/sitemapstyler/sitemapstyler.js"></script>

<script>

    $(document).ready(function () {

        $('.TreeLink').click(function () {
            $('.TreeLink').each(function () {
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

    function loadDynamicEditContent(id) {
        $("#content").html('<img src="../assets/img/loaders/328_l.gif" height="40" width="40">').load("note_content/index/" + id.toString());
    }

    function loadDynamicAddContent(id) {
        $("#content").html('<img src="../assets/img/loaders/328_l.gif" height="40" width="40">').load("note_content/add/" + id.toString());
    }

</script>










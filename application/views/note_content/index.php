<!-- Site specific - CSS -->
<link rel="stylesheet" href="../assets/css/theme_light/forms/jquery.cleditor.css">

<?php if (isset($messages["error"])): ?>
    <?php echo HTML::alerts($messages) ?>
<?php else: ?>

    <div class="span8" id="content">
        <div class="widget">
            <header>
                <h3>View/edit note</h3>
            </header>
            <form class="well" method="post" action="note_content/edit">

                <input id="id" type="hidden" name="id" value="<?php echo $note->id?>">

                <label for="txtname">Note Name:</label>
                <input id="txtName" type="text" name="name" required="required" value="<?php echo $note->name?>">

                <label for="comboStatus">Status:</label>
                <select id="comboStatus" name="status">
                    <option value="1">Not Started</option>
                </select>

                <label for="cleeditor">Content:</label>
                <textarea id="cleeditor" name="content"><?php echo $noteContent->content?></textarea>

                <label for="dataStart">Planned start:</label>
                <input id="dataStart" type="date" name="plannedEnd" required="required"
                       value="<?php echo $noteContent->date_start?>">

                <label for="dataPlannedEnd">Planned end:</label>
                <input id="dataPlannedEnd" type="date" name="plannedEnd" required="required"
                       value="<?php echo $noteContent->date_planned_ended?>">

                <input id="hiddenParentId" type="hidden" value="-1" name="parentId">

                <br>
                <button type="submit">Edit Note</button>
            </form>
        </div>
    </div>


    <!-- Site specific - JS -->
    <script src="../assets/js/plugins/forms/jquery.cleditor.min.js"></script>
    <script>
        /* ---- Wysiwyg Editor --------------*/
        $("#cleeditor").cleditor({width: "100%", height: "100%"})[0].focus();
        $("#dataPlannedEnd").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $("#dataStart").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    </script>
<?php endif ?>
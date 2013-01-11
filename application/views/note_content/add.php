<!-- Site specific - CSS -->
<link rel="stylesheet" href="../assets/css/theme_light/forms/jquery.cleditor.css">

<div class="span8" id="content">
    <form method="post" action="note_content/add">

        <label for="txtname">Note Name:</label>
        <input id="txtName" type="text" name="name" required="required">

        <label for="comboStatus">Status:</label>
        <select id="comboStatus" name="status">
            <?php foreach($noteStatuses as $status):?>
                <option value="<?php echo $status->id?>"><?php echo $status->name?></option>
            <?php endforeach;?>
        </select>

        <label for="cleeditor">Content:</label>
        <textarea id="cleeditor" name="content"></textarea>

        <label for="dataPlannedEnd">Planned end:</label>
        <input id="dataPlannedEnd" type="date" name="plannedEnd" required="required">

        <input id="hiddenParentId" type="hidden" value="<?php echo $noteParentId ?>" name="parentId">

        <br>
        <button type="submit">Add Note</button>
        <button type="submit">Cancel</button>

    </form>
</div>


<!-- Site specific - JS -->
<script src="../assets/js/plugins/forms/jquery.cleditor.min.js"></script>
<script>
    /* ---- Wysiwyg Editor --------------*/
    $("#cleeditor").cleditor({width:"100%", height:"100%"})[0].focus();
    $( "#dataPlannedEnd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
</script>
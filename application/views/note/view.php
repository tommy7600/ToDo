<div class="span8" id="content">
    <form method="post" action="/note/edit">

        <label for="txtname">Note Name:</label>
        <input id="txtName" type="text" name="name" required="required" value="<?php echo $note->name?>">

        <label for="comboStatus">Status:</label>
        <select id="comboStatus" name="status">
            <option value="1">Not Started</option>
        </select>

        <label for="txtContent">Content:</label>
        <input id="txtContent" type="text" name="content" value="<?php echo $noteContent->content?>">

        <label for="dataPlannedEnd">Planned end:</label>
        <input id="dataPlannedEnd" type="date" name="plannedEnd" required="required" value="<?php echo $noteContent->date_planned_ended?>">

        <input id="hiddenParentId" type="hidden" value="-1" name="parentId">

        <br>
        <button type="submit">Add Note</button>

    </form>
</div>
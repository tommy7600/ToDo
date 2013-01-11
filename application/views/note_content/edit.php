<!-- Site specific - CSS -->
<link rel="stylesheet" href="../assets/css/theme_light/forms/jquery.cleditor.css">

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

<!-- Site specific - JS -->
<script src="../assets/js/plugins/forms/jquery.cleditor.min.js"></script>
<script>
    /* ---- Wysiwyg Editor --------------*/
    $("#cleeditor").cleditor({width:"100%", height:"100%"})[0].focus();
    $( "#dataPlannedEnd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
</script>
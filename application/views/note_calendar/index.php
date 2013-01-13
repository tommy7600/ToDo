<link rel='stylesheet' href='../assets/css/theme_light/calendar/fullcalendar.css'/>
<link rel='stylesheet' href='../assets/css/theme_light/calendar/fullcalendar.print.css' media='print'/>

<div class="widget">
    <header>
        <h3>Calendar</h3>
        <ul class="toggle_content">
            <li id="drag_element" class="switch_content"><a href="#">Toggle External Events Container</a></li>
            <li class="arrow"><a href="#">Toggle Content</a></li>
        </ul>
    </header>
    <section class="group">
        <div id='calendar'></div>
    </section>
</div>

<script src="../assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="../assets/js/libs/jquery.qtip-1.0.0-rc3.min.js"></script>
<script src="../assets/js/plugins/calendar/fullcalendar.min.js"></script>


<script>
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        editable: false,
        droppable: false,
        events: <?php echo $data ?>,
//        eventRender: function (event, element) {
//            element.qtip({
//                content: event.description
//            });
//        }
    });


</script>

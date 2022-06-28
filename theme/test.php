<?php define('PAGE_TITLE','Dashboard - To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridDay'
    });
    calendar.render();
  });
    </script>
    <body>
        <div id="calendar"></div>
    </body>
</html>

<?php define('PAGE_TITLE','Welcome - To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body class="bg-page">
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <app xscope="TaskDBInit" id="main">
            <div xpatch="@PageStatus" class="hdv100">
                <div xif="PageSvc.status=='onload'" class="h100">
                    <?php
                        function bootUIMessage() {return 'Heating up Task Database...';}
                        include SERVER_ROOT.'/theme/sections/bootui.php';
                    ?>
                </div>
            </div>
        </app>
        <script type="text/javascript">
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/TaskDBInit.js'; ?>
        </script>
    </body>
</html>

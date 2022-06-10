<?php define('PAGE_TITLE','To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body class="bg-page">
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <app id="main" xscope="dashboard" class="h100">
            <section xpatch="@PageStatus" class="h100">
                <div xif="PageSvc.status=='preload'">
                    <?php include SERVER_ROOT.'/theme/sections/taskdb.updating.php'; ?>
                </div>
                <div xif="PageSvc.status=='live'" class="h100">
                    <?php include SERVER_ROOT.'/theme/statuses/live-status.php'; ?>
                </div>
                <div xif="PageSvc.status=='create-task'" class="h100">
                    <?php include SERVER_ROOT.'/theme/statuses/create-task.php'; ?>
                </div>
                <div xif="PageSvc.status=='initializing'">
                    <?php include SERVER_ROOT.'/theme/sections/taskdb.init.php'; ?>
                </div>
                <div xif="PageSvc.status=='error'">
                    This is loaded!
                </div>
            </section>
        </app>
    </body>
</html>

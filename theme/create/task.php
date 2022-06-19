<?php define('PAGE_TITLE','Create Task - To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body class="bg-page Light">
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <header xscope="SiteHeader">
            <?php include SERVER_ROOT.'/theme/sections/header.php'; ?>
        </header>
        <app xscope="NewTasker" id="main">
            <div xpatch="@PageStatus" class="hdv100">
                <div xif="PageSvc.status=='onload'" class="h100">

                </div>
                <div xif="PageSvc.status=='create'" class="h100">
                    <div class="evc h100">
                        {{hello}}
                    </div>
                </div>
            </div>
        </app>
        <script type="text/javascript">
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/NewTasker.js'; ?>
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/SiteHeader.js'; ?>
        </script>
    </body>
</html>

<?php define('PAGE_TITLE','Welcome - To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body class="bg-page">
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <header xscope="SiteHeader">
            <?php include SERVER_ROOT.'/theme/sections/header.php'; ?>
        </header>
        <app xscope="TaskDBInit" id="main">
            <div xpatch="@PageStatus" class="hdv100">
                <div xif="PageSvc.status=='onload'" class="h100">
                    <?php
                        function bootUIMessage() {return 'Heating up Task Database...';}
                        include SERVER_ROOT.'/theme/sections/bootui.php';
                    ?>
                </div>
                <div xif="PageSvc.status=='welcome'" class="h100">
                    <div class="evc h100">
                        <div class="card-width">
                            <div class="large-text primetext fw600 ltr-space--3 is-text">Welcome! 🙋‍♂️</div>
                            <div class="mg-top-sm"></div>
                            <div class="small-text primetext fw300 ltr-space-9 is-text">Your to do list is empty. Create a new task and have some fun!</div>
                            <div class="mg-top-rg"></div>
                            <div class="mg-top-rg"></div>
                            <div class="mg-top-rg"></div>
                            <button class="is-primary is-rounded is-large" type="button" name="button">Create Task</button>
                        </div>
                    </div>
                </div>
            </div>
        </app>
        <script type="text/javascript">
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/TaskDBInit.js'; ?>
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/SiteHeader.js'; ?>
        </script>
    </body>
</html>

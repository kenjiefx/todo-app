<?php define('PAGE_TITLE','To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body>
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <app id="main" xscope="dashboard">
            <section xpatch="@PageStatus">
                <div xif="PageSvc.status=='preload'">
                    This is pre-load
                </div>
                <div xif="PageSvc.status=='live'">
                    <div class="wrapper-outer flex jc">
                        <div class="wrapper-inner">
                            <div xpatch="@TaskView">
                                <div xif="Task.isEmpty==true">
                                    <div class="large-text pop">Welcome!</div>
                                    <div class="medium-text rub">Your to do list is empty.</div>
                                    <button type="button">Add (+)</button>
                                </div>
                            </div>

                        </div>
                    </div>
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

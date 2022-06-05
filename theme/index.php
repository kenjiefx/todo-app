<?php define('PAGE_TITLE','To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body>
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <app id="main" xscope="dashboard" class="h100">
            <section xpatch="@PageStatus" class="h100">
                <div xif="PageSvc.status=='preload'">
                    This is pre-load
                </div>
                <div xif="PageSvc.status=='live'" class="h100">
                    <div class="wrapper-outer flex jc h100">
                        <div class="wrapper-inner h100">
                            <div xpatch="@TaskView" class="h100">
                                <div xif="Task.isEmpty==true" class="h100">
                                    <div class="page-content-wrapper evc h100">
                                        <div class="page-content--medium">
                                            <div class="large-text pop">Welcome! <span class="mg-left-sm">🙋‍</span>♂️</div>
                                            <div class="medium-text sub-text rub mg-top-sm">Your to do list is empty. Create a new task and have some fun!</div>
                                            <div class="spacer-hb"></div>
                                            <div class="flex ac">
                                                <button class="is-primary is-rounded is-large" xclick="TaskSvc.create('live')" type="button">Create Task</button>
                                                <button class="is-transparent is-rounded is-large mg-left-sm" type="button">View Dashboard</button>
                                            </div>

                                            <div class="spacer-hb"></div>
                                            <div class="spacer-hb"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div xif="PageSvc.status=='create-task'" class="h100">
                    <div class="page-content-wrapper evc h100">
                        <div class="page-content--medium card -card-medium">
                            <div class="regular-text pop">New Task 🤾‍♂</div>
                            <div class="medium-text sub-text rub mg-top-sm">What do you want to do next?</div>
                            <form class="standard">
                                <fieldset class="">
                                    <label class="label" for="">Ticket ID</label>
                                    <input type="text" class="input">
                                </fieldset>
                                <fieldset class="mg-top-lg">
                                    <label class="label" for="">Description</label>
                                    <textarea rows="4" cols="80"></textarea>
                                </fieldset>
                            </form>
                            <div class="error-after-form mg-top-lg">
                                <div class="">
                                    <div class="error-message-std rub">
                                        Sorry, you have error in the fields above.
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-reversed-buttons">
                                <button class="is-primary is-rounded is-large" type="button">Save</button>.
                                <button xclick="TaskSvc.cancel()" class="is-transparent is-rounded is-large" type="button">Cancel</button>
                                <div class="timestamp">{{UtilSvc.getCurrentTimestamp()}} ⌚</div>
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

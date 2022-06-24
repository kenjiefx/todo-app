<?php define('PAGE_TITLE','Dashboard - To Do App'); ?>
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
        <app xscope="Dashboard" id="main">
            <div xpatch="@PageStatus" class="hdv100">
                <div xif="PageSvc.status=='onload'" class="h100">

                </div>
                <div xif="PageSvc.status=='dashboard'" class="h100">
                    <div class="page-main">
                        <div class="w100 flex">
                            <div class="dashboard-sidebar dashdb">
                                asd
                            </div>
                            <div class="dashboard-tasklist dashdb">
                                <div class="task-list-header">
                                    <div xif="onView=='all'">
                                        <div class="">
                                            <div class="regular-text primetext fw600 ltr-space--3 is-text">All Task</div>
                                            <div class="is-text small-text subtext fw300">You are view all the tasks, regardless of the status</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="spacer-lg-border"></div>
                                <div xpatch="@DashboardTaskList" class="task-list-view">
                                    <ul xrepeat="taskList as task">
                                        <li>
                                            <div class="dashboard-task-item flex ac jspace-bet">
                                                <div class="">
                                                    <div class="lighter-text is-text x-small-text subtext fw300">{{$parent.UtilSvc.toFormatDate(task.createdAt)}}</div>
                                                    <div class="mg-top-sm"></div>
                                                    <div class="">
                                                        <span>💬</span>
                                                        <span class="is-text small-text primetext fw300">{{task.about}}</span>
                                                    </div>
                                                    <div class="mg-top-sm"></div>
                                                    <div class="flex ac">
                                                        <div class="task-status is-{{task.status}}">{{task.status}}</div>
                                                        <div class="lighter-text mg-left-sm is-text x-small-text subtext fw300">since {{$parent.UtilSvc.toTimeAgo(task.updatedAt)}}</div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="todo-count">{{task.metrics.toDoCount}}</div>
                                                </div>
                                            </div>
                                            <div class="spacer-lg-border"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dashboard-viewlist">
                                asd
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </app>
        <script type="text/javascript">
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/Dashboard.js'; ?>
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/SiteHeader.js'; ?>
        </script>
        <style media="screen">
            .dashdb {
                border-right: solid;
                border-width: 1px;
                border-color: #d9d9d9;
            }
            .dashboard-sidebar {
                width: 250px;
            }
            .dashboard-tasklist {
                width: 450px;
            }
            .task-list-header {
                padding: 20px 10px 0px 10px;
            }
            .dashboard-task-item {
                padding: 0px 10px;
            }
            .todo-count {
                font-family: Arial;
                font-size: 0.9em;
                width: 30px;
                height: 30px;
                border-style: solid;
                border-radius: 100px;
                border-width: 1px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .Light .todo-count {
                background-color: #f44336;
                color: white;
            }
            .Dark .todo-count {
                color: white;
                background-color: #f44336;
                border-color: transparent;
            }
        </style>
    </body>
</html>

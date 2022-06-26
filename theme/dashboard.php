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
                            <div class="dashboard-sidebar">
                                <?php include SERVER_ROOT.'/theme/sections/sidebar.php'; ?>
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
                                        <li class="task-list-item-wrapper">
                                            <div class="dashboard-task-item flex ac jspace-bet">
                                                <div class="">
                                                    <div class="lighter-text is-text x-small-text subtext fw300">{{$parent.UtilSvc.toFormatDate(task.createdAt)}}</div>
                                                    <div class="mg-top-sm"></div>
                                                    <div class="" style="padding-right: 10px;">
                                                        <span>💬</span>
                                                        <span class="is-text small-text primetext fw400 mg-left-sm">{{task.about}}</span>
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
                                <div class="dashboard-section-spacer new-task-ad-space">
                                    <div class="regular-text primetext fw600 ltr-space--3">New Task</div>
                                    <div class="small-text subtext fw300">Create a new task and have some fun!</div>
                                    <div class="mg-top-rg"></div>
                                    <button class="is-primary is-rounded is-large" type="button" name="button">Create Task</button>
                                </div>
                            </div>
                            <div class="dashboard-viewlist dashdb flex-grow-1">
                                <div xpatch="@TaskSingleView" class="w100">
                                    <div class="dashboard-section-spacer">
                                        <div class="flex ac jspace-bet">
                                            <div class="flex ac">
                                                <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M20 13.01h-7V10h1c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v4c0 1.103.897 2 2 2h1v3.01H4V18H3v4h4v-4H6v-2.99h5V18h-1v4h4v-4h-1v-2.99h5V18h-1v4h4v-4h-1v-4.99zM10 8V4h4l.002 4H10z"></path></svg>
                                                <div class="mg-left-md">
                                                    <div class="small-text primetext fw500 ltr-space--3 is-text">My Task</div>
                                                    <div class="mg-top-x-sm"></div>
                                                    <div class="small-text subtext fw300 is-text">To finish the task, complete your to-do items!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spacer-lg-border"></div>
                                    <div class="dashboard-section-spacer">
                                        <div class="flex ac jspace-bet">
                                            <div class="flex ac">
                                                <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>
                                                <div class="mg-left-md">
                                                    <div class="small-text subtext fw300 is-text">This task is {{Task.status}} since {{UtilSvc.toFormatDate(Task.updatedAt)}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spacer-lg-border"></div>
                                    <div class="dashboard-section-spacer flex">
                                        <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.318.142-.686.238-1.028.466-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.945-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 1 0 6.5 10zm11 0c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 1 0 17.5 10z"></path></svg>
                                        <div class="mg-left-md medium-text primetext fw600 ltr-space--3 is-text">{{Task.about}}</div>
                                    </div>
                                    <div class="spacer-lg-border"></div>
                                </div>
                            </div>
                            <div class="dashboard-viewmetrics">
                                <div class="dashboard-section-spacer">
                                    <div class="small-text primetext fw500 ltr-space--3 is-text">App Activity</div>
                                    
                                </div>
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

            .dashboard-viewmetrics {
                width: 250px;
            }
            .dashboard-viewlist {
                padding-top: 20px;
            }
            .task-list-item-wrapper {
                padding-top: 20px;
            }
            .task-list-item-wrapper:hover {
                background-color: #fbfbfb;
                cursor: pointer;
            }
            .Dark .task-list-item-wrapper:hover {
                background-color: #282828;
                cursor: pointer;
            }
            .dashdb {
                border-right: solid;
                border-width: 1px;
                border-color: #d9d9d9;
            }
            .Dark .dashdb {
                border-color: #3e3e3e;
            }
            .dashboard-sidebar {
                width: 60px;
            }
            .Dark .dashboard-sidebar-wrapper {
                border-color: #383838;
                background-color: #212326;
            }
            .dashboard-tasklist {
                width: 450px;
                min-height: 100vh;
                height: 100%;
                background-color: #fcfdff;
            }
            .Dark .dashboard-tasklist {
                background-color: #2b363c;
            }
            .task-list-header {
                padding: 20px 10px 0px 10px;
            }
            .dashboard-section-spacer {
                padding: 0px 10px 0px 10px;
            }
            .dashboard-task-item {
                padding: 0px 25px;
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
                color: #0a1c1a;
            }
            .Dark .todo-count {
                color: white;
                border-color: #009688;
            }
            .new-task-ad-space {
                background: rgb(219,255,255);
                background: linear-gradient(0deg, rgba(219,255,255,1) 0%, rgba(246,229,224,1) 100%);
                padding: 20px 20px;
            }

        </style>
    </body>
</html>

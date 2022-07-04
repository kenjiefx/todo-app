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
                                        <li xclick="viewTask({{$index}})" class="task-list-item-wrapper">
                                            <div class="dashboard-task-item flex ac jspace-bet">
                                                <div class="">
                                                    <div class="lighter-text is-text x-small-text subtext fw300">{{$parent.UtilSvc.toFormatDate(task.createdAt)}}</div>
                                                    <div class="mg-top-sm"></div>
                                                    <div class="" style="padding-right: 10px;">
                                                        <span>💬</span>
                                                        <span class="is-text small-text primetext fw300 mg-left-sm">{{task.about}}</span>
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
                                <div class="dashboard-viewlist-flex">
                                    <div xpatch="@TaskSingleView" class="dashboard-viewlist-col task-single-view">
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
                                                        <div class="small-text subtext fw300 is-text">{{UtilSvc.toFormatDate(Task.updatedAt)}}</div>
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
                                        <div class="dashboard-section-spacer">
                                            <div class="flex ac">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-std" width="24" height="24"><path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z"></path><path d="M7 9h10v2H7zm0 4h5v2H7z"></path></svg>
                                                <div class="mg-left-md">
                                                    <div class="small-text primetext fw500 ltr-space--3 is-text">To Do Items</div>
                                                    <div class="mg-top-x-sm"></div>
                                                    <div class="small-text subtext fw300 is-text">Task status is updated as soon as to-do items are completed.</div>
                                                </div>
                                            </div>
                                            <div class="view-task-todos">
                                                <ul xrepeat="Task.todos as todo">
                                                    <li>
                                                        <div xif="todo.status=='pending'">
                                                            <div class="view-task-todos-item">
                                                                <div class="mg-top-md">
                                                                    <div class="checkbox-container">
                                                                        <input type="checkbox">
                                                                        <span xclick="TaskSvc.update.todo.complete({{$index}})" class="checkbox-checkmark"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="view-task-todos-right">
                                                                    <div class="small-text subtext fw300 is-text">{{todo.description}}</div>
                                                                    <div class="mg-top-sm"></div>
                                                                    <div class="flex ac">
                                                                        <div class="task-status is-{{todo.status}}">{{todo.status}}</div>
                                                                        <div class="lighter-text mg-left-sm is-text x-small-text subtext fw400">since {{$parent.UtilSvc.toTimeAgo(todo.updatedAt)}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div xif="todo.status=='completed'">
                                                            <div class="view-task-todos-item">
                                                                <div class="mg-top-md">
                                                                    <div class="checkbox-container">
                                                                        <input type="checkbox" checked="checked">
                                                                        <span xclick="TaskSvc.update.todo.uncomplete({{$index}})" class="checkbox-checkmark"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="view-task-todos-right">
                                                                    <div class="small-text subtext fw300 is-text">{{todo.description}}</div>
                                                                    <div class="mg-top-sm"></div>
                                                                    <div class="flex ac">
                                                                        <div class="task-status is-{{todo.status}}">{{todo.status}}</div>
                                                                        <div class="lighter-text mg-left-sm is-text x-small-text subtext fw400">since {{$parent.UtilSvc.toTimeAgo(todo.updatedAt)}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div xpatch="@CalendarViewDashboard" class="calendar-view dashboard-viewlist-col">
                                        <div class="calendar-view-header flex ac jspace-bet">
                                            <div xclick="CalendarSvc.backward()" class="calendar-view-nav-btn">
                                                <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
                                            </div>
                                            <div class="flex ac">
                                                <div class="calendar-date-widget">
                                                    <div class="calendar-date-widget-month">{{CalendarView.month}}</div>
                                                    <div class="calendar-date-widget-day">{{CalendarView.day}}</div>
                                                </div>
                                                <div class="mg-left-md">
                                                    <div class="medium-text primetext fw600 ltr-space--3 is-text">Due Tasks</div>
                                                    <div class="small-text subtext fw300 is-text">Browse when your ticket is due!</div>
                                                </div>
                                            </div>
                                            <div xclick="CalendarSvc.forward()" class="calendar-view-nav-btn">
                                                <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            </div>
                                        </div>
                                        <div class="spacer-lg-border"></div>
                                        <div class="">
                                            <div xif="CalendarView.isEmptyTaskList==true">
                                                <div xblock="@CalendarViewSlider" class="calendar-view-slider">
                                                    <div class="calendar-view-slider-inner">
                                                        <div class="flex ac jc dir-col">
                                                            <div class="small-text subtext fw300 is-text">You have no tasks due on {{CalendarView.month}} {{CalendarView.day}}</div>
                                                            <div class="mg-top-md"></div>
                                                            <svg class="icon-std" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style=""><path d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zm-5.45 8.16a1 1 0 0 0-.55.9V20H9v-.94a1 1 0 0 0-.55-.9A8 8 0 0 1 4.06 12h15.88a8 8 0 0 1-4.39 6.16zM9 9V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.53 4.53 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z"></path></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div xif="CalendarView.isEmptyTaskList==false">
                                                <div xblock="@CalendarViewSlider" class="calendar-view-slider">
                                                    <div class="calendar-view-slider-inner">
                                                        <div class="flex ac jc dir-col">
                                                            <ul xrepeat="CalendarView.taskList as task">
                                                                <li class="task-due-task-item">
                                                                    <div class="task-due-task-item-content">
                                                                        <div class="small-text subtext fw300 is-text">{{task.about}} — updated {{$parent.UtilSvc.toTimeAgo(task.updatedAt)}}</div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="dashboard-viewmetrics">
                                <div class="dashboard-section-spacer">
                                    <div class="small-text primetext fw500 ltr-space--3 is-text">App Activity</div>
                                    <div class="small-text subtext fw300 is-text">Tracking your activity per day</div>
                                    <div class="mg-top-md"></div>
                                    <div xpatch="@ActivityTrackerDashboard">
                                        <div id="app-activity-dashboard"></div>
                                    </div>

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
            @media only screen and (max-width: 1624px) and (min-width: 1px){
                .dashboard-viewlist-col{
                    width: 100%;
                }
            }
            @media only screen and (max-width: 2100px) and (min-width: 1625px){
                .calendar-view{
                    border-left: solid;
                    border-width: 1px;
                    border-color: #d9d9d9;
                }
                .Dark .calendar-view {
                    border-color: #3e3e3e;
                }
                .dashboard-viewlist-flex {
                    display: flex;
                }
                .dashboard-viewlist-col.task-single-view {
                    width: 60%;
                }
                .dashboard-viewlist-col.calendar-view {
                    width: 40%;
                    min-height: 100vh;
                }
            }
        </style>
        <style media="screen">
            .app-activity-row {
                display: flex;
                margin-bottom: 3px;
            }
            .Dark .app-activity-cell {
                border-color: #323232;
            }
            .app-activity-cell {
                width: 16px;
                height: 16px;
                border-style: solid;
                border-width: 1px;
                border-radius: 2px;
                margin-right: 2px;
                border-color: #d9d9d9;
            }
            .calendar-view-slider {
                transition: 0.5s;
            }
            .task-due-task-item {
                padding: 17px 0px;
            }
            .task-due-task-item {
                padding: 17px 0px;
                border-bottom: solid;
                border-bottom-width: 1px;
                border-color: #f1f1f1;
                cursor: pointer;
            }
            .task-due-task-item:hover {
                background-color: #fbfbfb;
            }
            .Dark .task-due-task-item:hover {
                background-color: #3e3e3e;
            }
            .Dark .task-due-task-item {
                border-color: #303030;
            }
            .calendar-view-nav-btn {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }
            .calendar-view-nav-btn:hover {
                border-width: 1px;
                color: #009688;
                border-style: solid;
                border-radius: 100px;
            }
            .calendar-date-widget-day{
                height: 40px;
                background-color: #f7f7f7;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: Arial;
                font-size: 32px;
                font-weight: bold;
            }
            .calendar-date-widget {
                width: max-content;
                border-radius: 10px;
                overflow: hidden;
            }
            .calendar-date-widget-month {
                display: flex;
                justify-content: center;
                background-color: #009688;
                font-family: Helvetica;
                font-size: 11.5px;
                color: #efefef;
                text-transform: uppercase;
                letter-spacing: 1px;
                padding: 5px;
            }
            .calendar-view-header {
                padding: 25px 20px 0px 20px;
            }
            .Dark .calendar-view-header {

            }
            .calendar-view-padding {
                padding: 0px 20px;
            }
            .dashboard-viewlist-col {
                min-width: 350px;
            }
            .dashboard-viewlist-col.task-single-view {
                padding-top: 20px;
            }
            .dashboard-viewlist-col.calendar-view {
                overflow: hidden;
            }
            .dashboard-
            .view-task-todos-item {
                padding-bottom: 10px;
            }
            .view-task-todos-right {
                margin-left: 50px;
            }
            .view-task-todos {
                margin-left: 50px;
                margin-top: 40px;
                border-left-style: solid;
                border-width: 1px;
                border-color: #f1f1f1;
            }
            .checkbox-checkmark {
                left: -13px !important;
            }
            .dashboard-viewmetrics {
                width: 350px;
                padding-top: 20px;
            }
            .dashboard-viewlist {

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

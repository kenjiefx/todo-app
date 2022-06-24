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
                    <div class="page-main">
                        <div class="page-width--large">
                            <div class="page-banner">
                                <div class="flex ac jspace-bet">
                                    <div class="">
                                        <div class="regular-text primetext fw600 ltr-space--3 is-text">Create Task</div>
                                        <div class="small-text subtext fw300 is-text">Add new task item to your pending queue</div>
                                    </div>
                                    <div class="flex ac">
                                        <button class="is-transparent is-rounded is-large" type="button" name="button">Cancel</button>
                                        <button xclick="TaskSvc.task.create()" class="is-primary is-rounded is-large is-text" type="button" name="button">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="spacer-lg-border"></div>
                            <div class="page-layout--flex">
                                <div class="page--left">
                                    <div class="is-text small-text primetext fw500">About</div>
                                    <div class="mg-top-sm"></div>
                                    <div class="is-text small-text subtext fw300">A short description about this task</div>
                                    <div class="mg-top-md"></div>
                                    <fieldset>
                                        <textarea xmodel="Task.about" class="is-text" name="name" rows="2" cols="80"></textarea>
                                    </fieldset>
                                    <div xpatch="@ErrorSvc_WhenTaskAboutIsEmpty">
                                        <div xif="ErrorSvc.hasError is true">
                                            <div class="mg-top-md"></div>
                                            <div class="small-text subtext fw300 error-text">Error: Task description is required.</div>
                                        </div>
                                    </div>
                                    <div class="spacer-lg-border"></div>
                                    <div class="flex ac jspace-bet">
                                        <div class="">
                                            <div class="is-text small-text primetext fw500">Salesforce Ticket ID</div>
                                            <div class="mg-top-sm"></div>
                                            <div class="is-text small-text subtext fw300">Add a reference to your Salesforce ticket</div>
                                        </div>
                                        <fieldset>
                                            <input xmodel="Task.SalesforceTicketId" class="input" type="text" name="" value="">
                                        </fieldset>
                                    </div>

                                </div>
                                <div class="page--right">
                                    <div class="is-text small-text primetext fw500">Created</div>
                                    <div class="mg-top-md"></div>
                                    <div class="is-text small-text subtext fw300">{{UtilSvc.toFormatDate(Task.createdAt)}}</div>
                                    <div class="spacer-lg-border"></div>
                                    <div class="is-text small-text primetext fw500">Status</div>
                                    <div class="mg-top-md"></div>
                                    <div class="is-text small-text subtext fw300">When you create new task, it automatically is set to pending.</div>
                                    <div class="mg-top-md"></div>
                                    <div class="status is-{{Task.status}} subtext">{{Task.status}}</div>
                                </div>
                            </div>
                            <div class="spacer-lg-border"></div>
                            <div class="page--center">
                                <div class="is-text small-text primetext fw500">To Do List</div>
                                <div class="mg-top-sm"></div>
                                <div class="is-text small-text subtext fw300">Add a list of things to do in this certain task</div>
                                <div class="mg-top-md"></div>
                                <button xclick="TaskSvc.add.todo.item()" class="is-primary is-rounded is-large is-text" type="button" name="button">Add To Do Item</button>
                                <div class="mg-top-md"></div>
                                <div xpatch="@ErrorSvc_WhenToDoListIsEmpty">
                                    <div xif="ErrorSvc.hasError is true">
                                        <div class="small-text subtext fw300 error-text">Error: At least 1 to do item is required.</div>
                                        <div class="mg-top-md"></div>
                                    </div>
                                </div>
                                <div xpatch="@TaskToDoList" class="mg-top-rg">
                                    <ul xrepeat="Task.todos as todo">
                                        <li class="mg-top-sm">
                                            <div xif="todo.status=='new'">
                                                <div class="flex ac">
                                                    <div class="">👉</div>
                                                    <input xchange="TaskSvc.update.todo.item({{$index}})" class="todo-list-item mg-left-md" type="text" name="" placeholder="Write your item here">
                                                </div>
                                            </div>
                                            <div xif="todo.status=='pending'">
                                                <div class="flex ac">
                                                    <div xclick="TaskSvc.delete.todo.item({{$index}})" class="clickable">❌</div>
                                                    <input xchange="TaskSvc.update.todo.item({{$index}})" class="todo-list-item mg-left-md" type="text" name="" value="{{todo.description}}">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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

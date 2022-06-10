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
            <div xif="Task.isEmpty==false" class="h100">
                <div class="page-content-wrapper h100">
                    Hello world
                    <button class="is-primary is-rounded is-large" xclick="TaskSvc.create('live')" type="button">Create Task</button>
                    <div xpatch="@TaskViewListing" class="task-list-search-result-wrapper">
                        {{TaskViewList.resultCount}}
                        <div class="task-list-viewer card -card-medium">
                            <ul xrepeat="TaskViewList.resultList as task">
                                <li>
                                    {{$parent.TaskSvc.countToDos(task.todos)}}
                                    {{task.description}}
                                    <div class="spacer-lg-border"></div>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="wrapper-outer flex jc h100">
    <div class="wrapper-inner h100">
        <div xpatch="@TaskView" class="h100">
            <div xif="Task.isEmpty==true" class="h100">
                <div class="page-content-wrapper evc h100">
                    <div class="page-content--medium">
                        <div class="large-text pop">Welcome! <span class="mg-left-sm">🙋‍</span>♂️</div>
                        <div class="medium-text sub-text rub mg-top-sm" style="line-height: 26px;">Your to do list is empty. Create a new task and have some fun!</div>
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
                <?php include SERVER_ROOT.'/theme/statuses/dashboard/header.php'; ?>
                <div class="page-content-wrapper h100">
                    <div xpatch="@TaskViewListing" class="task-list-search-result-wrapper">
                        <div class="hero-banner">
                            <div class="task-result-count">
                                <div class="task-result-count-number">{{TaskViewList.count.pending}} 🚀</div>
                                <div class="task-result-count-explain">Pending Tasks</div>
                            </div>
                            <div class="task-result-count">
                                <div class="task-result-count-number">{{TaskViewList.count.finishedPercent}} %</div>
                                <div class="task-result-count-explain">Completed Tasks</div>
                            </div>
                        </div>

                        <div class="task-status-options">
                            <div class="task-status-option">All 🙆‍♂️</div>
                            <div class="task-status-option">Pending 🤦</div>
                            <div class="task-status-option">Finished 🙅</div>
                        </div>
                        <div class="task-list-viewer task-viewer-card">
                            <ul xrepeat="TaskViewList.resultList as task">
                                <li class="task-item">
                                    <div class="task-item-wrapper">
                                        <div class="task-list-col-1">
                                            <div class="task-date pop small-text">{{$parent.UtilSvc.toFormatDate(task.createdAt)}}</div>
                                            <div class="pop medium-text task-description">💬 <span class="mg-left-sm">{{task.description}}</span></div>
                                            <div class="task-todos pop small-text">
                                                <span>👉 </span> <span class="mg-left-sm">{{$parent.TaskSvc.countToDos(task.todos)}} to do items</span>
                                            </div>
                                        </div>
                                        <div class="task-list-col-2 flex w50">
                                            <div class="task-status">{{task.status}}</div>
                                            <div class="task-timelapsed">
                                                {{$parent.UtilSvc.toTimeAgo(task.createdAt)}}
                                            </div>
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
</div>

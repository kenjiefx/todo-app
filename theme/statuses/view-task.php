<div class="view-task-main-wrapper">
    <?php include SERVER_ROOT.'/theme/statuses/dashboard/header.php'; ?>
    <div class="view-task-wrapper h100">
        <div class="wrapper-inner h100">
            <div class="my-task-page">
                <div class="my-task-page-card">
                    <div class="my-task-page-card-padding">
                        <div class="flex ac" style="justify-content: space-between;">
                            <div class="">
                                <div class="regular-text pop">My Task 🤾‍♂</div>
                                <div class="medium-text rub mg-top-sm">Task ID: {{Task.focus.id}}</div>
                            </div>
                            <div class="flex ac">
                                <div class="task-result-count-explain">Completed</div>
                                <div class="mg-left-md task-result-count-number">{{Task.focus.metrics.finishedTodosPercent}} %</div>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-lg-border"></div>
                    <div class="my-task-page-card-padding">
                        <fieldset class="">
                            <label class="label" for="">Description 💬</label>
                            <textarea id="newTaskDescription" rows="2" cols="80">{{Task.focus.description}}</textarea>
                        </fieldset>
                    </div>
                    <div class="spacer-lg-border"></div>
                    <div class="my-task-page-card-padding">
                        <div class="my-task-page-section-title">Task History</div>
                        <div class="pop small-text task-created-at-view">
                            🚣‍♂ <span class="mg-left-sm">You created this task on {{UtilSvc.toFormatDate(Task.focus.createdAt)}} ({{UtilSvc.toTimeAgo(Task.focus.createdAt)}})</span>
                        </div>
                    </div>
                    <div class="spacer-lg-border"></div>
                    <div class="my-task-page-card-padding">
                        <div class="my-task-page-section-title">To Do Items</div>
                        <button xclick="TaskSvc.addToDoItem()" class="is-primary is-rounded is-medium" type="button">Add To Do Item (+)</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

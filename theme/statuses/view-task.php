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
                            <div xpatch="@completedTaskPercent" class="flex ac">
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
                        <div class="pop small-text my-task-page-card-padding">
                            You have a total of {{Task.focus.metrics.totalToDos}} to do items
                        </div>
                        <div class="mg-top-rg"></div>
                        <button xclick="TaskSvc.addToDoItem()" class="is-primary is-rounded is-medium" type="button">Add To Do Item (+)</button>
                        <div class="mg-top-md"></div>
                        <div xpatch="@viewTaskTodoList">
                            <div class="flex ac todo-list-wrapper">
                                <div class="flex-grow-1">
                                    <ul xrepeat="Task.focus.todos as todo">
                                        <li>
                                            <div xif="todo.completed==true" class="flex ac">
                                                <div class="checkbox-container">
                                                    <input type="checkbox" checked="checked">
                                                    <span xclick="TaskSvc.unCompleteTodo({{$index}})" class="checkbox-checkmark"></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <input class="is-view-todo-completed" type="text" name="" disabled value="{{todo.description}}" style="margin-top: 12.5px;">
                                                </div>
                                            </div>
                                            <div xif="todo.completed==false" class="flex ac">
                                                <div class="checkbox-container">
                                                    <input type="checkbox">
                                                    <span xclick="TaskSvc.completeTodo({{$index}})" class="checkbox-checkmark"></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <input data-taskindex="{{$parent.Task.focus.focusIndex}}" data-todoindex="{{$index}}" onkeyup="app.$scopes.dashboard.TaskSvc.showTodoSaveChanges(this)" class="view-todo-input-all" type="text" name="" value="{{todo.description}}" style="margin-top: 12.5px;">
                                                </div>
                                            </div>
                                            <div class="todo-status-viewer">
                                                <div class="todo-status-badge is-{{todo.status}}">{{todo.status}}</div> <div class="pop small-text mg-left-sm">since {{$parent.UtilSvc.toTimeAgo(todo.updatedAt)}}</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="save-changes-section">
                                    <div id="todoEditSaveItems" class="flex ac" style="display:none;">
                                        <button xclick="TaskSvc.hideTodoSaveChanges()" class="is-transparent is-rounded is-large" type="button" name="button">Cancel</button>
                                        <button xclick="TaskSvc.saveTodoSaveChanges()" class="is-primary is-rounded is-large" type="button" name="button">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="spacer-lg-border"></div>

                </div>

            </div>
        </div>
    </div>
</div>

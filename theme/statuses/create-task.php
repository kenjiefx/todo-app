<div class="page-content-wrapper evc h100">
    <div class="page-content--medium card -card-medium">
        <div class="regular-text pop">New Task 🤾‍♂</div>
        <div class="medium-text sub-text rub mg-top-sm">What do you want to do next?</div>
        <form class="standard">
            <fieldset class="mg-top-lg">
                <label class="label" for="">Description 💬</label>
                <textarea id="newTaskDescription" rows="2" cols="80"></textarea>
            </fieldset>
            <div class="flex ac mg-top-rg">
                <div class="flex ac">
                    <div class="small-text rub">Ticket ID</div>
                    <fieldset class="mg-left-md">
                        <input id="newTicketID" type="text">
                    </fieldset>
                </div>
                <div class="flex ac mg-left-md">
                    <div class="small-text rub">Task ID: {{TaskSvc.taskModel.id}} 🔑</div>
                </div>
            </div>
        </form>
        <div class="spacer-lg-border"></div>
        <button xclick="TaskSvc.addToDoItem()" class="is-primary is-rounded is-medium" type="button">Add To Do Item (+)</button>
        <div xpatch="@ToDoList" class="todo-list">
            <ul xrepeat="TaskSvc.taskModel.todos as todo" class="mg-top-md">
                <li>
                    <div xif="todo.description=='Write your item here'" class="flex ac">
                        <div style="margin-top: -7px;">👉</div>
                        <input xchange="TaskSvc.updateToDoItem(1,{{$index}})" type="text" name="" placeholder="{{todo.description}}">
                    </div>
                    <div xif="todo.description!=='Write your item here'" class="flex ac">
                        <div class="">▪</div>
                        <input xchange="TaskSvc.updateToDoItem(1,{{$index}})" type="text" name="" value="{{todo.description}}">
                        <div xclick="TaskSvc.removeToDoItem(1,{{$index}})" class="clickable">❌</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="spacer-lg-border"></div>
        <div xpatch="@newTaskError" class="error-after-form mg-top-lg">
            <div xif="TaskSvc.hasError==true">
                <div class="error-message-std rub">
                    {{TaskSvc.errorMessage}} ⚠
                </div>
            </div>
        </div>
        <div class="wrap-reversed-buttons">
            <button xclick="TaskSvc.save()" class="is-primary is-rounded is-large" type="button">Save ✔</button>
            <button xclick="TaskSvc.cancel()" class="is-transparent is-rounded is-large" type="button">Cancel</button>
            <div class="timestamp">{{UtilSvc.getCurrentTimestamp()}} <span class="mg-left-md">📅</span></div>
        </div>
    </div>
</div>

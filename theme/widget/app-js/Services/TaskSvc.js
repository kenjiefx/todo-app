app.service('TaskSvc',function($scope,TaskModel,$patch){
    class TaskSvc {
        constructor(){
            this.backtoStatus = null;
            this.hasError = false;
            this.errorMessage = '';
            this.taskMode = null;
        }
        create(backtoStatus){
            this.taskModel = new TaskModel();
            this.backtoStatus = backtoStatus;
            $scope.PageSvc.setStatus('create-task');
            this.taskMode = 'create';
        }
        addToDoItem(){
            if (this.taskMode==='create') {
                this.taskModel.todos.push({
                    description: 'Write your item here'
                });
                $patch('ToDoList');
                return;
            }
        }
        updateToDoItem(taskIndex,toDoIndex,inputToDoItem){
            if (this.taskMode==='create') {
                let toDoItemVal = $(inputToDoItem.$element).val();
                this.taskModel.todos[toDoIndex].description = toDoItemVal;
            }
        }
        removeToDoItem(taskIndex,toDoIndex,inputToDoItem){
            if (this.taskMode==='create') {
                let filteredTodos = this.taskModel.todos.filter(function(index,item){
                    if (index!==toDoIndex) {
                        return item;
                    }
                });
                filteredTodos.pop();
                this.taskModel.todos = filteredTodos;
                console.log(filteredTodos);
                $patch('ToDoList');
                return;
            }
        }
        cancel(patchableName){
            this.clearError(patchableName);
            this.taskMode = null;
            if (null===this.backtoStatus) {
                $scope.PageSvc.setStatus('live');
                return;
            }
            $scope.PageSvc.setStatus(this.backtoStatus);
            return;
        }
        save(){
            let description = $('#newTaskDescription').val();
            if (description.trim()==='') {
                this.showError('newTaskError','Task description cannot be empty');
                return;
            }
            let ticketId = $('#newTicketID').val();
            if (ticketId.trim()!=='') {
                this.taskModel.setTicketId(ticketId);
            }
            this.taskModel.setDescription(description);
            $scope.PageSvc.setStatus('preload');
            $scope.TaskDB.addTask(this.taskModel);
        }
        showError(patchableName,message){
            this.hasError = true;
            this.errorMessage = message;
            $patch(patchableName);
        }
        clearError(patchableName){
            this.hasError = false;
            this.errorMessage = '';
            $patch(patchableName);
        }
        searchByStatus(status,pageNum){
            $scope.TaskViewList = {
                resultCount: 0,
                resultList: [],
                resultNumOfPages: 0
            };
            if (status=='all') {
                for (var i = 0; i < $scope.Task.list.length; i++) {
                    $scope.TaskViewList.resultCount++;
                    $scope.TaskViewList.resultList.push($scope.Task.list[i]);
                }
            }
            $patch('TaskViewListing');
        }
        countToDos(todos){
            let counter = 0;
            for (let i = 0; i < todos.length; i++) {
                counter++;
            }
            return counter;
        }
    }
    return TaskSvc;
});

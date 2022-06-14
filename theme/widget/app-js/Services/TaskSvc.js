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
                this.taskModel.todos[toDoIndex].completed = false;
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
                count: {
                    total: 0,
                    pending: 0,
                    finished: 0,
                    finishedPercent: 0
                },
                resultList: [],
                resultNumOfPages: 0,
                statusOnView: status
            };
            if (status=='all') {
                for (var i = 0; i < $scope.Task.list.length; i++) {
                    $scope.TaskViewList.count.total++;
                    if ($scope.Task.list[i].status==='new'||$scope.Task.list[i].status==='pending') {
                        $scope.TaskViewList.count.pending++;
                    }
                    $scope.TaskViewList.resultList.push($scope.Task.list[i]);
                }
                $scope.finishedPercent = $scope.TaskViewList.count.total / $scope.TaskViewList.count.finished;
            }
            $patch('TaskViewListing');
        }
        isListStatus(status){
            if (status===$scope.TaskViewList.statusOnView) {
                return 'is-active';
            }
            return '';
        }
        countToDos(todos){
            let counter = 0;
            for (let i = 0; i < todos.length; i++) {
                counter++;
            }
            return counter;
        }
        viewTask(taskIndex){
            console.log(taskIndex);
            $scope.Task.focus = $scope.Task.list[taskIndex];
            $scope.Task.focus.metrics = {
                completedTodos: 0,
                totalToDos: 0,
                finishedTodosPercent: 0
            };

            for (var i = 0; i < $scope.Task.focus.todos.length; i++) {
                let todo = $scope.Task.focus.todos[i];
                if (todo.completed) $scope.Task.focus.metrics.completedTodos++;
            }
            if ($scope.Task.focus.metrics.totalToDos>0) {
                $scope.Task.focus.metrics.finishedTodosPercent = $scope.Task.focus.metrics.completedTodos / $scope.Task.focus.metrics.totalToDos;
            }
            $scope.PageSvc.setStatus('view-task');
            this.taskMode = 'view';


        }
    }
    return TaskSvc;
});

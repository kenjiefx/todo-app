app.service('TaskSvc',function($scope,TaskModel,ToDoItem,TaskDB,ErrorSvc,$patch){

    let purgeNewToDoItems = function(){
        let tmpTodos = [];
        for (var i = 0; i < $scope.Task.todos.length; i++) {
            if ($scope.Task.todos[i].status!=='new') {
                if ($scope.Task.todos[i].description.trim()!=='') {
                    tmpTodos.push($scope.Task.todos[i]);
                }
            }
        }
        $scope.Task.todos = tmpTodos;
    }

    let updateToDoItem = function(todoIndex,todoValue){
        if (undefined!==$scope.Task.todos[todoIndex]) {
            $scope.Task.todos[todoIndex].setDescription(todoValue);
        }
    }

    let deleteToDoItem=function(todoIndex){
        let tmpTodos = [];
        for (var i = 0; i < $scope.Task.todos.length; i++) {
            if (i!==todoIndex) {
                tmpTodos.push($scope.Task.todos[i]);
            }
        }
        $scope.Task.todos = tmpTodos;
    }


    if (undefined==$scope.TaskSvc) {
        $scope.TaskSvc = {
            task: {
                create: function(){
                    let acceptable = true;
                    purgeNewToDoItems();
                    if ($scope.Task.about.trim()==='') {
                        ErrorSvc.show('WhenTaskAboutIsEmpty');
                        acceptable = false;
                    } else {
                        ErrorSvc.clear('WhenTaskAboutIsEmpty');
                    }
                    if ($scope.Task.todos.length===0) {
                        ErrorSvc.show('WhenToDoListIsEmpty');
                        acceptable = false;
                    } else {
                        ErrorSvc.clear('WhenToDoListIsEmpty');
                    }
                    $patch('TaskToDoList');
                    if (acceptable) {
                        TaskDB.addTask($scope.Task);
                        //location.href = '/dashboard';
                    }
                }
            },
            add:{
                todo:{
                    item:function(){
                        let toDoItem = new ToDoItem();
                        $scope.Task.todos.push(toDoItem);
                        ErrorSvc.clear('WhenToDoListIsEmpty');
                        $patch('TaskToDoList');
                    }
                }
            },
            update:{
                todo:{
                    item:function(todoIndex,input){
                        updateToDoItem(todoIndex,input.$element.value);
                        purgeNewToDoItems();
                        $patch('TaskToDoList');
                    },
                    complete:function(index){
                        console.log($scope.Task.todos[index].description);
                        console.log($scope.Task.index);
                        $scope.Task.todos[index].status = 'completed';
                        $scope.Task.todos[index].updatedAt = Date.now();
                        TaskDB.updateTask(index,$scope.Task);
                        $patch('TaskSingleView');
                    }
                }
            },
            delete:{
                todo:{
                    item:function(todoIndex){
                        deleteToDoItem(todoIndex);
                        purgeNewToDoItems();
                        $patch('TaskToDoList');
                    }
                }
            }
        }
    }
    return {
        task:{
            factory:function(){
                return new TaskModel();
            }
        }
    }
});

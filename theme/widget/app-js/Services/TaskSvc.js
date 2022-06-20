app.service('TaskSvc',function($scope,TaskModel,ToDoItem,TaskDB,$patch){

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
                    purgeNewToDoItems();
                    console.log($scope.Task);
                    $patch('TaskToDoList');
                }
            },
            add:{
                todo:{
                    item:function(){
                        let toDoItem = new ToDoItem();
                        $scope.Task.todos.push(toDoItem);
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

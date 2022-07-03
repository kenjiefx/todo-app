app.service('TaskSvc',($scope,TaskDB,TaskModel)=>{
    $scope.Task = new TaskModel;
    let createNewTask=()=>{

    }
    return {
        taskDB: {
            hasInstance:()=>{
                return TaskDB.hasInstance;
            },
            create:()=>{
                return TaskDB.create(()=>{});
            }
        },
        task: {
            factory:()=>{
                return new TaskModel;
            }
        }
    }
});

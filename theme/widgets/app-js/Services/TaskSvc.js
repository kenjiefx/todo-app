app.service('TaskSvc',($scope,TaskDBService,TaskModel,ToDoItem)=>{

    // Task sorting algorithm
    let sortTask=(view,sortBy)=>{
        $scope.TaskLister = [];
    }

    return {
        load: {
            tasks:()=>{
                TaskDBService.start((taskIndex)=>{
                    sortTask('pending','createdAt');
                });
            }
        }
    }
});

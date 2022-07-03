app.scope('Main',(ViewSvc,TaskSvc)=>{
    if(!TaskSvc.taskDB.hasInstance()){
        //TaskSvc.taskDB.create();
        $scope.Task.about = 'Welcome! '; 
        $scope.Task = TaskSvc.task.factory();
    }
});

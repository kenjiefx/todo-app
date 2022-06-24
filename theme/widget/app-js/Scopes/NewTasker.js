app.scope('NewTasker',function($scope,PageSvc,UtilSvc,TaskSvc,TaskDB,Router){
    if (!TaskDB.hasInstance) Router.route.toTaskDBInit();
    $scope.UtilSvc = new UtilSvc;
    $scope.Task = TaskSvc.task.factory();
    PageSvc.setStatus('create');
});

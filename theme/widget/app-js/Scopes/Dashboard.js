app.scope('dashboard',function($scope,PageSvc,TaskDB,TaskSvc,UtilSvc,TaskModel){
    $scope.PageSvc = new PageSvc;
    $scope.TaskDB = new TaskDB;
    $scope.TaskSvc = new TaskSvc;
    $scope.UtilSvc = new UtilSvc;

    $scope.TaskSvc.searchByStatus('all',1);
});

app.scope('dashboard',function($scope,PageSvc,TaskDB,TaskSvc,UtilSvc){
    $scope.PageSvc = new PageSvc;
    $scope.TaskDB = new TaskDB;
    $scope.TaskSvc = new TaskSvc;
    $scope.UtilSvc = new UtilSvc;
});

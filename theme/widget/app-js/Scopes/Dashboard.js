app.scope('dashboard',function($scope,PageSvc,TaskDB){
    $scope.PageSvc = new PageSvc;
    $scope.TaskDB = new TaskDB;
});

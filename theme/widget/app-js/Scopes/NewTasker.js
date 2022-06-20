app.scope('NewTasker',function($scope,PageSvc,UtilSvc,TaskSvc){
    $scope.hello = 'world';
    $scope.UtilSvc = new UtilSvc;
    $scope.Task = TaskSvc.task.factory();
    PageSvc.setStatus('create');
});

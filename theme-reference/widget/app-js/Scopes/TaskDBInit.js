app.scope('TaskDBInit',function($scope,TaskDB,Router,PageSvc){
    PageSvc.setStatus('onload');
    if (TaskDB.hasInstance&&!TaskDB.isTaskEmpty()) Router.route.toDashboard();
    TaskDB.create(function(){
        setTimeout(function(){
            PageSvc.setStatus('welcome');
        },3000);
    });
    $scope.toCreateTask=function(){
        Router.route.toCreateTask();
    }
});

app.scope('Dashboard',function($scope,PageSvc,UtilSvc,TaskSvc,TaskDB,Router,UrlSvc){

    $scope.UtilSvc = new UtilSvc;

    if (!TaskDB.hasInstance) Router.route.toTaskDBInit();
    if (TaskDB.isTaskEmpty()) Router.route.toTaskDBInit();

    let view = UrlSvc.getParam('view');
    if (view===false) view = 'all';
    $scope.onView = view;

    let filterView=function(view,page){
        $scope.taskList = [];
        let numPerPage = 10;
        let allTasks = TaskDB.getAllTasks();
        for (var i = 0; i < allTasks.length; i++) {
            let singleTask = allTasks[i];
            singleTask.metrics.toDoCount = singleTask.todos.length;
            if (view==='all') {
                $scope.taskList.push(singleTask);
            }
        }
    }

    filterView(view,1);

    PageSvc.setStatus('dashboard');
});

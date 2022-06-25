app.scope('Dashboard',function($scope,PageSvc,UtilSvc,TaskSvc,TaskDB,Router,UrlSvc){

    $scope.UtilSvc = new UtilSvc;

    if (!TaskDB.hasInstance) Router.route.toTaskDBInit();
    if (TaskDB.isTaskEmpty()) Router.route.toTaskDBInit();

    let view = UrlSvc.getParam('view');
    if (view===false) view = 'all';
    $scope.onView = view;
    $scope.totalFilteredView = 0;

    $scope.Task = TaskSvc.task.factory();

    let filterView=function(view,page){
        $scope.taskList = [];
        let numPerPage = 10;
        let allTasks = TaskDB.getAllTasks();
        for (var i = 0; i < allTasks.length; i++) {
            let singleTask = allTasks[i];
            singleTask.metrics.toDoCount = singleTask.todos.length;
            if (i===0) {
                $scope.Task.import(singleTask);
            }
            if (view==='all') {
                $scope.totalFilteredView++;
                $scope.taskList.push(singleTask);
            }
        }
    }

    filterView(view,1);

    $scope.isActiveSidebar = function(status){
        if ($scope.onView==status) {
            return 'is-active';
        }
        return '';
    }

    PageSvc.setStatus('dashboard');
});

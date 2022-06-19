app.scope('TaskDBInit',function($scope,TaskDB,Router,PageSvc){
    if(TaskDB.hasInstance) {
        if (!TaskDB.isTaskEmpty()) {
            Router.route.toDashboard();
        }
    };
    PageSvc.setStatus('onload');
    TaskDB.create(function(){

    });
});

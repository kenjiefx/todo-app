app.scope('Main',($scope,ViewSvc,TaskSvc)=>{
    TaskSvc.load.tasks();
});

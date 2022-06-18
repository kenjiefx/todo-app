app.scope('TaskDBInit',function($scope,TaskDB,Router){
    if(TaskDB.hasInstance) Router.route.toDashboard();
    TaskDB.create(function(){
        
    });
});

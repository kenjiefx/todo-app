app.scope('IndexRouter',function($scope,TaskDB,Router){
    if(!TaskDB.hasInstance) Router.route.toTaskDBInit();
    if (!TaskDB.isTaskEmpty()) Router.route.toDashboard();
    Router.route.toTaskDBInit();
});

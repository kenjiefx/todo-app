app.scope('IndexRouter',function($scope,TaskDB,Router){
    if(!TaskDB.hasInstance) Router.route.toTaskDBInit();
});

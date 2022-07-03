app.service('Router',function($scope){
    return {
        route: {
            toTaskDBInit:function(){
                location.href='/welcome';
            },
            toDashboard:function(){
                location.href='/dashboard';
            },
            toCreateTask:function(){
                location.href='/create/task';
            }
        }
    }
});

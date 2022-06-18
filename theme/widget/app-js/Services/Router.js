app.service('Router',function($scope){
    return {
        route: {
            toTaskDBInit:function(){
                location.href='/welcome';
            }
        }
    }
});

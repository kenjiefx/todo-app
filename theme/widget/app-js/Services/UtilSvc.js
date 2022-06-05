app.service('UtilSvc',function($scope){
    class UtilSvc {
        constructor(){}
        getCurrentTimestamp(){
            return moment().format('MMMM Do YYYY, h:mm:ss a');
        }
    }
    return UtilSvc;
});

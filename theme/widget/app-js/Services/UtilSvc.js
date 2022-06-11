app.service('UtilSvc',function($scope){
    class UtilSvc {
        constructor(){}
        getCurrentTimestamp(){
            return moment().format('MMMM Do YYYY, h:mm:ss a');
        }
        toFormatDate(date){
            return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        }
        toTimeAgo(date){
            return moment(date).fromNow();
        }
    }
    return UtilSvc;
});

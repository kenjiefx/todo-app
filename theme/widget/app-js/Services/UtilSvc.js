app.service('UtilSvc',function($scope){
    class UtilSvc {
        constructor(){}
        getCurrentTimestamp(format){
            return moment().format(format);
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

app.service('PageSvc',function($scope,$patch){
    class PageSvc {
        constructor(){
            this.status = 'live';
        }
        setStatus(status){
            this.status = status;
            $patch('PageStatus');
        }
    }
    return PageSvc;
});

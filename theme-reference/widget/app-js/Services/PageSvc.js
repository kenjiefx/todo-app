app.service('PageSvc',function($scope,$patch){
    if (undefined===$scope.PageSvc) {
        $scope.PageSvc = {
            status: null
        }
    }
    return {
        setStatus:function(status){
            $scope.PageSvc.status = status;
            $patch('PageStatus');
        }
    }
});

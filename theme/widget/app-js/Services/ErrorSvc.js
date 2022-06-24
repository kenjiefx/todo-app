app.service('ErrorSvc',function($scope,$patch){

    if (undefined===$scope.ErrorSvc) {
        $scope.ErrorSvc = {
            hasError: false,
            errorMessage: null
        }
    }

    return {
        show: function(errorField){
            $scope.ErrorSvc.hasError = true;
            $patch('ErrorSvc_'+errorField);
        },
        clear: function(errorField){
            $scope.ErrorSvc.hasError = false;
            $patch('ErrorSvc_'+errorField);
        }
    }
});
